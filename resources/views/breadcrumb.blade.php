<nav aria-label="breadcrumb mt-5">
    <ol class="breadcrumb">
        @forelse($breadcrumbs as $item)
            @if(isset($item['routeName']))
                <li class="breadcrumb-item">
                    @if(isset($item['params']))
                        <a href="{{ route($item['routeName'], $item['params']) }}">{{$item['name']}}</a>
                    @else
                        <a href="{{ route($item['routeName']) }}">{{$item['name']}}</a>
                    @endif
                </li>
            @else
                <li class="breadcrumb-item active">{{$item['name']}}</li>
            @endif
        @empty
            <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
        @endforelse
    </ol>
</nav>
