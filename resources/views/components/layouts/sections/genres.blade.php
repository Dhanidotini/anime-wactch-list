@php
    use Illuminate\Support\Facades\Route;
    $isGenrePage = Route::is('genre.index');
@endphp

<section class="lg:block lg:w-full lg:col-span-full xl:col-span-1">
    <div>
        <h2 class="px-2 font-bold text-md">{{ $name ?? 'Genres' }}</h2>
        <hr>
        <div @class([
            'm-2 grid grid-cols-2 sm:grid-cols-4 md:grid-cols-5 gap-1',
            'lg:grid-cols-5' => $isGenrePage,
            'lg:grid-cols-3' => !$isGenrePage,
        ])>
            @foreach ($genres as $item)
                <a class="border border-gray-400 hover:border-amber-600 rounded-lg p-1 hover:bg-amber-600 text-center hover:underline"
                    href="{{ route('genre.show', $item->slug) }}">
                    <x-partials.span>
                        {{ $item->name }}
                    </x-partials.span>
                </a>
            @endforeach
        </div>
    </div>
</section>
