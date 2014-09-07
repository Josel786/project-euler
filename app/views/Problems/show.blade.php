@extends('layouts.default')

@section('scripts')
    <script src="{{ URL::asset('js/vendor/prism.js') }}"></script>
@stop

@section('page-class')problems-show @stop

@section('edit-url') {{ URL::route('problems.edit', ['id' => $problem->id]) }} @stop

@section('content')
    <div class="page-title">
        <h1>{{ $problem->title }}</h1>
    </div>

    <div class="description">
        <p>{{ $problem->description }}</p>
    </div>

    <div class="answer">
        <h5>Answer</h5>
        <p>{{ $problem->answer }}</p>
    </div>

    <div class="code">
        <h5>Code</h5>
        <pre class="line-numbers" data-start="0"><code class="language-php">{{ $problem->code }}</code></pre>
    </div>
@stop
