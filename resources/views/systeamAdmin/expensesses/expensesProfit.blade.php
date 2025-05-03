@include('systeamAdmin.admin-templete-controller.header')
@include('systeamAdmin.admin-templete-controller.sidenave')
@include('systeamAdmin.admin-templete-controller.topnav')


<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <form class="d-flex">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-light" id="dash-daterange">
                            <span class="input-group-text bg-primary border-primary text-white">
                                <i class="mdi mdi-calendar-range font-13"></i>
                            </span>
                        </div>

                    </form>
                </div>
                <h4 class="page-title fw-normal" id="">My Expenses && Profits</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <!-- User Table -->


    <div class="row" id="capital-table">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="col-sm-5">
                                    <a href="javascript:void(0);"
                                        class="btn btn-outline-info btn-lg rounded-pill px-3 py-0 d-inline-flex align-items-center add-capital-btn"
                                        style="height: 28px;">

                                        <i class="mdi mdi-plus me-1 small"></i>
                                        <span class="small"> Expenses||Profits</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-7 ">
                                <div class="text-sm-end">
                                    <a href="http://127.0.0.1:8000/admin/dashboard"
                                        class="btn btn- mb-2 me-1  text-light root-btn"
                                        style="background-color:rgb(24,4,24)"><i class="mdi mdi-arrow-left font-16"> Go
                                            Back</i></a>
                                </div>

                            </div>

                        </div>
                        <div class="col-lg-6">
                            <div class="table-responsive">
                                <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                    <thead class="table-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Initial Investment</th>
                                            <th>Product Profit</th>
                                            <th>Added Date</th>
                                            <th>Updated Date</th>

                                            <th class="f-13 text-info ">Added By</th>
                                            <th class="f-13 text-info ">Action</th>


                                        </tr>
                                    </thead>

                                    <tbody>


                                    </tbody>




                                </table>
                            </div> <!-- end table-responsive-->


                            <!-- action buttons-->
                            <div class="row mt-4">
                                <div class="col-sm-6">
                                    <a href="apps-ecommerce-products.html"
                                        class="btn text-muted d-none d-sm-inline-block btn-link fw-semibold">
                                        <i class="mdi mdi-arrow-left"></i> Continue Shopping </a>
                                </div> <!-- end col -->

                            </div> <!-- end row-->
                        </div>
                        <!-- end col -->

                        <div class="col-lg-6">
                            <div class="border p-3 mt-4 mt-lg-0 rounded">
                                <h4 class="header-title mb-3">Profit Expenses Summary</h4>

                                <div class="table-responsive">
                                    <table id="basic-datatable"
                                        class="table table-hover table-bordered dt-responsive nowrap w-100 align-middle">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="text-center">#ID</th>
                                                <th class="text-end">Expenses</th>
                                                <th class="text-end">Profit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center fw-bold">1</td>
                                                <td class="text-end text-danger">3,000</td>
                                                <td class="text-end text-success">40,000</td>

                                            </tr>
                                            <!-- Additional rows would go here -->
                                        </tbody>
                                    </table>

                                </div>
                                <div class="d-flex justify-content-center py-2">
                                    <button type="button" class="btn btn-success rounded-pill px-4 py-2 shadow-sm">
                                        <div class="d-flex align-items-center">
                                            <i class="mdi mdi-calculator fs-4 me-2"></i>
                                            <div class="text-start">
                                                <div class="fw-bold">Today's Net Profit: 198,000</div>
                                                <div class="small">(200,000 - 2,000 expenses)</div>
                                            </div>
                                            <i class="mdi mdi-arrow-right-bold-circle-outline fs-4 ms-3"></i>
                                        </div>
                                    </button>
                                </div>
                                <!-- end table-responsive -->
                            </div>






                        </div> <!-- end col -->

                    </div> <!-- end row -->
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>


    <!-- container -->
    @include('systeamAdmin.capital.capital_script')
    @include('systeamAdmin.admin-templete-controller.footer')