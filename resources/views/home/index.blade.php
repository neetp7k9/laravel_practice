@extends('layouts.master')

@section('content')    
    @foreach($images as $img)
    <p class="title">Title: {{$img->name}} from: {{$img->user["name"]}}</p></br>
    <p id= "image"><img src={{$img->avatar->url('medium')}}></p></br>
    <p class="description">Description: {{$img->description}}</p></br>
    @foreach($img->comments as $cmt)
    <p>comment : {{$cmt->text}} from : {{$cmt->user['name']}}<p><br>
    @endforeach
    @endforeach
@endsection
