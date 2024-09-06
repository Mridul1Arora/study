<div class="row">
    <div class="col-sm-12 col-md-6">
        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
            <ul class="pagination" id="pagination">
                @php $i = 1; @endphp
                @if($page_count < 5)
                    @for($i = 1; $i <= $page_count; $i++)
                        <li class="paginate_button page-item {{ $page == $i ? 'active' : '' }}">
                            <a href="?page={{ $i }}&per_page={{ $per_page }}" aria-controls="DataTables_Table_0" role="link" data-dt-idx="{{ $i }}" tabindex="0" class="page-link">{{ $i }}</a>
                        </li>
                    @endfor
                @endif
                @if($page_count > 5)
                    @for($i = 1; $i <= 3; $i++)
                        <li class="paginate_button page-item {{ $page == $i ? 'active' : '' }}">
                            <a href="?page={{ $i }}&per_page={{ $per_page }}" aria-controls="DataTables_Table_0" role="link" data-dt-idx="{{ $i }}" tabindex="0" class="page-link">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="paginate_button page-item disabled" id="DataTables_Table_0_ellipsis">
                        <a aria-controls="DataTables_Table_0" aria-disabled="true" role="link" data-dt-idx="ellipsis" tabindex="-1" class="page-link">…</a>
                    </li>
                    @for($i = $page_count - 1; $i <= $page_count; $i++)
                        <li class="paginate_button page-item {{ $page == $i ? 'active' : '' }}">
                            <a href="?page={{ $i }}&per_page={{ $per_page }}" aria-controls="DataTables_Table_0" role="link" data-dt-idx="{{ $i }}" tabindex="0" class="page-link">{{ $i }}</a>
                        </li>
                    @endfor
                @endif
            </ul>
        </div>
    </div>
</div>

