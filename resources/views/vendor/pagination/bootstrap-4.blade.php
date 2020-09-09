@if ($paginator->hasPages())
{{--    <nav>--}}
{{--        <ul class="pagination">--}}
{{--            <li class="disabled"><a href="#!"><i class="mdi-navigation-chevron-left"></i></a></li>--}}
{{--            <li class="active"><a href="#!">1</a></li>--}}
{{--            <li class="waves-effect"><a href="#!">2</a></li>--}}
{{--            <li class="waves-effect"><a href="#!">3</a></li>--}}
{{--            <li class="waves-effect"><a href="#!">4</a></li>--}}
{{--            <li class="waves-effect"><a href="#!">5</a></li>--}}
{{--            <li class="waves-effect"><a href="#!"><i class="mdi-navigation-chevron-right"></i></a></li>--}}
{{--        </ul>--}}

<div id="view-pagination">
    <div class="row">
        <div class="col s12">
            <ul class="pagination">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                        <i class="material-icons">navigate_before</i>
                    </li>
                @else
                    <li class="page-item">
                        <a class="waves-effect" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                            <i class="material-icons">navigate_before</i>
                        </a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="disabled" aria-disabled="true"><a href="#!">{{ $element }}</a></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="active" aria-current="page"><a href="#!">{{ $page }}</a></li>
                            @else
                                <li class="waves-effect"><a href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="waves-effect" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                            <i class="material-icons">navigate_next</i>
                        </a>
                    </li>
                @else
                    <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                        <i class="material-icons">navigate_next</i>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
{{--    </nav>--}}
@endif
