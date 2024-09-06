<div class="col-xl-3 col-md-4 col-12 invoice-actions" style="height: 70vh; width: 20vw;">
    <div class="card ps-5">
        <h5>Filter Leads By</h5>
        <div class="form-group d-flex align-items-center">
            <ul class="list-unstyled">
                @foreach($fields as $field)
                    <li class="ps-5">
                        <input type="checkbox" class="me-2" data-bs-toggle="collapse" data-bs-target="#collapse{{ $field->field_name }}" id="{{$field->field_name}}" aria-expanded="false">{{$field->field_name_show}}
                        <div class="collapse" id="collapse{{ $field->field_name }}">
                            <div class="form-floating form-floating-outline">
                                <select id="dropdown{{ $field->field_name }}" class="form-select mt-2">
                                    <option value="1">is</option>
                                    <option value="2">isn't</option>
                                    <option value="3">is empty</option>
                                    <option value="4">isn't empty</option>
                                </select>
                                <label for="dropdown{{ $field->field_name }}">Select an Option</label>
                                <input type="text" class="form-control mt-2" id="{{ $field->field_name }}_input">
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div>
            <button type="button" class="btn btn-primary mb-2" id="apply_filters" onClick="applyFilters()">Apply Filters</button>
        </div>
    </div>
</div>

<script>

    function applyFilters() {
        const filters = [];
        
        document.querySelectorAll('.invoice-actions ul li').forEach((filterItem) => {
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
        
        const filter_str = JSON.stringify(filters);
        
        $.ajax({
            url: "/leads/data",
            type: 'GET',
            data: { filter_data: filter_str },
            success: function(response) {
                updateLeadsTable(response.leads, response.per_page, response.current_page, response.page_count);
                updatePagination(response.page_count, response.current_page, response.per_page);
            },
            error: function() {
                alert('Error applying filters');
            }
        });
    }


    function updateLeadsTable(leads, per_page, current_page, page_count) {
        var tableBody = $('#leadsTableBody');
        tableBody.empty();

        leads.forEach(function(lead) {
            var row = `
                <tr>
                <td class="control" tabindex="0" style="display: none;"></td>
                <td class="dt-checkboxes-cell">
                    <input type="checkbox" class="dt-checkboxes form-check-input">
                </td>
                <td>${lead.lead_name}</td>
                <td>${lead.phone}</td>
                <td>${lead.email}</td>
                <td>${lead.lead_stage}</td>
                <td>${lead.city}</td>
                <td>${lead.current_state}</td>
                <td>${lead.lead_owner}</td>
                <td>${lead.preferred_intake}</td>
                <td>${lead.ielts_score}</td>
                <td>${lead.sat_score}</td>
                <td>${lead.lead_status}</td>
                <td>${lead.work_experience}</td>
                <td>${lead.preferred_course_of_study}</td>
                <td>${lead.preferred_universities}</td>
                <td>
                    <div class="d-inline-block">
                    <a href="javascript:;" class="btn btn-sm btn-text-secondary rounded-pill btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="ri-more-2-line"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end m-0">
                        <li><a href="/get-lead-details/${lead._id}" class="dropdown-item">Details</a></li>
                        <li><button class="dropdown-item" onClick="openModal('${lead._id}')" data-bs-toggle="modal" data-bs-target="#editDetailsModal">Edit</button></li>
                        <li><button onClick="deleteLead('${lead.id}')" class="dropdown-item delete-lead">Delete</button></li>
                    </ul>
                    </div>
                </td>
                </tr>
            `;

            tableBody.append(row);
        });
    }

    function updatePagination(page_count, current_page, per_page) {
        var paginationUl = $('.pagination');
        paginationUl.empty();

        var html = '';
        var i;

        if (page_count < 5) {
            for (i = 1; i <= page_count; i++) {
                html += `<li class="paginate_button page-item ${current_page == i ? 'active' : ''}">
                            <button onClick="changePage(${i})" class="page-link">${i}</button>
                        </li>`;
            }
        } else {
            for (i = 1; i <= 3; i++) {
                html += `<li class="paginate_button page-item ${current_page == i ? 'active' : ''}">
                            <button onClick="changePage(${i})" class="page-link">${i}</button>
                        </li>`;
            }

            html += `<li class="paginate_button page-item disabled">
                        <a class="page-link">…</a>
                    </li>`;

            for (i = page_count - 1; i <= page_count; i++) {
                html += `<li class="paginate_button page-item ${current_page == i ? 'active' : ''}">
                            <button onClick="changePage(${i})" class="page-link">${i}</button>
                        </li>`;
            }
        }

        paginationUl.append(html);
    }

    function changePage(page) {
        $.ajax({
            url: "/leads/data",
            type: 'GET',
            data: { filter_data: JSON.stringify(getSelectedFilters()), page: page },
            success: function(response) {
                updateLeadsTable(response.leads, response.per_page, response.current_page, response.page_count);
                updatePagination(response.page_count, response.current_page, response.per_page);
            },
            error: function() {
                alert('Error changing page');
            }
        });
    }


    // function applyFilters() {
    //     const filters = [];

    //     const checkboxes = document.querySelectorAll('.invoice-actions ul li input[type="checkbox"]');
    //     checkboxes.forEach((checkbox) => {
    //         if (checkbox.checked) {
    //             const collapseDiv = document.querySelector(`#collapse${checkbox.id}`);
    //             const selectedOption = collapseDiv.querySelector('select').value;
    //             const inputValue = collapseDiv.querySelector('input').value;

    //             filters.push({
    //                 filterName: checkbox.id,
    //                 selectedOption: selectedOption,
    //                 inputValue: inputValue
    //             });
    //         }
    //     });

    //     filter_str = JSON.stringify(filters);
    //     encoded_filters_str = encodeURIComponent(filter_str);
    //     $.ajax({
    //         url: "/leads/data",
    //         type:'GET',
    //         data:{filter_data:filter_str},
    //         success: function (response) {                
    //             var leads = response.leads;
    //             var per_page = response.per_page;
    //             var page = response.page;
    //             var count = response.count;
    //             var page_count = response.page_count;
    //             // Redirect with the proper parameters
    //             // window.location.href = '/lead?per_page=' + encodeURIComponent(per_page) +
    //             //     '&page=' + encodeURIComponent(page) +
    //             //     '&leads=' + encodeURIComponent(leads) +
    //             //     '&filters=' + encoded_filters_str +
    //             //     '&count=' + encodeURIComponent(count);
    //             updateLeadsTable(leads,per_page,1,page_count);
    //             updatePagination(leads,page_count,1,per_page);

    //         },
    //         error: function (error){
    //             alert('Error finding leads');
    //         }

    //     });  
    // }

    // function updateLeadsTable(leads,per_page,current_page,page_count) {
    //     console.log(leads);
    //     var tableBody = $('#leadsTableBody'); // Adjust selector to match your table body ID or class
    //     tableBody.empty(); // Clear existing data

    //     var start = (current_page - 1) * per_page;
    //     var end = start + per_page;
    //     var paginatedLeads = leads.slice(start, end);

    //     paginatedLeads.forEach(function (lead) {
    //         var row = `
    //             <tr>
    //             <td class="control" tabindex="0" style="display: none;"></td>
    //             <td class="dt-checkboxes-cell">
    //                 <input type="checkbox" class="dt-checkboxes form-check-input">
    //             </td>
    //             <td>${lead.lead_name}</td>
    //             <td>${lead.phone}</td>
    //             <td>${lead.email}</td>
    //             <td>${lead.lead_stage}</td>
    //             <td>${lead.city}</td>
    //             <td>${lead.current_state}</td>
    //             <td>${lead.lead_owner}</td>
    //             <td>${lead.preferred_intake}</td>
    //             <td>${lead.ielts_score}</td>
    //             <td>${lead.sat_score}</td>
    //             <td>${lead.lead_status}</td>
    //             <td>${lead.work_experience}</td>
    //             <td>${lead.preferred_course_of_study}</td>
    //             <td>${lead.preferred_universities}</td>
    //             <td>
    //                 <div class="d-inline-block">
    //                 <a href="javascript:;" class="btn btn-sm btn-text-secondary rounded-pill btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
    //                     <i class="ri-more-2-line"></i>
    //                 </a>
    //                 <ul class="dropdown-menu dropdown-menu-end m-0">
    //                     <li><a href="/get-lead-details/${lead._id}" class="dropdown-item">Details</a></li>
    //                     <li><button class="dropdown-item" onClick="openModal('${lead._id}')" data-bs-toggle="modal" data-bs-target="#editDetailsModal">Edit</button></li>
    //                     <li><button onClick="deleteLead('${lead.id}')" class="dropdown-item delete-lead">Delete</button></li>
    //                 </ul>
    //                 </div>
    //             </td>
    //             </tr>
    //         `;

    //         tableBody.append(row); // Append the new row to the table body
    //     });
    // }

    // function updatePagination(leads,page_count, current_page, per_page) {
    //     var paginationUl = $('.pagination'); // Ensure it targets the correct element
    //     paginationUl.empty(); // Clear existing pagination

    //     var html = '';
    //     var i;

    //     console.log(leads);
        
        
    //     if (page_count < 5) {
            
    //         for (i = 1; i <= page_count; i++) {
    //             html += `<li class="paginate_button page-item ${current_page == i ? 'active' : ''}">
    //                         <button onClick="loadleads(leads)" class="page-link">${i}</button>
    //                     </li>`;
    //         }
    //     } else {
            
    //         // First few pages
    //         for (i = 1; i <= 3; i++) {
    //             html += `<li class="paginate_button page-item ${current_page == i ? 'active' : ''}">
    //                         <button onClick="loadleads(leads)" class="page-link">${i}</button>
    //                     </li>`;
    //         }

    //         // Ellipsis for skipped pages
    //         html += `<li class="paginate_button page-item disabled">
    //                     <a class="page-link">…</a>
    //                 </li>`;

    //         // Last few pages
    //         for (i = page_count - 1; i <= page_count; i++) {
    //             html += `<li class="paginate_button page-item ${current_page == i ? 'active' : ''}">
    //                         <button onClick="loadleads(leads)" class="page-link">${i}</button>
    //                     </li>`;
    //         }
    //     }

    //     // Append the new pagination HTML
    //     paginationUl.append(html);
    // }


    function getSelectedFilters() {
        const filters = [];
        document.querySelectorAll('.invoice-actions ul li').forEach((filterItem) => {
            const checkbox = filterItem.querySelector('input[type="checkbox"]');
            const collapseDiv = filterItem.querySelector('.collapse');
            
            if (checkbox.checked) {
                const filterName = checkbox.nextSibling.textContent.trim();
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
