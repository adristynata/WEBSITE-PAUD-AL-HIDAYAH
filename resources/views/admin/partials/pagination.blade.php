@if ($paginator->hasPages())
    <div class="custom-pagination-container">
        <div class="pagination-info">
            Menampilkan <span>{{ $paginator->firstItem() ?? 0 }}</span> - <span>{{ $paginator->lastItem() ?? 0 }}</span> dari <span>{{ $paginator->total() }}</span> data
        </div>

        <ul class="pagination-list">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link page-nav-btn">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px;"><polyline points="15 18 9 12 15 6"/></svg>
                        <span>Sebelumnya</span>
                    </span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link page-nav-btn" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px;"><polyline points="15 18 9 12 15 6"/></svg>
                        <span>Sebelumnya</span>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- Three Dots --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link page-dots">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page"><span class="page-link page-number">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link page-number" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link page-nav-btn" href="{{ $paginator->nextPageUrl() }}" rel="next">
                        <span>Berikutnya</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px;"><polyline points="9 18 15 12 9 6"/></svg>
                    </a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link page-nav-btn">
                        <span>Berikutnya</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px;"><polyline points="9 18 15 12 9 6"/></svg>
                    </span>
                </li>
            @endif
        </ul>
    </div>
@endif
