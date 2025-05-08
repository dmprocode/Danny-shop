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
                <h4 class="page-title fw-normal" id="">Report<span
                        class="badge bg-primary bg-opacity-10 text-primary ms-2">
                        {{ now()->format('M j Y') }} <!-- Dynamic date -->
                    </span>
                </h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <!-- User Table -->


    <div class="row" id="today-parchasses">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="col-sm-7">
                                <a href="javascript:void(0);"
                                    class="btn btn-primary rounded-pill px-4 d-flex align-items-center justify-content-center shadow-sm"
                                    style="height: 38px;">

                                    <i class="mdi mdi-cart-arrow-down me-2 fs-5"></i>
                                    <span class="fw-medium">List of Purchased Products</span>
                                </a>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="text-sm-end">
                                <a href="http://127.0.0.1:8000/admin/dashboard"
                                    class="btn btn- mb-2 me-1  text-light root-btn"
                                    style="background-color:rgb(24,4,24)"><i class="mdi mdi-arrow-left font-16"> Go
                                        Back</i></a>
                            </div>

                        </div>

                    </div>
                    <div class="col-lg-12    expesnses-profit-table">
                        <div class="table-responsive">
                        @if($adminComponents['todayparchass']->isEmpty())
                                <div class="alert alert-warning text-center fw-bold py-3 rounded-pill shadow-sm">
                                    <i class="mdi mdi-alert-circle-outline me-2"></i>
                                    No Purchase Records Available Today
                                </div>
                         @else

                        
                            <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                <thead class="table-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Product Name</th>
                                        <th>Catton</th>
                                        <td>Quantity</td>
                                        <th>Products Price</th>
                                        <th>Sales Points</th>

                                    </tr>
                                </thead>

                                <tbody>
                          @foreach($adminComponents['todayparchass'] as  $key=> $purchase)
                            <tr>
                                <td>{{ $key+ 1 }}</td>
                                <td>{{ $purchase->product->name }}</td>
                                <td>{{ $purchase->number_catton }}</td>
                                <td>{{$purchase->number_picess}} </td>
                                <td>{{ number_format($purchase->buying_price) }} Tsh</td>
                                <td>{{ $purchase->sales_point }}</td>
                            </tr>
                            
                            @endforeach
                            </tbody>
                            </table>
                            @endif
                            
                        </div> <!-- end table-responsive-->



                    </div>
                    <!-- end col -->
                    <div class="col-sm-8">
                        <div class="col-sm-7">
                            <a href="javascript:void(0);"
                                class="btn btn-success rounded-pill px-4 py-2 d-flex align-items-center justify-content-between shadow-lg"
                                style="border-left: 4px solid #fff; border-right: 4px solid #fff;">

                                <span class="d-flex align-items-center">
                                    <i class="mdi mdi-cart-check me-2 fs-4"></i>
                                    <span class="fw-bold">Total Purchases:</span>
                                </span>

                                <span class="badge bg-white text-success fs-6 ms-2">
                                    {{number_format($adminComponents['todayTotal'],2)}} Tsh
                                </span>
                            </a>
                        </div>
                    </div>


                </div> <!-- end row -->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>


<!-- =============Solid Products================= -->

<div class="row" id="profit-expesses-table">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-8 my-2">
                        <div class="col-sm-7">
                            <a href="javascript:void(0);"
                                class="btn btn-primary rounded-pill px-4 d-flex align-items-center justify-content-center shadow hover-shadow-lg"
                                style="height: 38px; background: linear-gradient(to right, #4b6cb7, #182848); border: none; text-transform; letter-spacing: 0.5px;">

                                <i class="mdi mdi-cart-arrow-down me-2 fs-5 text-white"></i>
                                <span class="fw-bold text-white text-small">List Of Solid out Products</span>
                            </a>
                        </div>
                    </div>

                    <div class="col-sm-4 d-none">
                        <div class="text-sm-end">
                            <a href="http://127.0.0.1:8000/admin/dashboard"
                                class="btn btn- mb-2 me-1  text-light root-btn" style="background-color:rgb(24,4,24)"><i
                                    class="mdi mdi-arrow-left font-16"> Go
                                    Back</i></a>
                        </div>

                    </div>

                </div>
                <div class="col-lg-12    expesnses-profit-table">
                    <div class="table-responsive">
                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Selling Price</th>
                                    <th>Profit</th>

                                </tr>
                            </thead>

                            <tbody>
                                <td>1</td>
                                <td>Sufurua</td>
                                <td>1</td>
                                <td>20</td>
                                <td>20000</td>
                                <td>Macent Dar es Salem</td>
                            </tbody>




                        </table>
                    </div> <!-- end table-responsive-->



                </div>
                <!-- end col -->
                <div class="col-sm-12">
                    <div class="row g-3"> <!-- Added row with gutter spacing -->
                        <div class="col-sm-6">
                            <a href="javascript:void(0);"
                                class="btn btn-success rounded-pill px-4 py-2 d-flex align-items-center justify-content-between shadow-lg"
                                style="border-left: 4px solid rgba(255,255,255,0.5); border-right: 4px solid rgba(255,255,255,0.5); background: linear-gradient(to right, #198754, #2ecc71);">

                                <span class="d-flex align-items-center">
                                    <i class="mdi mdi-cart-arrow-down me-2 fs-4"></i>
                                    <span class="fw-bold text-white">Total Sold Products:</span>
                                </span>

                                <span class="badge bg-white text-success fs-6 px-3 py-1">
                                    2,000,000 Tsh
                                </span>
                            </a>
                        </div>

                        <div class="col-sm-6">
                            <a href="javascript:void(0);"
                                class="btn btn-primary rounded-pill px-4 py-2 d-flex align-items-center justify-content-between shadow-lg"
                                style="border-left: 4px solid rgba(255,255,255,0.5); border-right: 4px solid rgba(255,255,255,0.5); background: linear-gradient(to right, #0d6efd, #3b8cff);">

                                <span class="d-flex align-items-center">
                                    <i class="mdi mdi-cash-multiple me-2 fs-4"></i>
                                    <span class="fw-bold text-white">Total Profits:</span>
                                </span>

                                <span class="badge bg-white text-primary fs-6 px-3 py-1">
                                    30,000 Tsh
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div> <!-- end row -->
        </div> <!-- end card-body-->
    </div> <!-- end card-->
</div> <!-- end col -->

<div class="row" id="profit-expesses-table">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-8 my-2">
                        <div class="col-sm-7">
                            <a href="javascript:void(0);"
                                class="btn btn-primary rounded-pill px-4 d-flex align-items-center justify-content-center shadow-lg hover-grow position-relative overflow-hidden"
                                style="height: 38px; 
                                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                                border: none;
                                text-transform: uppercase;
                                letter-spacing: 1px;">

                                <i class="mdi mdi-cart-arrow-down me-2 fs-5 text-white"></i>
                                <span class="fw-bold text-white text-small">EXPENSES</span>

                                <!-- Notification dot -->
                                <span class="position-absolute top-0 end-0 bg-white rounded-pill"
                                    style="width: 8px; height: 8px; margin: 4px;"></span>
                            </a>
                        </div>
                    </div>

                </div>
                <div class="col-lg-12    expesnses-profit-table">
                    <div class="table-responsive">
                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Discription</th>
                                    <th>Amouth</th>


                                </tr>
                            </thead>

                            <tbody>
                                <td>1</td>
                                <td>Sufurua</td>
                                <td>1</td>

                            </tbody>

                        </table>
                    </div> <!-- end table-responsive-->



                </div>
                <!-- end col -->
                <div class="col-sm-12">
                    <div class="row g-3"> <!-- Added row with gutter spacing -->
                        <div class="col-sm-6">
                            <a href="javascript:void(0);"
                                class="btn btn-success rounded-pill px-4 py-2 d-flex align-items-center justify-content-between shadow-lg position-relative"
                                style="border-left: 4px solid rgba(255,255,255,0.5); 
                                        border-right: 4px solid rgba(255,255,255,0.5); 
                                        background: linear-gradient(135deg, #198754 0%, #27ae60 50%, #2ecc71 100%);
                                        overflow: hidden;">

                                <!-- Main content -->
                                <span class="d-flex align-items-center">
                                    <i class="mdi mdi-cart-arrow-down me-2 fs-4 text-white"></i>
                                    <span class="fw-bold text-white " style="letter-spacing: 0.5px;">Total
                                        Expenses Products</span>
                                </span>

                                <!-- Value badge -->
                                <span class="badge bg-white text-success fs-6 px-3 py-1 rounded-pill shadow-sm">
                                    0 Tsh
                                </span>

                                <!-- Shine effect -->
                                 <span class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(90deg, rgba(255,255,255,0) 0%, rgba(255,255,255,0.3) 50%, rgba(255,255,255,0) 100%);
                                    transform: translateX(-100%);
                                    transition: transform 0.6s ease;">
                                </span>
                            </a>
                        </div>

                        
                    </div>
                </div>
            </div> <!-- end row -->
        </div> <!-- end card-body-->
    </div> <!-- end card-->
</div> <!-- end col -->

<!-- =====================To dday Net Profi================  -->
<div class="row" id="profit-expenses-table">
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <!-- Header Section -->
                <div class="row mb-4">
                    <div class="col-sm-8">
                        <div class="col-sm-7">
                            <a href="javascript:void(0);"
                                class="btn btn-primary rounded-pill px-4 d-flex align-items-center justify-content-center shadow-lg position-relative"
                                style="height: 42px; 
                                       background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                                       border: none;
                                       text-transform: uppercase;
                                       letter-spacing: 1px;
                                       box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);">

                                <i class="mdi mdi-finance me-2 fs-5 text-white"></i>
                                <span class="fw-bold text-white" style="font-size: 0.9rem;">FINANCIAL SUMMARY</span>
                                
                                <span class="position-absolute top-0 end-0 bg-white rounded-pill"
                                    style="width: 10px; height: 10px; margin: 5px;"></span>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Metrics Section -->
                <div class="row g-4">
                    <!-- Expenses Card -->
                    <div class="col-sm-6 col-lg-4">
                        <div class="bg-white rounded-3 p-3 shadow-sm border border-2 border-success border-opacity-10 h-100">
                            <div class="d-flex align-items-center mb-2">
                                <div class="bg-danger bg-opacity-10 p-2 rounded-circle me-3">
                                    <i class="mdi mdi-cash-remove fs-3 text-danger"></i>
                                </div>
                                <h6 class="mb-0 text-uppercase text-muted fw-bold">Total Expenses</h6>
                            </div>
                            <div class="d-flex justify-content-between align-items-end">
                                <h3 class="mb-0 fw-bold">1,222,220 Tsh</h3>
                                <span class="badge bg-danger bg-opacity-10 text-danger">-12%</span>
                            </div>
                            <div class="progress mt-2" style="height: 6px;">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 65%"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Gross Profit Card -->
                    <div class="col-sm-6 col-lg-4">
                        <div class="bg-white rounded-3 p-3 shadow-sm border border-2 border-success border-opacity-10 h-100">
                            <div class="d-flex align-items-center mb-2">
                                <div class="bg-success bg-opacity-10 p-2 rounded-circle me-3">
                                    <i class="mdi mdi-cash-plus fs-3 text-success"></i>
                                </div>
                                <h6 class="mb-0 text-uppercase text-muted fw-bold">Gross Profit</h6>
                            </div>
                            <div class="d-flex justify-content-between align-items-end">
                                <h3 class="mb-0 fw-bold">18,000,000 Tsh</h3>
                                <span class="badge bg-success bg-opacity-10 text-success">+24%</span>
                            </div>
                            <div class="progress mt-2" style="height: 6px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 85%"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Net Profit Card -->
                    <div class="col-sm-6 col-lg-4">
                        <div class="bg-white rounded-3 p-3 shadow-sm border border-2 border-primary border-opacity-10 h-100">
                            <div class="d-flex align-items-center mb-2">
                                <div class="bg-primary bg-opacity-10 p-2 rounded-circle me-3">
                                    <i class="mdi mdi-chart-areaspline fs-3 text-primary"></i>
                                </div>
                                <h6 class="mb-0 text-uppercase text-muted fw-bold">Net Profit</h6>
                            </div>
                            <div class="d-flex justify-content-between align-items-end">
                                <h3 class="mb-0 fw-bold">16,777,780 Tsh</h3>
                                <span class="badge bg-primary bg-opacity-10 text-primary">+18%</span>
                            </div>
                            <div class="progress mt-2" style="height: 6px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 75%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- ===================My Capital================ -->
<div class="row" id="profit-expenses-table">
    <div class="col-12">
        <div class="card border-primary border-opacity-10 shadow">
            <div class="card-body p-4 bg-light bg-opacity-10">
                <!-- Header Section -->
                <div class="row mb-4">
                    <div class="col-md-8">
                        <div class="d-flex align-items-center">
                            <div class="bg-primary bg-opacity-10 p-3 rounded-circle me-3">
                                <i class="mdi mdi-finance fs-2 text-primary"></i>
                            </div>
                            <h4 class="mb-0 text-primary fw-bold">CAPITAL MANAGEMENT</h4>
                        </div>
                    </div>
                </div>
                
                <!-- Metrics Section -->
                <div class="row g-4">
                    <!-- My Capital Card -->
                    <div class="col-md-4">
                        <div class="card border-success border-opacity-25 h-100 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-warning bg-opacity-10 p-2 rounded-circle me-3">
                                        <i class="mdi mdi-wallet fs-2 text-warning"></i>
                                    </div>
                                    <h5 class="mb-0 text-uppercase text-muted fw-bold">My Capital</h5>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <h2 class="fw-bold text-dark mb-0">1,222,220 Tsh</h2>
                                    <span class="badge bg-warning bg-opacity-20 text-light text-warning">-12%</span>
                                </div>
                                <div class="progress mt-3" style="height: 8px;">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 65%"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Today's Profit Card -->
                    <div class="col-md-4">
                        <div class="card border-success border-opacity-25 h-100 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-success bg-opacity-10 p-2 rounded-circle me-3">
                                        <i class="mdi mdi-cash-multiple fs-2 text-success"></i>
                                    </div>
                                    <h5 class="mb-0 text-uppercase text-muted fw-bold">Today's Profit</h5>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <h2 class="fw-bold text-dark mb-0">18,000,000 Tsh</h2>
                                    <span class="badge bg-success bg-opacity-20 text-light text-success">+24%</span>
                                </div>
                                <div class="progress mt-3" style="height: 8px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 85%"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Net Capital Card -->
                    <div class="col-md-4">
                        <div class="card border-primary border-opacity-25 h-100 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-primary bg-opacity-10 p-2 rounded-circle me-3">
                                        <i class="mdi mdi-chart-line fs-2 text-primary"></i>
                                    </div>
                                    <h5 class="mb-0 text-uppercase text-muted fw-bold">Net Capital</h5>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <h2 class="fw-bold text-dark mb-0">16,777,780 Tsh</h2>
                                    <span class="badge bg-primary text-light bg-opacity-20 text-primary">+18%</span>
                                </div>
                                <div class="progress mt-3" style="height: 8px;">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 75%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</div>


<!-- container -->
@include('systeamAdmin.admin-templete-controller.footer')