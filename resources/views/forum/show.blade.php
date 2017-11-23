@extends('app')
@section('content')
    <div class="container">
        <div class="jumbotron">
            <div class="media">
                <div class="media-left">
                    <a href="#">
                        <img class="media-object img-circle" alt="64x64" src="{{$discussion->user->avatar}}}"
                             style="width:50px">
                    </a>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">{{$discussion->title}}
                        <a class="btn btn-lg btn-primary pull-right" href="../../components/#navbar" role="button">修改帖子
                            »</a>
                    </h4>
                    {{$discussion->user->name}}
                </div>
            </div>
        </div>
        <div>
            <div class="col-md-9" role="main">
                <div class="blog-post">
                    {{$discussion->body}}
                </div>
            </div>
        </div>
    </div>
@endsection
