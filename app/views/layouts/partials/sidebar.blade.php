<div class="sidebar">
    <div class="sidebar-title">
        <h4>Problems List</h4>
    </div>

    <a class="btn" href="{{ URL::route('problems.create') }}">Add Problem</a>

    <ul>
        @foreach($items as $item)
        <li><a href="{{ URL::route('problems.show', ['id' => $item['id']]) }}">{{ $item['number'] . ' - ' . $item['title'] }}</a></li>
        @endforeach
    </ul>
</div>
