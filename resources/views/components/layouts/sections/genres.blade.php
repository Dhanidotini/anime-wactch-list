 <section class="lg:block lg:w-full lg:col-span-full xl:col-span-1">
     <div>
         <h2 class="px-2 font-bold text-md">All Genres</h2>
         <hr>
         <div class="m-2 grid grid-cols-2 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-3 gap-1">
             @foreach ($genres as $item)
                 <x-partials.span
                     class="border border-gray-400 hover:border-amber-600 rounded-lg p-0.5 hover:bg-amber-600">
                     {{ $item->name }}
                 </x-partials.span>
             @endforeach
         </div>
     </div>
 </section>
