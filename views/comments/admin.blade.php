@extends('layouts.master')

@section('content')

<h1>Liste des Commentaires</h1>&nbsp;


<table class="table table-stripped table-bordered">
  <thead>
      <tr>
          <th>Commentaire</th>
          <th>Actions</th>
      </tr>
  </thead>
<tbody>
      @foreach($comments as $comments)
      <tr>
          <th>{{ $comments->content }}</th>
          <th>
            {{ Form::open(['route'=>['comments.delete',$comments->id], 'method'=>'delete']) }}
                {{ Form::submit('X',['class'=>'btn btn-danger']) }}
            {{ Form::close()}}
          </th>
      </tr>
      @endforeach
</tbody>
</table>


@stop

@stop
