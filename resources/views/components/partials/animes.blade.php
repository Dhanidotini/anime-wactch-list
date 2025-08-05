<div class="group/item overflow-hidden lg:mt-0 lg:flex lg:rounded lg:hover:bg-gray-800 h-58 lg:h-48">
    <a href="{{ route('anime.show', $item->slug) }}">
        <div class="h-full lg:w-38 w-full mr-1.5 grow-0">
            <img class="object-fit w-full h-full rounded-lg lg:rounded-none -z-10 opacity-80 group-hover/item:opacity-100 transition-all"
                src="{{ asset('storage/' . $item->image->attachment) }}" alt="{{ $item->title }} Image" />
        </div>
        <div
            class="relative rounded-b-lg bottom-15 bg-black/50 pt-2 lg:pt-0 h-full overflow-hidden px-1 group-hover/item:bottom-18 transition-all lg:flex lg:flex-col lg:top-0 lg:bg-transparent lg:group-hover/item:top-0 group-hover/item:lg:h-fit lg:h-full  lg:w-fit">
            <h3 class="text-xs lg:text-lg font-extrabold group-hover/item:underline group-hover/item:text-amber-400">
                {{ $item->title }}
            </h3>
            <div class="hidden text-md my-1 lg:flex lg:gap-1 text-gray-400 group-hover/item:text-gray-200">
                <span class="text-sm font-semibold">Genres:</span>
                @foreach ($item->genres as $genre)
                    <a class="p-0 m-0" href="{{ route('genre.show', $genre->slug) }}">
                        <x-partials.span class="hover:text-amber-400 hover:underline">
                            {{ $genre->name }}{{ $loop->last ? '' : ',' }}
                        </x-partials.span>
                    </a>
                @endforeach
            </div>
            <p class="hidden lg:block text-wrap overflow-ellipsis text-sm text-gray-400 group-hover/item:text-gray-200">
                {{ str($item->synopsis)->limit(220, preserveWords: true) }}
            </p>
        </div>
    </a>
</div>
