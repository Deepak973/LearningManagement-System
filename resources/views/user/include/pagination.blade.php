@if ($paginator->hasPages())
<nav>
    <ul class="pagination mb-0 justify-content-center">
        @if (!$paginator->onFirstPage())
            <li class="page-item">
                <a class="page-link prev" href="{{ $paginator->previousPageUrl() }}"><i class="ik ik-chevron-left"></i></a>
            </li>
        @endif
        
        @foreach ($elements as $element)
            @if (is_string($element))
            <li class="page-item">
                <a href="javascript:void(0);" class="page-link">{{ $element }}</a>
            </li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active">
                            <a href="javascript:void(0);" class="page-link">{{ $page }}</a>
                        </li>
                    @else
                        <li class="page-item">
                            <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach
        
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a href="{{ $paginator->nextPageUrl() }}" class="page-link next"><i class="ik ik-chevron-right"></i></a>
            </li>
        @endif
    </ul>
</nav>
@endif
