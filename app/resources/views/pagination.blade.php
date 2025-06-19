@if ($paginator->hasPages())
    <div class="flex justify-center mt-8 space-x-2">
        @if ($paginator->onFirstPage())
            <span class="px-4 py-2 text-gray-400 cursor-default">
            &laquo;
        </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="px-4 py-2 bg-white border rounded hover:bg-gray-100">
                &laquo;
            </a>
        @endif


        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span class="px-4 py-2 text-gray-400 cursor-default">
                {{ $element }}
            </span>
            @endif


            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="px-4 py-2 bg-blue-500 text-white rounded">
                        {{ $page }}
                    </span>
                    @else
                        <a href="{{ $url }}" class="px-4 py-2 bg-white border rounded hover:bg-gray-100">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach


        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="px-4 py-2 bg-white border rounded hover:bg-gray-100">
                &raquo;
            </a>
        @else
            <span class="px-4 py-2 text-gray-400 cursor-default">
            &raquo;
        </span>
        @endif
    </div>
@endif
