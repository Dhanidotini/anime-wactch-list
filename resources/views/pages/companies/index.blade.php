<x-layouts.app>
    <article class="w-full lg:px-48">
        <x-partials.breadcrumb>
            Companies
        </x-partials.breadcrumb>

        <section class="lg:block lg:w-full lg:col-span-full xl:col-span-1">
            <div>
                <h2 class="px-2 font-bold text-md">All Company</h2>
                <hr>
                <div
                    class=
                    'm-2 grid grid-cols-2 gap-1 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-4 xl:grid-cols-6'>
                    @foreach ($companies as $item)
                        <a class="border-2 border-gray-500 hover:border-amber-500 rounded-lg p-0.5 hover:text-amber-500 hover:underline text-center"
                            href="{{ route('company.show', $item->slug) }}">
                            <x-partials.span>
                                {{ $item->name }}
                            </x-partials.span>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

    </article>
</x-layouts.app>
