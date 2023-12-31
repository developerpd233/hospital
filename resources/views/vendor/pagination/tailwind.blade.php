@if ($paginator->hasPages())
<nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4"
    aria-label="Table navigation">
    <span class="text-sm font-normal text-theme-primary-100 dark:text-gray-400">
        Showing
        <span class="font-semibold text-theme-primary-200 dark:text-white">{{ ($paginator->currentPage() - 1) *
            $paginator->perPage() + 1 }}-{{ min($paginator->currentPage() * $paginator->perPage(),
            $paginator->total()) }}</span>
        of
        <span class="font-semibold text-theme-primary-200 dark:text-white">{{ $paginator->total() }}</span>
    </span>
    <ul class="inline-flex items-stretch -space-x-px">
        @if ($paginator->onFirstPage())
        <li>
            <a href="#"
                class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-200 bg-theme-primary-500 rounded-l-lg border border-theme-success-200 cursor-not-allowed">
                <span class="sr-only">Previous</span>
                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                        clip-rule="evenodd" />
                </svg>
            </a>
        </li>
        @else
        <li>
            <a href="{{ $paginator->previousPageUrl() }}"
                class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-200 bg-theme-primary-500 rounded-l-lg border border-theme-success-200 hover:bg-theme-primary-300 hover:text-theme-primary-100 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                <span class="sr-only">Previous</span>
                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M12.707 5.293a1 1 0 010-1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                        clip-rule="evenodd" />
                </svg>
            </a>
        </li>
        @endif

        <!-- Show page numbers -->
        @for ($page = 1; $page <= $paginator->lastPage(); $page++)
            <li>
                <a href="{{ $paginator->url($page) }}"
                    class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-200 bg-theme-primary-500 border border-theme-success-200 hover:bg-theme-primary-300 hover:text-theme-primary-100 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">{{
                    $page }}</a>
            </li>
            @endfor

            @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}"
                    class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-200 bg-theme-primary-500 rounded-r-lg border border-theme-success-200 hover:bg-theme-primary-300 hover:text-theme-primary-100 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    <span class="sr-only">Next</span>
                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
            </li>
            @else
            <li>
                <a href="#"
                    class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-theme-success-200 cursor-not-allowed">
                    <span class="sr-only">Next</span>
                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
            </li>
            @endif
    </ul>
</nav>
@endif
