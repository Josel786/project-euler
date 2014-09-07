<div class="sidebar">
    <div class="sidebar-title">
        <h4>Problems</h4>
    </div>
    <ul>
        @foreach($items as $item)
        <li><a href="{{ URL::route('problems.show', ['id' => $item['id']]) }}">{{ $item['number'] . ' - ' . $item['title'] }}</a></li>
        @endforeach
    </ul>
</div>
