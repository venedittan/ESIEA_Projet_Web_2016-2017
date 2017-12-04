@extends('layouts.master')

@section('content')

<h1>La liste des articles</hi>


@foreach($posts as $post)
    <a href="{{ URL::route('posts.show',$post->slug) }}">
        <h2>{{ $post->name }}</h2>
    </a>
@endforeach

{{ $posts->links() }}

@stop
