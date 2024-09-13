<div class="col-xl-3 col-md-4 col-12 filters" style="height: 120vh; width: 20vw;">
    <div class="card ps-5">
        <h5>Filter Leads By</h5>
        <div class="form-group d-flex align-items-center">
            <ul class="list-unstyled">
                @foreach($fields as $field)
                    <li class="ps-5 pt-3">
                        <input type="checkbox" class="me-2" data-bs-toggle="collapse" data-bs-target="#collapse{{ $field->field_name }}" id="{{$field->field_name}}" onchange="handleChange(this)" aria-expanded="false">{{$field->field_name_show}}
                        <div class="collapse" id="collapse{{ $field->field_name }}">
                            <div class="form-floating form-floating-outline">
                                <select id="dropdown{{ $field->field_name }}" class="form-select form-select-sm mt-2">
                                    <option value="1">is</option>
                                    <option value="2">isn't</option>
                                    <option value="3">is empty</option>
                                    <option value="4">isn't empty</option>
                                </select>
                                <label for="dropdown{{ $field->field_name }}">Select an Option</label>
                                <input type="text" class="form-control form-control-sm mt-2" id="{{ $field->field_name }}_input">
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div>
            <button type="button" class="btn btn-primary mb-2 d-none" id="apply_filters">Apply Filters</button>
        </div>
    </div>
</div>

<script>

    function handleChange(checkbox) {
       var applyBtn = document.getElementById('apply_filters');
       applyBtn.classList.remove('d-none');
    }

    function updatePagination(page_count, current_page, per_page) {
        
        var paginationUl = $('.pagination');
        paginationUl.empty();

        var max_pages_to_show = 5;
        var half_total_links = Math.floor(max_pages_to_show / 2);
        var start = current_page - half_total_links;
        var end = current_page + half_total_links;

        // Adjust start and end if they go out of bounds
        if (start < 1) {
            start = 1;
            end = max_pages_to_show;
        }

        if (end > page_count) {
            start = page_count - max_pages_to_show + 1;
            end = page_count;
        }

        // Ensure pagination does not show negative or nonexistent pages
        start = start < 1 ? 1 : start;
        end = end > page_count ? page_count : end;

        var html = '';

        // First page link and ellipsis if necessary
        if (start > 1) {
            html += `<li class="paginate_button page-item">
                        <button onClick="changePage(1)" class="page-link">1</button>
                    </li>`;
            if (start > 2) {
                html += `<li class="paginate_button page-item disabled">
                            <a class="page-link">…</a>
                        </li>`;
            }
        }

        // Generate page number buttons
        for (var i = start; i <= end; i++) {
            html += `<li class="paginate_button page-item ${current_page == i ? 'active' : ''}">
                        <button onClick="changePage(${i})" class="page-link">${i}</button>
                    </li>`;
        }

        // Last page link and ellipsis if necessary
        if (end < page_count) {
            if (end < page_count - 1) {
                html += `<li class="paginate_button page-item disabled">
                            <a class="page-link">…</a>
                        </li>`;
            }
            html += `<li class="paginate_button page-item">
                        <button onClick="changePage(${page_count})" class="page-link">${page_count}</button>
                    </li>`;
        }

        console.log(html);
    
        paginationUl.append(html);
    }

    function changePage(page) {
        
        $.ajax({
            url: "/leads/data",
            type: 'POST',
            data: { filters: JSON.stringify(getSelectedFilters()), page: page },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {

                console.log(response.page_count,response.current_page,response.per_page);                
                
                $('#leadsTableBody').empty();
                $('#leadsTableBody').append(response.html);
                updatePagination(response.page_count, response.current_page, response.per_page);
            },
            error: function() {
                alert('Error changing page');
            }
        });
    }

    function getSelectedFilters() {
        const filters = [];
        
        document.querySelectorAll('.filters ul li').forEach((filterItem) => {
            const checkbox = filterItem.querySelector('input[type="checkbox"]');
            const collapseDiv = filterItem.querySelector('.collapse');
            
            if (checkbox.checked) {
                const filterName = checkbox.id;
                const selectedOption = collapseDiv.querySelector('select').value;
                const inputValue = collapseDiv.querySelector('input').value;
                
                filters.push({
                    filterName: filterName,
                    selectedOption: selectedOption,
                    inputValue: inputValue
                });
            }
        });
        return filters;
    }
</script>
