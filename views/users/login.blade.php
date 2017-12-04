@extends('layouts.master')

@section('content')

  {{ Form::open(['route'=>'users.check']) }}
      <div clas="form-group">
        {{ Form::text('username','',['placeholder'=>'Username','class'=>'form-control']) }}
        @if($errors->first('username'))
            <div class="alert alert-danger">{{ $errors->first('username') }}</div>
        @endif
      </div>
    </br>
      <div class="form-group">
        {{ Form::password('password',['placeholder'=>'Password','class'=>'form-control']) }}
        @if($errors->first('password'))
            <div class="alert alert-danger">{{ $errors->first('password') }}</div>
        @endif

      </div>
      <div class="form-group">
        {{ Form::checkbox('remember','remember',false) }}
        {{ Form::label('remember','Se souvenir de moi') }}
      </div>
      {{ Form::submit('Se Connecter',['class'=>'btn btn-primary']) }}
  {{ Form::close() }}

@stop
