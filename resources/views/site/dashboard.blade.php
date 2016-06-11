@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
<div class="jumbotron">
    <div class="container">
        <h1>Welcome, {{$user->name}}!</h1>
        
        <div id="chartcontainer"></div>
    </div>
</div>
@stop