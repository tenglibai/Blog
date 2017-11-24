@extends('app')
@section('content')
    <div class="container">
        <div>
            <div class="col-md-8 col-md-offset-2" role="main">
            {!! Form::model($discussion, ['url' => 'discussions/'.$discussion->id, 'method' => 'PATCH']) !!}
                @include('forum.form')
                <div>
                    {!! Form::submit('更新帖子', ['class' => 'btn btn-primary pull-right']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop