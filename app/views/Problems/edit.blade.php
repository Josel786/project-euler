@extends('layouts.default')

@section('scripts')
    <script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
    <script src="{{ URL::asset('js/plugins/tinymce.js') }}"></script>
@stop

@section('content')
    <div class="page-title">
        <h1>Create Problem</h1>
    </div>

    {{ Form::open(['method' => 'put', 'url' => "problems/$problem->id"]) }}
        <div class="form-group">
            {{ Form::label('number') }}
            {{ Form::text('number', $problem->number) }}
        </div>
        <div class="form-group">
            {{ Form::label('title') }}
            {{ Form::text('title', $problem->title) }}
        </div>
        <div class="form-group">
            {{ Form::label('description') }}
            {{ Form::textarea('description', $problem->description) }}
        </div>
        <div class="form-group">
            {{ Form::submit('Save') }}
        </div>
    {{ Form::close() }}
@stop
