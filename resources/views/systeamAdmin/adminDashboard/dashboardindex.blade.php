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
            <h4 class="page-title fw-normal">Dashboard</h4>
        </div>
    </div>
    @if(session('message'))
    <span class="text-danger">{{session('message')}}</span>
    @endif
</div>

<!-- end page title -->

<div class="row">
        <div class=" col-sm-12">

            <div class="row">

            <div class="col-sm-3">
                <div class="card widget-flat shadow rounded-3 border-0">
                    <div class="card-body">
                        <h5 class="h4 text-center mt-0" title="Number of Customers"  data-bs-toogle="tooltip" data-bs-placement="top" >
                            User`s
                        </h5>

                        <span class=" d-flex justify-content-center">
                            <img 
                                src="{{ asset('/assets/images/admin-images/user-group.png') }}" 
                                alt="User Group" 
                                class="img-fluid" 
                                style="max-height: 50px; max-width: 50px;">
                        </span>

                        <!-- Footer Info -->
                        <a href="{{route('user-index')}}" class="mb-0 text-muted d-flex justify-content-center ">
                            <span class="text-nowrap h6 bg-info text-light px-3 py-1 rounded-pill shadow-sm" style="cursor:pointer">
                                View More </span>
                        </a>
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
             </div> <!-- end col -->

              <div class="col-sm-3">
                    <div class="card widget-flat shadow rounded-3 border-0">
                        <div class="card-body">
                            <h5 class="h4 text-center mt-0" title="Number of Customers"  data-bs-toggle="tooltip" data-bs-placement="top" >
                                Capital
                            </h5>

                            <span class=" d-flex justify-content-center">
                                <img 
                                    src="{{ asset('/assets/images/admin-images/capital.png') }}" 
                                    alt="User Group" 
                                    class="img-fluid" 
                                    style="max-height: 50px; max-width: 50px;">
                            </span>

                            <!-- Footer Info -->
                            <p class="mb-0 text-muted d-flex justify-content-center ">
                            <a href="{{route('capital-index')}}" class="text-nowrap h6 bg-info text-light px-3 py-1 rounded-pill shadow-sm" style="cursor:pointer">
                            View More </a>
                            </p>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->


               


                <div class="col-sm-3">
                    <div class="card widget-flat shadow rounded-3 border-0">
                        <div class="card-body">
                            <h5 class="h4 text-center mt-0" title="Number of Customers"  data-bs-toggle="tooltip" data-bs-placement="top" >
                                Product `s
                            </h5>

                            <span class=" d-flex justify-content-center">
                                <img 
                                    src="{{ asset('/assets/images/admin-images/products.png') }}" 
                                    alt="User Group" 
                                    class="img-fluid" 
                                    style="max-height: 50px; max-width: 50px;">
                            </span>

                            <!-- Footer Info -->
                            <a href="{{route('product-index')}}" class="mb-0 text-muted d-flex justify-content-center ">
                                <span class="text-nowrap h6 bg-info text-light px-3 py-1 rounded-pill shadow-sm" style="cursor:pointer">
                                View More </span>
                           </a>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->

                <div class="col-sm-3">
                    <div class="card widget-flat shadow rounded-3 border-0">
                        <div class="card-body">
                            <h5 class="h4 text-center mt-0" title="Number of Customers"  data-bs-toggle="tooltip" data-bs-placement="top" >
                              Parchass`s
                            </h5>

                            <span class=" d-flex justify-content-center">
                                <img 
                                    src="{{ asset('/assets/images/admin-images/shopping.png') }}" 
                                    alt="User Group" 
                                    class="img-fluid" 
                                    style="max-height: 50px; max-width: 50px;">
                            </span>

                            <!-- Footer Info -->
                            <p class="mb-0 text-muted d-flex justify-content-center ">
                                <span class="text-nowrap h6 bg-info text-light px-3 py-1 rounded-pill shadow-sm" style="cursor:pointer">
                                    View More </span>
                            </p>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->

                <div class="col-sm-3">
                    <div class="card widget-flat shadow rounded-3 border-0">
                        <div class="card-body">
                            <h5 class="h4 text-center mt-0" title="Number of Customers"  data-bs-toggle="tooltip" data-bs-placement="top" >
                              Sale`s
                            </h5>

                            <span class=" d-flex justify-content-center">
                                <img 
                                    src="{{ asset('/assets/images/admin-images/sales.png') }}" 
                                    alt="User Group" 
                                    class="img-fluid" 
                                    style="max-height: 50px; max-width: 50px;">
                            </span>

                            <!-- Footer Info -->
                            <a href="{{route('products-sales')}}"class="mb-0 text-muted d-flex justify-content-center ">
                                <span class="text-nowrap h6 bg-info text-light px-3 py-1 rounded-pill shadow-sm" style="cursor:pointer">
                                    View More </span>
                            </a>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->


                <div class="col-sm-3">
                    <div class="card widget-flat shadow rounded-3 border-0">
                        <div class="card-body">
                            <h5 class="h4 text-center mt-0" title="Number of Customers"  data-bs-toggle="tooltip" data-bs-placement="top" >
                             Profit`s
                            </h5>

                            <span class=" d-flex justify-content-center">
                                <img 
                                    src="{{ asset('/assets/images/admin-images/profit.png') }}" 
                                    alt="User Group" 
                                    class="img-fluid" 
                                    style="max-height: 50px; max-width: 50px;">
                            </span>

                            <!-- Footer Info -->
                            <p class="mb-0 text-muted d-flex justify-content-center ">
                                <span class="text-nowrap h6 bg-info text-light px-3 py-1 rounded-pill shadow-sm" style="cursor:pointer">
                                    View More </span>
                            </p>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->


            
                <div class="col-sm-3">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-currency-usd widget-icon"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Average Revenue">Revenue</h5>
                            <h3 class="mt-3 mb-3">$3,254</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i> 7.00%</span>
                                <span class="text-nowrap">Since last month</span>
                            </p>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->

                <div class="col-sm-3">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-pulse widget-icon"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Growth">Growth</h5>
                            <h3 class="mt-3 mb-3">+ 30.56%</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> 4.87%</span>
                                <span class="text-nowrap">Since last month</span>
                            </p>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div> <!-- end row -->

        </div> <!-- end col -->

    </div>





</div>
<!-- container -->
@include('systeamAdmin.admin-templete-controller.footer')
