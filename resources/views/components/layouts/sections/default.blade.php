<section class="w-full lg:w-fit col-span-3 lg:col-span-full xl:col-span-3">
    <div>
        <h2 class="mx-2 font-bold text-md">{{ $name ?? 'Latest' }}</h2>
        <hr>
    </div>
    <div class="mx-2 grid grid-cols-3 gap-2.5 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-1 my-5">
        @forelse ($items as $item)
            <x-partials.animes :$item />
        @empty
            <span>Nothing.</span>
        @endforelse
    </div>
</section>
