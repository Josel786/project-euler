@extends('layouts.default')

@section('scripts')
@stop

@section('content')
    <div class="page-title actions">
        <h1>{{ $problem->title }}</h1>
        <button class="btn" href="#">Submit Answer</button>
    </div>

    <div class="description">
        <p>{{ $problem->description }}</p>
    </div>

    <div class="answer">
        <code><pre>{{ $problem->answer }}</pre></code>
    </div>
@stop
