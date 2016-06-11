@if($errors->count())
<div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>
  {{ $errors->first('title') }}
  {{ $errors->first('content') }}
  {{ $errors->first('slug') }}
</div>
@endif

<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title') !!}
</div>
<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug') !!}
</div>
<div class="form-group">
    {!! Form::label('content', 'Content:') !!}
    {!! Form::textarea('content') !!}
</div>

{{ Form::hidden('user_id', $user->id) }}
{{ Form::hidden('task_id', $task->id) }}
<div class="form-group">
    {!! Form::submit($submit_text, ['class'=>'btn primary']) !!}
</div>
 