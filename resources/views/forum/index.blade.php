@extends('app')
@section('content')
    <div class="container">
        <div class="jumbotron">
            <h3>欢迎来到本论坛
                <a class="btn btn-lg btn-primary pull-right" href="../../components/#navbar" role="button">发布新的帖子 »</a>
            </h3>
        </div>
        <div>
            <div class="col-md-9" role="main">
                @foreach ($discussions as $discussion)
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object img-circle" alt="64*64" src="{{$discussion->user->avatar}}}" style="width:50px">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><a href="/discussions/{{$discussion->id}}">{{$discussion->title}}</a></h4>
                            {{$discussion->user->name}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
