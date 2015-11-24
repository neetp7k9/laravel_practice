@extends('layouts.master')

@section('content')
@if(Auth::check())
<h1>Hello {{Auth::user()->name}}</h1>
@else
<h1>Hello Guest</h1>
@endif
<h1>Image upload and share page</h1>
<h3><a href="?sort=1">sort by comment number</a></h3>
<h3><a href="?sort=2">sort by post time</a></h3>

<nav class="navbar navbar-inverse">
<form action="image" method="post" enctype="multipart/form-data">
<input type="hidden" name="_token" value="{{ csrf_token()}}">
    Select image to upload:
    title<input type="text" name="name">
    description<input type="textarea" name="description">
    <input type="file" name="avatar" id="avatar">
    <input type="submit" value="Upload Image" name="submit">
</form>
<h3><a href="?">All image</a></h3>
<form action="/" method="get">
<input type="hidden" name="_token" value="{{ csrf_token()}}">
    search :<input type="text" name="search">
    <input type="submit" value="search image name" name="submit">
</form>
</nav>
	@foreach($images as $img)
        <p class="title">Title: {{$img->name}} from: {{$img->user["name"]}}</p></br>
        <p id= "image"><img src={{$img->avatar->url('medium')}}></p></br>
        <p class="description">Description: {{$img->description}}</p></br>
        <p class="post_time">Post time: {{$img->created_at}}</p></br>
	@foreach($img->comments as $cmt)
        <p>comment : {{$cmt->text}} from : {{$cmt->user['name']}}<p><br>
	@endforeach
	{!! HTML::ul($errors->all()) !!}
	{!! Form::open(array('action' => array('CommentController@store',$img->id))) !!}
	    <div class="form-group">
	{!! Form::token()!!}
        {!! Form::hidden('image_id', $img->id) !!}
        {!! Form::label('text', 'comment') !!}
        {!! Form::text('text', Input::old('text'), array('class' => 'form-control')) !!}
	    </div>
	{!! Form::submit('Submit!', array('class' => 'btn btn-primary')) !!}
	{!! Form::close() !!}
        @endforeach
@endsection
