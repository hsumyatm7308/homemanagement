@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
                  {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())

                    <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                        <span aria-hidden="true">
                            <div class="previous-btn">
                                &lsaquo;
                            </div>
                        </span>
                    </li>

                @else
                <div class="">

                    <li>
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                            <div class="previous-btn">
                               &lsaquo;    
                            </div>
                        </a>
                    </li>
                </div>

                @endif
    
                {{-- Pagination Elements --}}
        
                    @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                        @endif
            
                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <div class=" ">
                                        <li class="element active" aria-current="page"><span>{{ $page }}</span></li>
                                    </div>
                                @else
                                        <a class="element nonactive" href="{{ $url }}">
                                            <div class="">
                                              {{ $page }}
                                           </div>
                                        </a>
                                @endif
                            @endforeach
                        @endif
                   @endforeach
    
                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                        <li>
                            <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                                <div class="next-btn">
                                    &rsaquo;
                               </div>
                            </a>
                        </li>

                @else
                        <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                            <span aria-hidden="true">
                                <div class="next-btn">
                                    &rsaquo;
                                </div>
                            </span>
                        </li>

                @endif
    </ul>
    </nav>
@endif

<style>

    .pagination{
        display: flex;
        justify-content: center;
        align-items: center;

    }
    .previous-btn,.next-btn{
        width: 30px;
        height: 30px;
        color: white;
        background: rgb(75, 115, 153);
        border-radius: 50%;

        display: flex;
        justify-content: center;
        align-items: center;
    }

    .previous-btn{
        margin-right: 5px;
    }
    .next-btn{
        margin-left: 5px;
    }

    .element{
        width: 35px;
        height: 35px;
        background: #fefefe ;

        display: flex;
        justify-content: center;
        align-items: center;
        margin:0px 5px 0px 5px;
    }

    .active{
        font-weight: bolder;
        color: rgb(28, 28, 134);
        border:1px dashed rgb(28, 28, 134);
        border-radius: 50%;

    }

    .nonactive{
        color: black
    }

</style>
