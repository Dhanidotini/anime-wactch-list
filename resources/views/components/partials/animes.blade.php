<div
    class="group/item  relative rounded-lg shadow hover:rotate-1 hover:shadow-2xl lg:mt-0 lg:flex lg:rounded h-42 lg:h-48 w-full lg:hover:ml-1 transition-all lg:hover:shadow-2xl lg:hover:bg-gray-900 lg:hover:rotate-0">
    <a href="{{ route('anime.show', $item->slug) }}">
        <div class="h-full w-full lg:w-36 grow-0 rounded-lg overflow-hidden relative">
            <img class="object-fit w-full h-full rounded-lg lg:rounded-none -z-10 opacity-80 group-hover/item:opacity-100 transition-all"
                src="{{ asset('storage/' . $item->image->attachment) }}" alt="{{ $item->title }} Image" />
            <div @class([
                'absolute top-0 px-1 text-xs rounded-br-lg font-bold lg:px-1.5 lg:py-0.5 shadow-xl text-shadow-xl text-shadow-black',
                'bg-red-600' => $item->type->name == 'TV',
                'bg-teal-600' => $item->type->name == 'Movie',
            ])>
                <span>{{ $item->type->name }}</span>
            </div>
            <div
                class="absolute w-full h-8 bottom-0 text-xs bg-black/50 font-extrabold group-hover/item:text-amber-500 group-hover/item:underline lg:hidden group-hover/item:h-11 transition-all">
                <h3 class="px-1 z-10">
                    {{ $item->title }}
                </h3>
            </div>
        </div>
        <div
            class="pt-2 lg:pt-0 h-fit lg:px-1 transition-all lg:flex lg:flex-col lg:top-0 lg:bg-transparent lg:group-hover/item:top-0 lg:group-hover/item:h-fit lg:h-full lg:ml-1.5 lg:w-fit ">
            <div
                class="text-xs lg:text-lg font-extrabold group-hover/item:underline group-hover/item:text-amber-400 lg:mt-1 lg:h-fit z-90">
                <h3
                    class="-translate-y-15 bg-black/50 lg:translate-0 lg:bg-transparent px-1 h-15 z-10 hidden lg:contents">
                    {{ $item->title }}
                </h3>
            </div>
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
            <div class="hidden lg:line-clamp-4 text-sm text-gray-400 group-hover/item:text-gray-200">
                {{ $item->synopsis }}
            </div>
        </div>
    </a>
</div>
