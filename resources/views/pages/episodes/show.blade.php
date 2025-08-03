<x-layouts.app>
    <section class="lg:px-48 w-full h-full">
        <div class=" text-sm text-gray-400 mt-2 mb-4 mx-2 [&_a]:hover:underline [&_a]:hover:text-white">
            <x-partials.breadcrumb :anime='$episode->anime' :$episode />
            <div class="mx-2 pb-2">
                <h5 class="font-bold">{{ $episode->title }}</h5>
                <p class=" text-xs">Release at {{ $episode->release_date->diffForHumans() }} by Admin</p>
            </div>
            <hr>
            <iframe class="w-full h-[25rem]" src="{{ config('services.abyss.slug') . $episode->id_video }}" scrolling="0"
                frameborder="0" allowfullscreen></iframe>
    </section>
</x-layouts.app>
