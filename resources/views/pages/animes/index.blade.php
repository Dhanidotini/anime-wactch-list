<x-layouts.app>
    <article class="flex flex-col w-full lg:grid lg:grid-cols-4 lg:gap-2 lg:px-48">
        <section class="w-full lg:w-fit col-span-3 lg:col-span-full xl:col-span-3">
            <div>
                <h2 class="mx-2 font-bold text-md">All Anime</h2>
                <hr>
            </div>
            <div class="mx-2 grid grid-cols-2 gap-2.5 sm:grid-cols-3 md:grid-cols-5 lg:grid-cols-1 my-5">
                @foreach ($animes as $item)
                    <a href="{{ route('anime.show', $item->slug) }}">
                        <div
                            class="group/item overflow-hidden lg:mt-0 lg:flex lg:rounded lg:hover:bg-gray-800 lg:h-40 h-62">
                            <div class="h-62 lg:w-38 w-full mr-1.5 grow-0">
                                <img class="object-fill w-full h-full rounded-lg lg:rounded-none -z-10 opacity-80 group-hover/item:opacity-100 transition-all"
                                    src="{{ asset('storage/' . $item->image->attachment) }}"
                                    alt="{{ $item->title }} Image" />
                            </div>
                            <div
                                class="relative rounded-b-lg bottom-15 bg-black/50 pt-2 h-full overflow-hidden px-1 group-hover/item:bottom-18 transition-all lg:flex lg:flex-col lg:top-0 lg:bg-transparent lg:group-hover/item:top-0 group-hover/item:lg:h-fit lg:pt-1 lg:h-full  lg:w-fit">
                                <h3
                                    class="text-xs lg:text-sm font-extrabold group-hover/item:underline group-hover/item:text-amber-400">
                                    {{ $item->title }}
                                </h3>
                                <div
                                    class="hidden text-xs my-1 lg:flex lg:gap-1 text-gray-400 group-hover/item:text-gray-200">
                                    @foreach ($item->genres as $genre)
                                        <x-partials.span class="hover:text-amber-400">
                                            {{ $genre->name }}{{ $loop->last ? '' : ',' }}
                                        </x-partials.span>
                                    @endforeach
                                </div>
                                <p
                                    class=" hidden lg:block text-wrap overflow-ellipsis text-xs text-gray-400 group-hover/item:text-gray-200">
                                    {{ str($item->synopsis)->limit(200) }}
                                </p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>
        <x-layouts.sections.genres :$genres />
    </article>
</x-layouts.app>
