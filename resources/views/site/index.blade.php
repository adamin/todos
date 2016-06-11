@extends('layouts.master')

@section('title', 'Welcome')

@section('content')
<div class="jumbotron">
    <div class="container">
        <h1>Welcome!</h1>
        <p><a class="btn btn-primary btn-lg" href="{{ route('site.login') }}" role="button">Log in</a></p>
    </div>
</div>
@stop