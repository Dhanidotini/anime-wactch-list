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
                        <a class="border border-gray-400 hover:border-amber-600 rounded-lg p-1 hover:bg-amber-600 text-center hover:underline"
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
