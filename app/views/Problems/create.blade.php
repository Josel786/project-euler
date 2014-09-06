@extends('layouts.default')

@section('scripts')
@stop

@section('content')
    <div class="page-title">
        <h1>Create Problem</h1>
    </div>

    {{ Form::open(['route' => 'problems.store']) }}
        <div class="form-group">
            {{ Form::label('url') }}
            {{ Form::text('url') }}
        </div>
        <div class="form-group">
            {{ Form::label('number') }}
            {{ Form::text('number') }}
        </div>
        <div class="form-group">
            {{ Form::label('title') }}
            {{ Form::text('title') }}
        </div>
        <div class="form-group">
            {{ Form::label('description') }}
            {{ Form::textarea('description') }}
        </div>
        <div class="form-group">
            {{ Form::submit('Save') }}
        </div>
    {{ Form::close() }}
@stop
