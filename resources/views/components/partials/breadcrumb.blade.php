<div>
    <div
        class=" text-sm text-gray-400 mt-2 mb-4 mx-2 [&_a]:hover:underline [&_a]:hover:text-white [&_a]:text-blue-400/70">
        <a href="{{ route('home') }}">Home</a>
        >
        <a href="{{ route('anime.index') }}">Anime</a>
        >
        <a href="{{ route('anime.show', $anime->slug) }}">{{ $anime->title }}</a>
        @isset($episode)
            >
            Episode {{ $episode->episode }}
        @endisset
    </div>
</div>
