<x-layouts.app>
    <article class="flex flex-col w-full lg:grid lg:grid-cols-4 lg:gap-2 lg:px-48">
        <x-layouts.sections.default name='All Anime' :items='$animes'></x-layouts.sections.default>
        <x-layouts.sections.genres :$genres />
    </article>
</x-layouts.app>
