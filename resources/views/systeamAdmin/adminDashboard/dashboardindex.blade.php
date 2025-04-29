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

    </div>

    <!-- end page title -->

    <div class="row">
    <div class="col-sm-12">
        <div class="row">

            <!-- Users Card -->
            <div class="col-sm-3 mb-4 h-50  ">
                <div class="card widget-flat shadow-lg rounded-4 border-0 bg-gradient bg-primary bg-opacity-10 h-100">
                    <div class="card-body p-4 d-flex flex-column">
                        <div class="text-center mb-3">
                            <div class="bg-primary bg-opacity-25 p-3 rounded-circle d-inline-block">
                                <img src="{{ asset('/assets/images/admin-images/user-group.png') }}" 
                                     alt="User Group" 
                                     class="img-fluid" 
                                     style="height: 40px; width: 40px;">
                            </div>
                        </div>
                        <h5 class="h4 text-center mb-3 fw-bold text-primary">
                            Users
                            <i class="fas fa-info-circle ms-1 text-primary text-opacity-50" 
                               data-bs-toggle="tooltip" 
                               data-bs-placement="top" 
                               title="Registered user accounts"></i>
                        </h5>
                        <div class="text-center my-2">
                            <div class=" fw-bold text-dark mb-1">1,248</div>
                            <div class="text-success small fw-bold">
                                <i class="fas fa-arrow-up me-1"></i> 12.5% growth
                            </div>
                        </div>
                        <div class="mt-auto text-center">
                            <a href="{{route('user-index')}}"
                               class="btn btn-outline-primary btn-sm rounded-pill fw-bold shadow-sm">
                                <i class="fas fa-users me-1"></i> Manage Users
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Capital Card -->
            <div class="col-sm-3 mb-4 h-50">
                <div class="card widget-flat shadow-lg rounded-4 border-0 bg-gradient bg-warning bg-opacity-10 h-100">
                    <div class="card-body p-4 d-flex flex-column">
                        <div class="text-center mb-3">
                            <div class="bg-warning bg-opacity-25 p-3 rounded-circle d-inline-block">
                                <img src="{{ asset('/assets/images/admin-images/capital.png') }}" 
                                     alt="Capital" 
                                     class="img-fluid" 
                                     style="height: 40px; width: 40px;">
                            </div>
                        </div>
                        <h5 class="h4 text-center mb-3 fw-bold text-warning">
                            Capital
                            <i class="fas fa-info-circle ms-1 text-warning text-opacity-50" 
                               data-bs-toggle="tooltip" 
                               data-bs-placement="top" 
                               title="Total business capital and investments"></i>
                        </h5>
                        <div class="text-center my-3">
                            <span class=" fw-bold text-dark">TZS</span>
                            <span class=" fw-bolder text-warning">12.8M</span>
                            <div class="text-success small mt-1">
                                <i class="fas fa-chart-line me-1"></i> 5.2% increase
                            </div>
                        </div>
                        <div class="mt-auto text-center">
                            <a href="{{route('capital-index')}}"
                               class="btn btn-warning btn-sm rounded-pill fw-bold px-4 shadow-sm text-white">
                                <i class="fas fa-coins me-1"></i> View Details
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Products Card -->
            <div class="col-sm-3 mb-4 h-50">
                <div class="card widget-flat shadow-lg rounded-4 border-0 bg-gradient bg-success bg-opacity-10 h-100">
                    <div class="card-body p-4 d-flex flex-column">
                        <div class="text-center mb-3">
                            <div class="bg-success bg-opacity-25 p-3 rounded-circle d-inline-block">
                                <img src="{{ asset('/assets/images/admin-images/products.png') }}" 
                                     alt="Products" 
                                     class="img-fluid" 
                                     style="height: 40px; width: 40px;">
                            </div>
                        </div>
                        <h5 class="h4 text-center mb-3 fw-bold text-success">
                            Products
                            <i class="fas fa-info-circle ms-1 text-success text-opacity-50" 
                               data-bs-toggle="tooltip" 
                               data-bs-placement="top" 
                               title="Available products in inventory"></i>
                        </h5>
                        <div class="text-center my-3">
                            <span class=" fw-bold text-dark">1,248</span>
                            
                        </div>
                        <div class="mt-auto text-center">
                            <a href="{{route('product-index')}}"
                               class="btn btn-success btn-sm rounded-pill fw-bold px-4 shadow-sm text-white">
                                <i class="fas fa-warehouse me-1"></i> Manage Products
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Purchases Card -->
            <div class="col-sm-3 mb-4 h-50">
                <div class="card widget-flat shadow-lg rounded-4 border-0 bg-gradient bg-purple bg-opacity-10 h-100">
                    <div class="card-body p-4 d-flex flex-column">
                        <div class="text-center mb-3">
                            <div class="bg-purple bg-opacity-25 p-3 rounded-circle d-inline-block">
                                <img src="{{ asset('/assets/images/admin-images/shopping.png') }}" 
                                     alt="Purchases" 
                                     class="img-fluid" 
                                     style="height: 40px; width: 40px;">
                            </div>
                        </div>
                        <h5 class="h4 text-center mb-3 fw-bold text-purple">
                            Purchases
                            <i class="fas fa-info-circle ms-1 text-purple text-opacity-50" 
                               data-bs-toggle="tooltip" 
                               data-bs-placement="top" 
                               title="Recent purchase transactions"></i>
                        </h5>
                        <div class="text-center my-3">
                            <div class="fw-bold text-dark mb-1">248</div>
                            <div class="d-flex justify-content-center gap-3">
                                <span class="badge bg-purple bg-opacity-25 text-purple">
                                    <i class="fas fa-arrow-up me-1"></i> 24 New
                                </span>
                                <span class="badge bg-purple bg-opacity-10 text-purple">
                                    TZS 8.4M
                                </span>
                            </div>
                        </div>
                        <div class="mt-auto text-center">
                            <a href="{{route('parchasses-index')}}"
                               class="btn btn-purple btn-sm rounded-pill fw-bold px-4 shadow-sm text-white">
                                <i class="fas fa-shopping-cart me-1"></i> View Purchases
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sales Card -->
            <div class="col-sm-3 mb-4 h-50">
                <div class="card widget-flat shadow-lg rounded-4 border-0 bg-gradient bg-danger bg-opacity-10 h-100">
                    <div class="card-body p-4 d-flex flex-column">
                        <div class="text-center mb-3">
                            <div class="bg-danger bg-opacity-25 p-3 rounded-circle d-inline-block">
                                <img src="{{ asset('/assets/images/admin-images/sales.png') }}" 
                                     alt="Sales" 
                                     class="img-fluid" 
                                     style="height: 40px; width: 40px;">
                            </div>
                        </div>
                        <h5 class="h4 text-center mb-3 fw-bold text-danger">
                            Sales
                            <i class="fas fa-info-circle ms-1 text-danger text-opacity-50" 
                               data-bs-toggle="tooltip" 
                               data-bs-placement="top" 
                               title="Today's sales performance"></i>
                        </h5>
                        <div class="text-center my-3">
                            <div class="display-5 fw-bold text-dark mb-1">TZS 3.8M</div>
                            <div class="d-flex justify-content-center gap-3">
                                <span class="badge bg-danger bg-opacity-25 text-danger">
                                    <i class="fas fa-bolt me-1"></i> 42 Orders
                                </span>
                                <span class="badge bg-danger bg-opacity-10 text-danger">
                                    <i class="fas fa-arrow-up me-1"></i> 18%
                                </span>
                            </div>
                        </div>
                        <div class="mt-auto text-center">
                            <a href="{{route('products-sales')}}"
                               class="btn btn-danger btn-sm rounded-pill fw-bold px-4 shadow-sm text-white">
                                <i class="fas fa-chart-line me-1"></i> Sales Report
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Profit & Expenses Card -->
            <div class="col-sm-3 mb-4 h-50">
                <div class="card widget-flat shadow-lg rounded-4 border-0 bg-gradient bg-info bg-opacity-10 h-100">
                    <div class="card-body p-4 d-flex flex-column">
                        <div class="text-center mb-3">
                            <div class="bg-info bg-opacity-25 p-3 rounded-circle d-inline-block">
                                <img src="{{ asset('/assets/images/admin-images/profit.png') }}" 
                                     alt="Profit" 
                                     class="img-fluid" 
                                     style="height: 40px; width: 40px;">
                            </div>
                        </div>
                        <h5 class="h4 text-center mb-3 fw-bold text-info">
                            Profit & Expenses
                            <i class="fas fa-info-circle ms-1 text-info text-opacity-50" 
                               data-bs-toggle="tooltip" 
                               data-bs-placement="top" 
                               title="Financial summary"></i>
                        </h5>
                        <div class="text-center my-3">
                            <div class="d-flex justify-content-around align-items-center mb-3">
                                <div class="text-success">
                                    <span class="d-block fs-4 fw-bold">12.5M</span>
                                    <small class="text-muted">Profit</small>
                                </div>
                                <div class="vr"></div>
                                <div class="text-danger">
                                    <span class="d-block fs-4 fw-bold">4.2M</span>
                                    <small class="text-muted">Expenses</small>
                                </div>
                            </div>
                            <div class="progress mb-3" style="height: 6px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 75%"></div>
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 25%"></div>
                            </div>
                        </div>
                        <div class="mt-auto text-center">
                            <button class="btn btn-outline-info btn-sm rounded-pill fw-bold shadow-sm"
                                    data-bs-toggle="modal" 
                                    data-bs-target="#financeModal">
                                <i class="fas fa-chart-line me-1"></i> View Details
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Revenue Card -->
            <div class="col-sm-3 mb-4 h-50">
                <div class="card widget-flat shadow-lg rounded-4 border-0 bg-gradient bg-secondary bg-opacity-10 h-100">
                    <div class="card-body p-4 d-flex flex-column">
                        <div class="text-center mb-3">
                            <div class="bg-secondary bg-opacity-25 p-3 rounded-circle d-inline-block">
                                <i class="fas fa-dollar-sign text-secondary" style="font-size: 30px;"></i>
                            </div>
                        </div>
                        <h5 class="h4 text-center mb-3 fw-bold text-secondary">
                            Revenue
                            <i class="fas fa-info-circle ms-1 text-secondary text-opacity-50" 
                               data-bs-toggle="tooltip" 
                               data-bs-placement="top" 
                               title="Average Revenue"></i>
                        </h5>
                        <div class="text-center my-3">
                            <h3 class="display-5 fw-bold text-dark">$3,254</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-danger me-2"><i class="fas fa-arrow-down me-1"></i> 7.00%</span>
                                <span class="text-nowrap">Since last month</span>
                            </p>
                        </div>
                        <div class="mt-auto text-center">
                            <button class="btn btn-outline-secondary btn-sm rounded-pill fw-bold shadow-sm">
                                <i class="fas fa-chart-pie me-1"></i> View Report
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Growth Card -->
            <div class="col-sm-3 mb-4 h-50">
                <div class="card widget-flat shadow-lg rounded-4 border-0 bg-gradient bg-dark bg-opacity-10 h-100">
                    <div class="card-body p-4 d-flex flex-column">
                        <div class="text-center mb-3">
                            <div class="bg-dark bg-opacity-25 p-3 rounded-circle d-inline-block">
                                <i class="fas fa-chart-line text-dark" style="font-size: 30px;"></i>
                            </div>
                        </div>
                        <h5 class="h4 text-center mb-3 fw-bold text-dark">
                            Growth
                            <i class="fas fa-info-circle ms-1 text-dark text-opacity-50" 
                               data-bs-toggle="tooltip" 
                               data-bs-placement="top" 
                               title="Business growth metrics"></i>
                        </h5>
                        <div class="text-center my-3">
                            <h3 class="display-5 fw-bold text-dark">+ 30.56%</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-success me-2"><i class="fas fa-arrow-up me-1"></i> 4.87%</span>
                                <span class="text-nowrap">Since last month</span>
                            </p>
                        </div>
                        <div class="mt-auto text-center">
                            <button class="btn btn-outline-dark btn-sm rounded-pill fw-bold shadow-sm">
                                <i class="fas fa-analytics me-1"></i> View Trends
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- end row -->
    </div> <!-- end col -->
</div> <!-- end row -->





</div>
<!-- container -->
@include('systeamAdmin.admin-templete-controller.footer')