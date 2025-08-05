<x-layouts.app>
    <article class="w-full lg:px-48">
        <x-partials.breadcrumb>
            Genres
        </x-partials.breadcrumb>
        <x-layouts.sections.genres :$genres />
        <x-layouts.sections.genres :genres='$themes' name='Themes' />
        <x-layouts.sections.genres :genres='$demographics' name='Demographics' />
        <x-layouts.sections.genres :genres='$explicits' name='Explicit Genre' />
    </article>
</x-layouts.app>
