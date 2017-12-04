@extends('layouts.master')

@section('content')

<a href="{{ URL::route('posts.create') }}">Créer un article</a></br>
<a href="{{ URL::route('posts.admin') }}">Modifier des postes</a></br>
<a href="{{ URL::route('posts.admin') }}">Supprimer des postes</a></br>
<a href="{{ URL::route('comments.admin') }}">Supprimer des commentaires</a></br>
<a href="{{ URL::route('users.admin') }}">Gérer les utilisateurs</a>

@stop
