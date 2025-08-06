@php
    use Illuminate\Support\Facades\Route;
    $isGenrePage = Route::is('genre.index');
@endphp

<section class="col-span-full lg:block lg:w-full xl:col-span-1">
    <div>
        <h2 class="px-2 font-bold text-md">{{ $name ?? 'Genres' }}</h2>
        <hr>
        <div @class([
            'm-2 grid grid-cols-2 sm:grid-cols-4 md:grid-cols-5 gap-1',
            'lg:grid-cols-5' => $isGenrePage,
            'lg:grid-cols-3' => !$isGenrePage,
        ])>
            @foreach ($genres as $item)
                <a class="border-2 border-gray-500 hover:border-amber-500 rounded-lg p-0.5 hover:text-amber-500 text-center hover:underline"
                    href="{{ route('genre.show', $item->slug) }}">
                    <x-partials.span>
                        {{ $item->name }}
                    </x-partials.span>
                </a>
            @endforeach
        </div>
    </div>
</section>
