<x-layouts.app>
    <section class="lg:px-48 w-full h-full">
        <div class=" text-sm mt-2 mb-4 mx-2 [&_a]:hover:underline [&_a]:hover:text-white">
            <x-partials.breadcrumb>
                <a href="{{ route('anime.index') }}">Anime</a>
                >
                <a href="{{ route('anime.show', $episode->anime->slug) }}">
                    {{ $episode->anime->title }}
                </a>
                >
                Episode {{ $episode->episode }}
            </x-partials.breadcrumb>
            <div class="mx-2 pb-2 text-white">
                <h5 class="font-bold">{{ $episode->title }}</h5>
                <p class="text-gray-400 text-xs">Release at {{ $episode->release_date->diffForHumans() }} by Admin</p>
            </div>
            <hr>
            <iframe class="w-full h-[25rem]" src="{{ config('services.abyss.slug') . $episode->id_video }}" scrolling="0"
                frameborder="0" allowfullscreen></iframe>
    </section>
</x-layouts.app>
