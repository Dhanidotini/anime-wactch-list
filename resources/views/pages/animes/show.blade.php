<x-layouts.app>
    <article class="flex flex-col gap-2 w-full md:grid md:grid-cols-4 md:gap-2 lg:px-48">
        <section class="w-full col-span-4 xl:col-span-3">
            <div class="md:flex">
                <div
                    class="pt-10 pb-16 bg-cover flex flex-col items-center text-center w-full bg-blend-darken drop-shadow-2xl md:bg-none md:items-start md:text-left md:pt-0 md:grow-0 md:w-70 md:h-fit md:bg-gray-800 md:rounded-md md:pb-3 md:shadow-lg bg-[url({{ '/storage/' . $anime->image->attachment }})]">
                    <img class="w-45 h-60 shadow-md shadow-black rounded md:w-fit md:h-fit md:shadow-none md:rounded-none"
                        src="{{ asset('storage/' . $anime->image->attachment) }}" alt="{{ $anime->title }}" />
                    <h3 class="font-bold text-xl md:p-2">{{ $anime->title }}</h3>
                    <span class="font-semibold text-xs md:p-2">{{ $anime->title_jp }}</span>
                </div>
                <div class="w-full grow">
                    <h4 class="mx-2 font-bold text-md">Details</h4>
                    <hr class="">
                    <table
                        class="table text-sm w-full [&_tr]:even:bg-gray-700 [&_th]:h-9 [&_th]:p-2 [&_th]:text-left [&_th]:w-30 [&_td]:text-sm [&_td]:p-2 **:align-top">
                        <tbody>
                            <tr>
                                <th>Title English</th>
                                <td>{!! $anime->title_eng ?? '<span class="text-gray-500">null</span>' !!}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{!! $anime->status->name ?? '<span class="text-gray-500">null</span>' !!}</td>
                            </tr>
                            <tr>
                                <th>Episodes</th>
                                <td>{!! $anime->episodes->count() ?? '<span class="text-gray-500">null</span>' !!}</td>
                            </tr>
                            <tr>
                                <th>Premiered</th>
                                <td>{!! $anime->premiered->name ?? '<span class="text-gray-500">null</span>' !!}</td>
                            </tr>
                            <tr>
                                <th>Airing Date</th>
                                <td>
                                    @if (is_null($anime->airing_date_start) && is_null($anime->airing_date_end))
                                        <span class="text-gray-500">null</span>
                                    @else
                                        {{ $anime->airing_date_start->format('d M Y') }}
                                        {{ isset($anime->airing_date_end) ? 'to' : '' }}
                                        {{ $anime->airing_date_end->format('d M Y') }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Type</th>
                                <td>{!! $anime->type->name ?? '<span class="text-gray-500">null</span>' !!}
                                </td>
                            </tr>
                            <tr>
                                <th>Source</th>
                                <td>{!! $anime->source->name ?? '<span class="text-gray-500">null</span>' !!}</td>
                            </tr>
                            <tr>
                                <th>Studios</th>
                                <td>
                                    @forelse ($anime->studios as $item)
                                        {{ $item->name }}{{ $loop->last ? '' : ',' }}
                                    @empty
                                        <span class="text-gray-500">null</span>
                                    @endforelse
                                </td>
                            </tr>
                            <tr>
                                <th>Producers</th>
                                <td>
                                    @forelse ($anime->producers as $item)
                                        {{ $item->name }}{{ $loop->last ? '' : ',' }}
                                    @empty
                                        <span class="text-gray-500">null</span>
                                    @endforelse
                                </td>
                            </tr>
                            <tr>
                                <th>Licensors</th>
                                <td>
                                    @forelse ($anime->licensors as $item)
                                        {{ $item->name }}
                                        {{ $loop->last ? '' : ',' }}
                                    @empty
                                        <span class="text-gray-500">null</span>
                                    @endforelse
                                </td>
                            </tr>
                            <tr>
                                <th>Genres</th>
                                <td>
                                    @forelse ($anime->genres as $item)
                                        {{ $item->name }}{{ $loop->last ? '' : ',' }}
                                    @empty
                                        <span class="text-gray-500">null</span>
                                    @endforelse
                                </td>
                            </tr>
                            <tr>
                                <th>Demographics</th>
                                <td>
                                    @forelse ($anime->demographics as $item)
                                        {{ $item->name }}{{ $loop->last ? '' : ',' }}
                                    @empty
                                        <span class="text-gray-500">null</span>
                                    @endforelse
                                </td>
                            </tr>
                            <tr>
                                <th>Themes</th>
                                <td>
                                    @forelse ($anime->themes as $item)
                                        {{ $item->name }}{{ $loop->last ? '' : ',' }}
                                    @empty
                                        <span class="text-gray-500">null</span>
                                    @endforelse
                                </td>
                            </tr>
                            <tr>
                                <th>Explicits</th>
                                <td>
                                    @forelse ($anime->explicits as $item)
                                        {{ $item->name }}{{ $loop->last ? '' : ',' }}
                                    @empty
                                        <span class="text-gray-500">null</span>
                                    @endforelse
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="grow-0">
                <h4 class="px-2 pt-1 font-bold">Synopsis</h4>
                <hr>
                <p class="m-2 font-light text-sm">
                    {{ $anime->synopsis }}
                </p>
            </div>
            <div class="grow-0">
                <h4 class="px-2 pt-1 font-bold">Episodes</h4>
                <hr>
                <ul>
                    @forelse ($anime->episodes as $item)
                        <li class="w-full odd:bg-gray-700 p-3 text-sm" key='{{ $loop->index }}'>
                            {{ $item->episode }}.
                            <a
                                href="{{ route('episode.show', ['anime' => $anime->slug, 'episode' => $item->episode]) }}">
                                {{ $item->title }}
                            </a>
                        </li>
                    @empty
                        <span>No episode yet.</span>
                    @endforelse
                </ul>
            </div>
        </section>
        </div>
        <x-layouts.sections.genres :$genres />
    </article>
</x-layouts.app>
