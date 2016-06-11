@extends('layouts.master')

@section('title', 'Log in')

@section('content')
    <div class="jumbotron">
  <div class="container">

{{ Form::open(array('url' => 'login')) }}
<h1>Log in</h1>

<!-- if there are login errors, show them here -->
@if($errors->count())
<div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>
  {{ $errors->first('email') }}
  {{ $errors->first('password') }}
</div>
@endif

<p>
    {{ Form::label('email', 'Email address') }}
    {{ Form::text('email', '') }}
</p>

<p>
    {{ Form::label('password', 'Password') }}
    {{ Form::password('password') }}
</p>

<p>{{ Form::submit('Log in', ['class'=>'btn btn-primary']) }}</p>
{{ Form::close() }}
  </div>
</div>
@stop