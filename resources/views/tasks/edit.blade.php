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
    <h2>Edit task</h2>
 
    {!! Form::model($task, ['method' => 'PATCH', 'route' => ['tasks.update', $task->slug]]) !!}
        @include('tasks/partials/editform', ['submit_text' => 'Update task'])
    {!! Form::close() !!}
@stop