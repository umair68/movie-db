@props(['movie'])
<article
        class="group relative flex-shrink-0 overflow-hidden rounded-xl bg-white shadow-lg transition duration-300 hover:shadow-xl dark:bg-gray-800">
    {{-- Container --}}
    <div class="relative flex h-[200px] sm:h-[220px] w-full sm:w-[600px] overflow-hidden">
        {{-- Backdrop Image --}}
        <div class="absolute inset-0 w-full h-full">
            <picture>
                <source
                        media="(min-width: 640px)"
                        srcset="{{ \App\Helper\Common::mediaSize($movie->backdrop_path, 'w780') }}"
                >
                <img
                        src="{{ \App\Helper\Common::mediaSize($movie->backdrop_path, 'w500') }}"
                        alt="{{ $movie->title }} Backdrop"
                        class="h-full w-full object-fill brightness-50"
                        loading="lazy"
                >
            </picture>
        </div>

        {{-- Poster Image --}}
        <div class="relative z-10 ml-4 overflow-hidden m-auto">
            <div class="overflow-hidden rounded-lg shadow-2xl h-[156px] w-[104px] sm:h-[156px] sm:w-[104px]">
                <picture>
                    <source
                            media="(min-width: 640px)"
                            srcset="{{ \App\Helper\Common::mediaSize($movie->poster_path,'w342') }}"
                    >
                    <img
                            src="{{ \App\Helper\Common::mediaSize($movie->poster_path,'185') }}"
                            alt="{{ $movie->title }} Poster"
                            class="h-full w-full object-fit"
                            loading="lazy"
                    >
                </picture>
            </div>
        </div>


        {{-- Content Overlay --}}
        <div class="relative flex-1 pl-6 pr-4 py-4 flex flex-col justify-between">
            {{-- Top Section --}}
            <div>
                <div class="flex items-start justify-between">
                    <h3 class="text-xl sm:text-2xl font-bold text-white line-clamp-1 mr-2">{{ $movie->title }}</h3>
                    <div class="flex-shrink-0 flex items-center space-x-1 rounded-full bg-yellow-400 px-2.5 py-1">
                        <svg class="h-4 w-4 text-yellow-700" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <span class="text-sm font-bold text-yellow-900">{{ number_format($movie->vote_average, 1) }}</span>
                    </div>
                </div>

                <div class="mt-1 flex items-center space-x-2 text-gray-300 text-sm">

                    <span>{{ $movie->year }}</span>
                    @if($movie->runtime)
                        <span>•</span>
                        <span>{{ $movie->runtime }} min</span>
                    @endif
                </div>
            </div>

            {{-- Middle Section (Overview) --}}
            <p class="mt-2 text-sm text-gray-300 line-clamp-2 sm:line-clamp-3">{{ $movie->overview }}</p>

            {{-- Bottom Section --}}
            <div class="mt-4 flex items-center justify-between">
                @if($movie->vote_average >= 7.5)
                    <span class="rounded-full bg-green-500 px-3 py-1 text-xs font-bold text-white">
                        Must Watch
                    </span>
                @else
                    <span></span>
                @endif

                <a
                        href="#"
                        class="rounded-full bg-white/90 px-4 py-1.5 text-sm font-bold text-gray-900 shadow-lg backdrop-blur-sm transition-colors duration-300 hover:bg-white"
                >
                    View Details
                </a>
            </div>
        </div>
    </div>
</article>
