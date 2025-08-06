<x-layouts.app>
    <article class="flex flex-col gap-2 w-full md:grid md:grid-cols-4 md:gap-2 lg:px-48">
        <section class="w-full col-span-4 xl:col-span-3">
            <x-partials.breadcrumb>
                <a href="{{ route('anime.index') }}">Anime</a>
                >
                {{ $anime->title }}
            </x-partials.breadcrumb>
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
                        class="table text-sm w-full [&_tr]:even:bg-gray-700 [&_th]:h-9 [&_th]:p-2 [&_th]:text-left [&_th]:w-30 [&_td]:text-sm [&_td]:p-2 **:align-top [&_a]:text-blue-400/80 [&_a]:hover:underline">
                        <tbody>
                            <tr>
                                <th>Title English</th>
                                <td>{!! $anime->title_eng ?? '<span class="text-gray-500">No have yet.</span>' !!}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{!! $anime->status->name ?? '<span class="text-gray-500">No have yet.</span>' !!}</td>
                            </tr>
                            @if ($anime->type->name !== 'Movie')
                                <tr>
                                    <th>Episodes</th>
                                    <td>
                                        @if ($anime->episodes->count() != 0)
                                            {{ $anime->episodes->count() }}
                                        @else
                                            <span class="text-gray-500">No have yet.</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Premiered</th>
                                    <td>
                                        @isset($anime->premiered)
                                            {{ $anime->premiered->name }}
                                            @isset($anime->airing_date_start)
                                                {{ $anime->airing_date_start->year }}
                                            @endisset
                                        @else
                                            <span class="text-gray-500">No have yet.</span>
                                        @endisset
                                    </td>
                                </tr>
                            @endif
                            <tr>
                                <th>Airing Date</th>
                                <td>
                                    @if (is_null($anime->airing_date_start) && is_null($anime->airing_date_end))
                                        <span class="text-gray-500">No have yet.</span>
                                    @else
                                        {{ $anime->airing_date_start->format('d M Y') }}
                                        {{ isset($anime->airing_date_end) ? 'to ' . $anime->airing_date_end->format('d M Y') : '' }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Type</th>
                                <td>
                                    @isset($anime->type)
                                        <a href="{{ route('anime.index') }}">{{ $anime->type->name }}</a>
                                    @else
                                        <span class="text-gray-500">No have yet.</span>
                                    @endisset
                                </td>
                            </tr>
                            <tr>
                                <th>Source</th>
                                <td>{!! $anime->source->name ?? '<span class="text-gray-500">No have yet.</span>' !!}</td>
                            </tr>
                            <tr>
                                <th>Studios</th>
                                <td>
                                    @forelse ($anime->studios as $item)
                                        <a href="{{ route('company.show', $item->slug) }}">
                                            {{ $item->name }}</a>{{ $loop->last ? '' : ',' }}
                                    @empty
                                        <span class="text-gray-500">No have yet.</span>
                                    @endforelse
                                </td>
                            </tr>
                            <tr>
                                <th>Producers</th>
                                <td>
                                    @forelse ($anime->producers as $item)
                                        <a href="{{ route('company.show', $item->slug) }}">
                                            {{ $item->name }}</a>{{ $loop->last ? '' : ',' }}
                                    @empty
                                        <span class="text-gray-500">No have yet.</span>
                                    @endforelse
                                </td>
                            </tr>
                            <tr>
                                <th>Licensors</th>
                                <td>
                                    @forelse ($anime->licensors as $item)
                                        <a href="{{ route('company.show', $item->slug) }}">
                                            {{ $item->name }}</a>{{ $loop->last ? '' : ',' }}
                                    @empty
                                        <span class="text-gray-500">No have yet.</span>
                                    @endforelse
                                </td>
                            </tr>
                            <tr>
                                <th>Genres</th>
                                <td>
                                    @forelse ($anime->genres as $item)
                                        <a href="{{ route('genre.show', $item->slug) }}">
                                            {{ $item->name }}</a>{{ $loop->last ? '' : ',' }}
                                    @empty
                                        <span class="text-gray-500">No have yet.</span>
                                    @endforelse
                                </td>
                            </tr>
                            <tr>
                                <th>Themes</th>
                                <td>
                                    @forelse ($anime->themes as $item)
                                        <a href="{{ route('genre.show', $item->slug) }}">
                                        {{ $item->name }}</a>{{ $loop->last ? '' : ',' }} @empty
                                        <span class="text-gray-500">No have yet.</span>
                                    @endforelse
                                </td>
                            </tr>
                            <tr>
                                <th>Demographics</th>
                                <td>
                                    @forelse ($anime->demographics as $item)
                                        <a href="{{ route('genre.show', $item->slug) }}">
                                        {{ $item->name }}</a>{{ $loop->last ? '' : ',' }} @empty
                                        <span class="text-gray-500">No have yet.</span>
                                    @endforelse
                                </td>
                            </tr>
                            @isset($anime->explicits)
                                <tr>
                                    <th>Explicits</th>
                                    <td>
                                        @foreach ($anime->explicits as $item)
                                            {{ $item->name }}{{ $loop->last ? '' : ',' }}
                                        @endforeach
                                    </td>
                                </tr>
                            @endisset
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
                <div class="grid grid-cols-5 grid-rows-1 px-3 pt-1">
                    <h4 class="font-bold">Episodes</h4>
                    <h4 class="font-bold col-start-5">Release Date</h4>
                </div>
                <hr>
                <ul>
                    @forelse ($episodes as $item)
                        <li class="odd:bg-gray-700 group" key='{{ $loop->index }}'>
                            <a class="w-full p-3 rounded border border-transparent text-sm grid grid-cols-5 grid-rows-1 group-hover:border-amber-500"
                                href="{{ route('episode.show', ['anime' => $anime->slug, 'episode' => $item->episode]) }}">
                                <div class="col-span-3 flex gap-1 items-start">
                                    @if ($anime->type->name !== 'Movie')
                                        {{ $item->episode }}.
                                    @endif
                                    <span
                                        class="text-gray-200 group-hover:underline group-hover:text-amber-500">{{ $item->title }}</span>
                                </div>
                                <div class="col-start-5 px-1">
                                    @if ($item->release_date->diffInYears(now()) <= 1)
                                        {{ $item->release_date->diffForHumans() }}
                                    @else
                                        {{ $item->release_date->locale('id')->format('d F Y') }}
                                    @endif
                                </div>
                            </a>
                        </li>
                    @empty
                        <span>No episode yet.</span>
                    @endforelse
                </ul>
            </div>
        </section>
        <x-layouts.sections.genres :$genres />
    </article>
</x-layouts.app>
