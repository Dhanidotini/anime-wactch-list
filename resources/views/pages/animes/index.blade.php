<x-layouts.app>
    <article class="flex flex-col w-full lg:grid lg:grid-cols-4 lg:gap-2 lg:px-48">
        <section class="w-full col-span-4 xl:col-span-3">
            <x-partials.breadcrumb>
                {{ $name ?? 'Animes' }}
            </x-partials.breadcrumb>
            <x-layouts.sections.default name='All Anime' :items='$animes' />
        </section>
        <x-layouts.sections.genres :$genres />
    </article>
</x-layouts.app>
