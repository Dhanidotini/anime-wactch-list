<nav class="flex justify-between px-2 lg:px-48 w-full p-5 bg-gray-900 text-white shadow items-center">
    <div>
        <a href="/" class=" font-bold text-xl">
            {{ config('app.name') }}
        </a>
    </div>
    <ul class="flex gap-4 text-sm font-bold [&_a]:text-gray-200 [&_a]:hover:text-amber-500 [&_a]:hover:underline">
        <li class="group">
            <a class="after:content-['>']">
                Animes
            </a>
            <ol
                class="invisible group-hover:visible absolute bg-gray-900 [&_li]:before:content-['>'] rounded-lg pl-2 pr-4 py-2 flex flex-col gap-2">
                <li class="relative">
                    <a href="{{ route('anime.index') }}">TVs</a>
                </li>
                <li class="relative">
                    <a href="{{ route('anime.movie') }}">Movies</a>
                </li>
            </ol>
        </li>
        <li>
            <a href="{{ route('genre.index') }}">
                Genres
            </a>
        </li>
        <li>
            <a href="{{ route('company.index') }}">
                Companies
            </a>
        </li>
    </ul>
</nav>
