<div>
    <h1 class="text-3xl text-red-600">Here is the search Livewire page</h1>

    <input type="text" wire:model.live="searchtext">

    @if($search_output)
        <ul>
            @foreach($search_output as $post)
                            {{-- <li>{{ $post->name }}</li>
                            <li>{{ $post->description }}</li> --}}

                <li>{!! '<p style="color: #196a03;text-transform: uppercase;">' . $post->name . '</p>'!!}</li>
                <li>{!! $post->description !!}</li>
                <hr>
            @endforeach
        </ul>
    @endif
</div>
