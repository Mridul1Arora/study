@extends('layout.app')

@section('title', 'Leads')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
<div class="card">
                <div class="card-datatable table-responsive pt-0">
                  <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer"><div class="card-header flex-column flex-md-row border-bottom"><div class="head-label text-center"><h5 class="card-title mb-0">Leads</h5></div><div class="dt-action-buttons text-end pt-3 pt-md-0"><div class="dt-buttons btn-group flex-wrap"> <div class="btn-group"><button class="btn btn-secondary buttons-collection dropdown-toggle btn-label-primary me-4 waves-effect waves-light" tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="dialog" aria-expanded="false"><span><i class="ri-external-link-line me-sm-1"></i> <span class="d-none d-sm-inline-block">Export</span></span></button></div> <button class="btn btn-secondary create-new btn-primary waves-effect waves-light" tabindex="0" aria-controls="DataTables_Table_0" type="button"><span><i class="ri-add-line ri-16px me-sm-2"></i> <span class="d-none d-sm-inline-block">Add New Record</span></span></button> </div></div></div><div class="row"><div class="col-sm-12 col-md-6 mt-5 mt-md-0"><div class="dataTables_length" id="DataTables_Table_0_length"><label>Show <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-select form-select-sm"><option value="7">7</option><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="75">75</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"><div id="DataTables_Table_0_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="DataTables_Table_0"></label></div></div></div><table class="datatables-basic table table-bordered dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 1396px;">
                    <thead>
                      <tr><th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1" style="width: 49px; display: none;" aria-label=""></th><th class="sorting_disabled dt-checkboxes-cell dt-checkboxes-select-all" rowspan="1" colspan="1" style="width: 50px;" data-col="1" aria-label=""><input type="checkbox" class="form-check-input"></th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 144px;" aria-label="Name: activate to sort column ascending">Name</th><th class="sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 147px;" aria-label="Email: activate to sort column descending" aria-sort="ascending">Email</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 132px;" aria-label="Date: activate to sort column ascending">Date</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 173px;" aria-label="Salary: activate to sort column ascending">Salary</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 171px;" aria-label="Status: activate to sort column ascending">Status</th><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 176px;" aria-label="Actions">Actions</th></tr>
                    </thead><tbody><tr class="odd"><td valign="top" colspan="7" class="dataTables_empty">No data available in table</td></tr></tbody>
                  </table><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 0 to 0 of 0 entries</div></div><div class="col-sm-12 col-md-6"><div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous"><a aria-controls="DataTables_Table_0" aria-disabled="true" role="link" data-dt-idx="previous" tabindex="-1" class="page-link"><i class="ri-arrow-left-s-line"></i></a></li><li class="paginate_button page-item next disabled" id="DataTables_Table_0_next"><a aria-controls="DataTables_Table_0" aria-disabled="true" role="link" data-dt-idx="next" tabindex="-1" class="page-link"><i class="ri-arrow-right-s-line"></i></a></li></ul></div></div></div></div>
                </div>
              </div>
</div>



<div class="offcanvas offcanvas-end" id="add-new-record">
                <div class="offcanvas-header border-bottom">
                  <h5 class="offcanvas-title" id="exampleModalLabel">New Record</h5>
                  <button
                    type="button"
                    class="btn-close text-reset"
                    data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
                </div>
                <div class="offcanvas-body flex-grow-1">
                  <form class="add-new-record pt-0 row g-3" id="form-add-new-record" onsubmit="return false">
                    <div class="col-sm-12">
                      <div class="input-group input-group-merge">
                        <span id="basicFullname2" class="input-group-text"><i class="ri-user-line ri-18px"></i></span>
                        <div class="form-floating form-floating-outline">
                          <input
                            type="text"
                            id="basicFullname"
                            class="form-control dt-full-name"
                            name="basicFullname"
                            placeholder="John Doe"
                            aria-label="John Doe"
                            aria-describedby="basicFullname2" />
                          <label for="basicFullname">Full Name</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="input-group input-group-merge">
                        <span id="basicPost2" class="input-group-text"><i class="ri-briefcase-line ri-18px"></i></span>
                        <div class="form-floating form-floating-outline">
                          <input
                            type="text"
                            id="basicPost"
                            name="basicPost"
                            class="form-control dt-post"
                            placeholder="Web Developer"
                            aria-label="Web Developer"
                            aria-describedby="basicPost2" />
                          <label for="basicPost">Post</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="ri-mail-line ri-18px"></i></span>
                        <div class="form-floating form-floating-outline">
                          <input
                            type="text"
                            id="basicEmail"
                            name="basicEmail"
                            class="form-control dt-email"
                            placeholder="john.doe@example.com"
                            aria-label="john.doe@example.com" />
                          <label for="basicEmail">Email</label>
                        </div>
                      </div>
                      <div class="form-text">You can use letters, numbers & periods</div>
                    </div>
                    <div class="col-sm-12">
                      <div class="input-group input-group-merge">
                        <span id="basicDate2" class="input-group-text"><i class="ri-calendar-2-line ri-18px"></i></span>
                        <div class="form-floating form-floating-outline">
                          <input
                            type="text"
                            class="form-control dt-date"
                            id="basicDate"
                            name="basicDate"
                            aria-describedby="basicDate2"
                            placeholder="MM/DD/YYYY"
                            aria-label="MM/DD/YYYY" />
                          <label for="basicDate">Joining Date</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="input-group input-group-merge">
                        <span id="basicSalary2" class="input-group-text"
                          ><i class="ri-money-dollar-circle-line ri-18px"></i
                        ></span>
                        <div class="form-floating form-floating-outline">
                          <input
                            type="number"
                            id="basicSalary"
                            name="basicSalary"
                            class="form-control dt-salary"
                            placeholder="12000"
                            aria-label="12000"
                            aria-describedby="basicSalary2" />
                          <label for="basicSalary">Salary</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <button type="submit" class="btn btn-primary data-submit me-sm-4 me-1">Submit</button>
                      <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                    </div>
                  </form>
                </div>
              </div>


<script src="../../assets/js/tables-datatables-basic.js"></script>
@endsection