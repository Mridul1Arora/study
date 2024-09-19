<div class="row">
    <div class="col-sm-12 col-md-6">
        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
            <ul class="pagination" id="pagination">
                @php
                    $max_pages_to_show = 5;
                    $half_total_links = floor($max_pages_to_show / 2);
                    $start = $page - $half_total_links;
                    $end = $page + $half_total_links;

                    // Adjust start and end if they go out of bounds
                    if ($start < 1) {
                        $start = 1;
                        $end = $max_pages_to_show;
                    }

                    if ($end > $page_count) {
                        $start = $page_count - $max_pages_to_show + 1;
                        $end = $page_count;
                    }

                    // Ensure pagination does not show negative or nonexistent pages
                    $start = $start < 1 ? 1 : $start;
                    $end = $end > $page_count ? $page_count : $end;
                @endphp

                {{-- First page link --}}
                @if($start > 1)
                    <li class="paginate_button page-item">
                        <a href="?page=1&per_page={{ $per_page }}" aria-controls="DataTables_Table_0" role="link" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                    </li>
                    {{-- Ellipsis for hidden pages before start --}}
                    @if($start > 2)
                        <li class="paginate_button page-item disabled">
                            <a aria-controls="DataTables_Table_0" aria-disabled="true" role="link" data-dt-idx="ellipsis" tabindex="-1" class="page-link">…</a>
                        </li>
                    @endif
                @endif

                {{-- Display page links dynamically based on current page --}}
                @for($i = $start; $i <= $end; $i++)
                    <li class="paginate_button page-item {{ $page == $i ? 'active' : '' }}">
                        <!-- <a href="?page={{ $i }}&per_page={{ $per_page }}" aria-controls="DataTables_Table_0" role="link" data-dt-idx="{{ $i }}" tabindex="0" class="page-link">{{ $i }}</a> -->
                        <button onClick="changePage({{ $i }})" aria-controls="DataTables_Table_0" role="link" data-dt-idx="{{ $i }}" tabindex="0" class="page-link">{{ $i }}</button>
                    </li>
                @endfor

                {{-- Ellipsis for hidden pages after end --}}
                @if($end < $page_count)
                    @if($end < $page_count - 1)
                        <li class="paginate_button page-item disabled">
                            <a aria-controls="DataTables_Table_0" aria-disabled="true" role="link" data-dt-idx="ellipsis" tabindex="-1" class="page-link">…</a>
                        </li>
                    @endif
                    <li class="paginate_button page-item">
                        <a href="?page={{ $page_count }}&per_page={{ $per_page }}" aria-controls="DataTables_Table_0" role="link" data-dt-idx="{{ $page_count }}" tabindex="0" class="page-link">{{ $page_count }}</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
