@extends('layouts.master')

@section('title', 'Tasks')

@section('content')
@if($errors->count())
<div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>
  {{ $errors->first('name') }}
  {{ $errors->first('description') }}
  {{ $errors->first('slug') }}
</div>
@endif
    <h2>Create task</h2>
 
    {!! Form::model(new App\Task, ['route' => ['tasks.store']]) !!}
        @include('tasks/partials/addform', ['submit_text' => 'Create task'])
    {!! Form::close() !!}

@stop