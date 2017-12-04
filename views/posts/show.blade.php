@extends('layouts.master')

@section('content')


<h2>{{ $post->name }}</h2>
<p>Posté par : {{ $author->username }} | Date du poste : {{ date('F d, Y', strtotime($post->created_at)) }} à {{ date('g:ia',strtotime($post->created_at)) }}</p>
<p>{{ $post->content }}</p>

  <h3>Les Commentaires</h3>
      @foreach($comments as $comment)
      <h4>Commentaire posté par {{ $comment->user->username }}</h4>
      <p>{{ $comment->content }}</p>
      @endforeach

@if(Auth::Check())
<a href="{{ URL::route('posts.admin') }}">Modifier les postes</a>
@endif

<h1>Poster un commentaire</h1>

@if(Auth::check())

    {{ Form::open(['route'=>['comments.create',$post->id],'method'=>'POST']) }}

    <div class="form-group">
    {{ Form::text('comment','',['class'=>'form-control']) }}
    </div>

    {{ Form::submit('Envoyer') }}

{{ Form::close() }}
@else
Pour poster un commentaire <a href="{{ URL::route('users.login') }}">Connecter vous</a>
@endif
@stop
