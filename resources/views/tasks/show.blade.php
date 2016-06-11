@extends('layouts.master')

@section('title', 'Task')

@section('content')
@if (session('success'))
<div class="alert alert-success" role="alert">
  {{ session('success') }}
</div>
@endif
<div class="tasks-actions pull-right">
<a class="btn btn-primary" href="{{route('tasks.edit', $task->slug)}}">
    edit
</a>
{!! Form::open([
                    'class'=> 'form-delete-btn',
            'method' => 'DELETE',
            'route' => ['tasks.destroy', $task->slug]
        ]) !!}
            {!! Form::submit('delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
</div>
<h2>{{ $task->name }} </h2> 
<p>{{ $task->description }}</p>
<p>Status: 
@if ($task->status == 'inprogress')
<span class="label label-warning">in progress</span>
                @elseif($task->status == 'completed')
                <span class="label label-success">{{$task->status}}</span>
                @else
                <span class="label label-info">{{$task->status}}</span>
                @endif
</p>
<hr/>
<h3>Notes</h3>
@if ( $task->notes->count() )
@foreach( $task->notes as $note)
<div class="panel panel-default">
  <div class="panel-body">
      <h4>{{$note->title}}</h4>
      <p>{{$note->content}}</p>     
  </div>
  <div class="panel-footer text-right text-info">Added by {{$note->author->name}} on {{$note->created_at->format('d-m-Y')}}</div>
</div>
@endforeach
@else
<div class="well well-sm">No notes have been added yet</div>
@endif         

    {!! Form::model(new App\Note, ['route' => ['tasks.notes.store', $task->slug]]) !!}
        @include('notes/partials/form', ['submit_text' => 'Add note'])
    {!! Form::close() !!}
@stop