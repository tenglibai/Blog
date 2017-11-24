@extends('app')
@section('content')
    <div class="container">
        <div class="jumbotron">
            <div class="media">
                <div class="media-left">
                    <a href="#">
                        <img class="media-object img-circle" alt="64x64" src="{{$discussion->user->avatar}}"
                             style="width:50px">
                    </a>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">{{$discussion->title}}
                        @if (Auth::check() && Auth::user()->id == $discussion->user_id)
                            <a class="btn btn-lg btn-primary pull-right" href="/discussions/{{$discussion->id}}/edit" role="button">修改帖子»</a>
                        @endif
                    </h4>
                    {{$discussion->user->name}}
                </div>
            </div>
        </div>
        <div>
            <div class="col-md-9" role="main">
                <div class="blog-post">
                    {!! $html !!}
                </div>
            </div>
        </div>
    </div>
@endsection
