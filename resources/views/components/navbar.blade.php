<nav class="flex justify-between lg:px-48 w-full p-5 bg-gray-900 text-white shadow">
    <div>
        <a href="/" class=" font-bold text-xl">
            {{ config('app.name') }}
        </a>
    </div>
    <ul class=" flex gap-2 font-semibold">
        <li>
            <a href="{{ route('anime.index') }}">
                Animes
            </a>
        </li>
        <li>
            <a href="{{ route('genre.index') }}">
                Genres
            </a>
        </li>
    </ul>
</nav>
