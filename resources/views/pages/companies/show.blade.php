<x-layouts.app>
    <article class="flex flex-col w-full lg:grid lg:grid-cols-4 lg:gap-2 lg:px-48">
        <section class="w-full lg:w-fit col-span-3 lg:col-span-full xl:col-span-3">
            <x-partials.breadcrumb>
                <a href="{{ route('company.index') }}">Companies</a>
                >
                {{ $company->name }}
            </x-partials.breadcrumb>
            <div>
                <h2 class="mx-2 font-bold text-md">{{ str($company->name . ' ' . 'Anime')->plural() }}</h2>
                <hr>
            </div>
            <div class="mx-2 grid grid-cols-3 gap-2.5 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-1 my-5">
                @foreach ($company->allAnimes()->get() as $item)
                    <x-partials.animes :$item />
                @endforeach
            </div>
        </section>
        <x-layouts.sections.genres :$genres />
    </article>
</x-layouts.app>
