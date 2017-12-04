@extends('layouts.master')

@section('content')

<h1>Liste des Articles</h1>&nbsp;<a class="btn btn-success" href="{{ URL::route('posts.create') }}">Créer un article</a>
 
<table class="table table-stripped table-bordered">
  <thead>
      <tr>
          <th>ID</th>
          <th>Nom</th>
          <th>Actions</th>
          <th></th>
      </tr>
  </thead>
<tbody>
      @foreach($posts as $post)
      <tr>
          <th>{{ $post->id }}</th>
          <th>{{ $post->name }}</th>
          <th>
            <a class="btn btn-primary" href="{{ URL::route('posts.edit',$post->id) }}">Editer</a>&nbsp;
            {{ Form::open(['route'=>['posts.delete',$post->id], 'method'=>'delete']) }}
                {{ Form::submit('Supprimer',['class'=>'btn btn-danger']) }}
            {{ Form::close()}}
          </th>
      </tr>
      @endforeach
</tbody>
</table>


@stop
