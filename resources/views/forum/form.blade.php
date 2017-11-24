<!--  Title field -->
<div class="form-group">
    {!! Form::label('title', '题目:') !!}
    {!! Form::text('title', null , ['class' => 'form-control']) !!}
</div>

<!--  Body field -->
<div class="form-group">
    {!! Form::label('body', '内容:') !!}
    {!! Form::textarea('body', null , ['class' => 'form-control']) !!}
</div>
