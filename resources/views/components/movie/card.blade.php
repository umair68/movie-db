@props(['movie'])

<article
        class="group relative flex-shrink-0 overflow-hidden rounded-xl bg-white shadow-lg transition duration-300 ease-in-out hover:scale-102 hover:shadow-xl dark:bg-gray-800 w-[280px] sm:w-[300px]">
    {{-- Image Container --}}
    <div class="aspect-[2/3] w-full">
        <picture class="h-full w-full">
            <source
                    media="(min-width: 1024px)"
                    srcset="{{ \App\Helper\Common::mediaSize($movie->backdrop_path, 'w500') }}"
            >
            <source
                    media="(min-width: 768px)"
                    src="{{ \App\Helper\Common::mediaSize($movie->backdrop_path, 'w342') }}"
            >
            <img
                    src="{{ \App\Helper\Common::mediaSize($movie->backdrop_path, 'w342') }}"
                    alt="{{ $movie->title }} Poster"
                    class="h-full w-full object-cover"
                    loading="lazy"
            >
        </picture>
    </div>

    {{-- Fixed Title Bar at Bottom --}}
    <div class="absolute bottom-0 left-0 right-0 bg-black/80 p-3 backdrop-blur-sm">
        <div class="flex items-center justify-between gap-2">
            <h3 class="text-white font-medium line-clamp-1">{{ $movie->title }}</h3>
            <div class="flex-shrink-0 flex items-center space-x-1 rounded-full bg-yellow-400 px-2 py-0.5">
                <svg class="h-3.5 w-3.5 text-yellow-700" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                </svg>
                <span class="text-xs font-bold text-yellow-900">{{ number_format($movie->vote_average, 1) }}</span>
            </div>
        </div>
    </div>

    {{-- Hover Overlay with Additional Details --}}
    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/70 to-transparent opacity-0 transition-opacity duration-300 group-hover:opacity-100">
        <div class="absolute inset-0 p-4 flex flex-col justify-end translate-y-8 transition-transform duration-300 ease-out group-hover:translate-y-0">
            <div class="space-y-3 text-white">
                {{-- Overview --}}
                <p class="text-sm font-medium text-gray-100 line-clamp-3 leading-relaxed">{{ $movie->overview }}</p>

                {{-- Bottom Info --}}
                <div class="flex items-center justify-between pt-2">
                    <span class="text-sm font-medium text-gray-200 bg-black/30 px-2 py-1 rounded-md">
                        {{$movie->release_date->format('Y') }}
                    </span>
                    <a
                            href="#"
                            class="rounded-full bg-white/90 px-4 py-1.5 text-sm font-bold text-gray-900 shadow-lg backdrop-blur-sm transition-colors duration-300 hover:bg-white hover:text-black"
                    >
                        Details
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Badge --}}
    @if($movie->vote_average >= 7.5)
        <div class="absolute left-2 top-2 rounded-full bg-green-500 px-3 py-1 text-xs font-bold text-white shadow-lg">
            Must Watch
        </div>
    @endif
</article>
