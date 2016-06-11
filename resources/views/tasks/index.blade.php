@extends('layouts.master')

@section('title', 'Tasks')

@section('content')
@if (session('success'))
<div class="alert alert-success" role="alert">
  {{ session('success') }}
</div>
@endif
<a class="btn btn-default pull-right" href="{{route('tasks.create')}}">New task</a>
    <h2>Tasks</h2>
 
    @if ( !$tasks->count() )
    <div class="well well-sm">There are no tasks in the system</div>
    @else
    <div class="table-responsive" ng-controller="TaskCtrl">
    <table class="table table-striped tasks-list">
        <tr><th>Name</th><th>Description</th><th>Status</th><th>Owner</th><th>Created</th><th>Last updated</th><th>Actions</th></tr>
            @foreach( $tasks as $task )
            <tr ng-click="clickRow('{{ route('tasks.show', $task->slug) }}')"
                @if ($task->status == 'completed')
                    class="success"
                @elseif($task->status == 'inprogress')
                    class="warning"
                @else
                    class="info"
                @endif
                ><td>{{ $task->name }}</td><td>{{ $task->description }}</td><td>
                    @if ($task->status == 'inprogress')
                    in progress
                @else
                    {{$task->status}}
                @endif
                    
                </td><td>{{$task->owner->name}}</td><td>{{ $task->created_at }}</td><td>{{ $task->updated_at }}</td>
                <td>                    
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

                </td>
            </tr>
            @endforeach
    </table>
    </div>
    <a class="btn btn-default pull-right" href="{{route('tasks.create')}}">New task</a>
    @endif
@stop