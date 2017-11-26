<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Mail\UserRegisterMailable;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;

class UsersController extends Controller
{


    public function register()
    {
        return view('users.register');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRegisterRequest $request)
    {
        $data = [
            'confirm_code' => str_random(48),
            'avatar' => '/images/image.jpg'
        ];
        //保存用户数据, 重定向.
        $user = User::create(array_merge($request->all(), $data));
        //发送邮箱
        Mail::to($user)->queue(new UserRegisterMailable($user));

        return redirect('/');
    }

    public function confirmEmail($confirm_code)
    {
        $user = User::where('confirm_code', $confirm_code)->first();
        if (is_null($user)) {
            return redirect('/');
        }
        $user->is_confirmed = 1;
        $user->confirm_code = str_random(48);
        $user->save();
        \Session::flash('email_confirmed', '邮箱已经确认,请登录!');
        return redirect('user/login');
    }

    public function login()
    {
        return view('users.login');
    }

    public function signin(UserLoginRequest $request)
    {
        if (\Auth::attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'is_confirmed' => 1,
        ])) {
            return redirect('/');
        }
        \Session::flash('user_login_failed', '密码不正确或者邮箱没验证.');
        return redirect('/user/login')->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function logout()
    {
        \Auth::logout();
        return redirect('/');
    }

    public function avatar()
    {
        return view('users.avatar');
    }

    public function changeAvatar(Request $request)
    {
        $file = $request->file('avatar');
        $input = array('image' => $file);
        $rules = array(
            'image' => 'image'
        );
        $validator = \Validator::make($input, $rules);
        if ($validator->fails()){
            return \Response::json([
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray(),
            ]);
        }
        $destination = 'uploads/';
        $filename = \Auth::user()->id.'_'.time().$file->getClientOriginalName();
        $file->move($destination, $filename);
        //图片裁剪(200*200)后再保存到upload
        Image::make($destination.$filename)->fit(200)->save();
        $user = User::find(\Auth::user()->id);
        $user->avatar = '/'.$destination.$filename;
        $user->save();

        return \Response::json([
            'success' => 'true',
            'avatar' => asset($destination.$filename),
        ]);
    }
}
