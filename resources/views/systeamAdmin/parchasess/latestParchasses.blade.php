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
                <h4 class="page-title fw-normal" id=""> Purchase`s List</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row" id="parchasses-table">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4  my-1">
                            <a href="javascript:void(0);"
                                class="btn btn-outline-info btn-sm rounded-pill shadow-sm fw-bold px-4 py-2 d-flex align-items-center">
                                <span class="fs-5">Latest Purchases</span>
                                <span class="badge bg-info text-white ms-2 px-2 py-1">New</span>
                            </a>
                        </div>
                        <div class="col-sm-7 ">
                            <div class="text-sm-end">
                                <a href="{{ route('admin-dashboard')}}" class="btn btn- mb-2 me-1  text-light root-btn"
                                    style="background-color:rgb(24,4,24)"><i class="mdi mdi-arrow-left font-16"> Go
                                        Back</i></a>

                            </div>
                        </div><!-- end col-->
                        @if($adminComponents['parchassesList']->isEmpty())
                        <i class="text-danger fw-bold">
                            No Parchasses Available
                        </i>
                        @else

                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Carton</th>
                                    <th>Date</th>
                                    <th>Sales Point</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($adminComponents['parchassesList'] as $key=>$parchasses)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$parchasses->products->name}}</td>
                                    <td>{{number_format($parchasses->buying_price,2)}}</td>
                                    <td>{{$parchasses->number_picess}}</td>
                                    <td>{{$parchasses->number_catton}}</td>
                                    <td>{{ \Carbon\Carbon::parse($parchasses->created_at)->diffForHumans() }}</td>
                                    <td>{{$parchasses->sales_point}}</td>
                                    <td>
                                        <a href="javascript:void(0);" class="action-icon"> <i
                                                class="mdi mdi-delete delete-latest-parchasses" data-id="{{$parchasses->id}}"></i></a>
                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"
                                                id="view-more-product"
                                                data-id= "{{$parchasses->products->id}}"></i></a>

                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        @endif



                            <!-- Buttons: Print & Submit -->
                            <div class="d-print-none mt-4 d-flex justify-content-between align-items-center">
                                <!-- Left-aligned button -->
                                <div>
                                    <button class="btn btn-primary btn-sm rounded-pill shadow-sm fw-bold text-uppercase d-flex align-items-center gap-2">
                                        <span>🛒</span>
                                        <span class="h6">Total Purchases</span>
                                        <span class="badge bg-light text-dark ms-auto">{{number_format($adminComponents['totalParchasses'],2)}}</span>
                                    </button>
                                </div>
                                
                                <div>
                                    <a href="javascript:window.print()" class="btn btn-primary btn-lg rounded-pill shadow-sm px-4">
                                        <i class="mdi mdi-printer me-2 fs-4"></i>
                                        <span class="fw-bold">Print Report</span>
                                    </a>
                                </div>
                            </div>







                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
    </div>


    <div class="container-fluid d-none">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                            <li class="breadcrumb-item active">Invoice</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Invoice</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <!-- Invoice Logo-->
                        <div class="clearfix">
                            <div class="float-start mb-3">
                                <img src="assets/images/logo-light.png" alt="" height="18">
                            </div>
                            <div class="float-end">
                                <h4 class="m-0 d-print-none">Invoice</h4>
                            </div>
                        </div>

                        <!-- Invoice Detail-->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="float-end mt-3">
                                    <p><b>Hello, Cooper Hobson</b></p>
                                    <p class="text-muted font-13">Please find below a cost-breakdown for the recent work
                                        completed. Please make payment at your earliest convenience, and do not hesitate
                                        to contact me with any questions.</p>
                                </div>

                            </div><!-- end col -->
                            <div class="col-sm-4 offset-sm-2">
                                <div class="mt-3 float-sm-end">
                                    <p class="font-13"><strong>Order Date: </strong> &nbsp;&nbsp;&nbsp; Jan 17, 2018</p>
                                    <p class="font-13"><strong>Order Status: </strong> <span
                                            class="badge bg-success float-end">Paid</span></p>
                                    <p class="font-13"><strong>Order ID: </strong> <span
                                            class="float-end">#123456</span></p>
                                </div>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->


                        <!-- end row -->


                        <!-- end row -->

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="clearfix pt-3">
                                    <h6 class="text-muted">Notes:</h6>
                                    <small>
                                        All accounts are to be paid within 7 days from receipt of
                                        invoice. To be paid by cheque or credit card or direct payment
                                        online. If account is not paid within 7 days the credits details
                                        supplied as confirmation of work undertaken will be charged the
                                        agreed quoted fee noted above.
                                    </small>
                                </div>
                            </div> <!-- end col -->
                            <div class="col-sm-6">
                                <div class="float-end mt-3 mt-sm-0">
                                    <p><b>Sub-total:</b> <span class="float-end">$4120.00</span></p>
                                    <p><b>VAT (12.5):</b> <span class="float-end">$515.00</span></p>
                                    <h3>$4635.00 USD</h3>
                                </div>
                                <div class="clearfix"></div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row-->

                        <div class="d-print-none mt-4">
                            <div class="text-end">
                                <a href="javascript:window.print()" class="btn btn-primary"><i
                                        class="mdi mdi-printer"></i> Print</a>
                                <a href="javascript: void(0);" class="btn btn-info">Submit</a>
                            </div>
                        </div>
                        <!-- end buttons -->

                    </div> <!-- end card-body-->
                </div> <!-- end card -->
            </div> <!-- end col-->
        </div>
        <!-- end row -->

    </div>


    <!--  ======================Update Parchasses============ -->



    <!-- container -->
    @include('systeamAdmin.parchasess.parchassesScript')
    @include('systeamAdmin.admin-templete-controller.footer')