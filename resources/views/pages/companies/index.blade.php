<x-layouts.app>
    <article class="w-full lg:px-48">
        <x-partials.breadcrumb>
            Companies
        </x-partials.breadcrumb>
        <section class="lg:block lg:w-full lg:col-span-full xl:col-span-1">
            <div>
                <h2 class="px-2 font-bold text-md">All Company</h2>
                <hr>
                <div class="w-full mt-1 mx-2">
                    <ol class='list-disc list-inside gap-3 grid grid-cols-3'>
                        @foreach ($companies as $item)
                            <li
                                class="p-1 group border rounded border-transparent hover:border-amber-500 hover:bg-gray-900">
                                <a class="underline underline-offset-auto group-hover:underline group-hover:text-amber-500"
                                    href="{{ route('company.show', $item->slug) }}">
                                    {{ $item->name }}
                                </a>
                            </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </section>

    </article>
</x-layouts.app>
