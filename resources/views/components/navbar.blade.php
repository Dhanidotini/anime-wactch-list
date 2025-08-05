<nav class="flex justify-between lg:px-48 w-full p-5 bg-gray-900 text-white shadow">
    <div>
        <a href="/" class=" font-bold text-xl">
            {{ config('app.name') }}
        </a>
    </div>
    <ul class="flex gap-4 text-sm font-bold [&_a]:text-gray-200 [&_a]:hover:text-amber-500 [&_a]:hover:underline">
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
        <li>
            <a href="{{ route('company.index') }}">
                Companies
            </a>
        </li>
    </ul>
</nav>
