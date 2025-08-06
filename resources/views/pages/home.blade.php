<x-layouts.app>
    <article class="grid w-full md:grid-cols-1 lg:grid-cols-3 xl:grid-cols-4 lg:gap-2 lg:px-48">
        <div class="lg:grow lg:col-span-3">
            <x-layouts.sections.default name='Latest Anime' :items='$tvAnimes' />
            <x-layouts.sections.default name='Latest Movie' :items='$movieAnimes' />
        </div>
        <div class="grow-0 lg:col-span-full xl:col-auto">
            <x-layouts.sections.genres :$genres />
        </div>
    </article>
</x-layouts.app>
