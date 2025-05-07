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


    <div class="row" id="profit-expesses-table">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="col-sm-5">
                                    <a href="javascript:void(0);"
                                        class="btn btn-outline-info btn-lg rounded-pill px-3 py-0 d-inline-flex align-items-center  add-profit-expenses-btn"
                                        style="height: 28px;">

                                        <i class="mdi mdi-plus me-1 small"></i>
                                        <span class="small"> Expenses||Profits</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-8 ">
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
                                <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                    <thead class="table-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Initial Investment</th>
                                            <th>Update Amouth</th>
                                            <th>Product Profit</th>
                                            <th>Added Date</th>
                                            <th>Action</th>



                                        </tr>
                                    </thead>

                                    <datetbody>
                                        @foreach($adminComponents['mycapital'] as $key => $capital)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>

                                            <!-- Start Amount -->
                                            @if(empty($capital->start_amount))
                                            <td class="text-danger fw-bold">No value</td>
                                            @else
                                            <td>{{ number_format($capital->start_amount) }}</td>
                                            @endif

                                            <!-- Update Amount -->
                                            @if(empty($capital->update_amount))
                                            <td class="text-danger fw-bold">No value</td>
                                            @else
                                            <td>{{ number_format($capital->update_amount, 2) }}</td>
                                            @endif

                                            <!-- Product Profit -->
                                            @if(empty($capital->product_profit))
                                            <td class="text-danger fw-bold">No value</td>
                                            @else
                                            <td>{{ number_format($capital->product_profit, 2) }}</td>
                                            @endif

                                            <!-- Date -->
                                            <td>{{ \Carbon\Carbon::parse($capital->ceated_at)->format('M-j-Y') }}</td>

                                            <!-- Action Icons -->
                                            <td>
                                                <a href="javascript:void(0);" class="action-icon text-danger"
                                                    title="Delete">
                                                    <i class="mdi mdi-delete delete-btn"
                                                    data-id= "{{$capital->id}}"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </datetbody>




                                </table>
                            </div> <!-- end table-responsive-->


                            <!-- action buttons-->
                            <div class="row mt-4 ">
                                <div class="col-sm-6">
                                    <a href="apps-ecommerce-products.html"
                                        class="btn text-muted d-none d-sm-inline-block btn-link fw-semibold">
                                        <i class="mdi mdi-arrow-left"></i> Continue Shopping </a>
                                </div> <!-- end col -->

                            </div> <!-- end row-->
                        </div>
                        <!-- end col -->
                        <div class="row" id="profit-expenses-form-div">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col-sm-4 my-1">
                                                <a href="javascript:void(0);" id="go-back-btn-expeses"
                                                    class="btn btn-outline-danger btn-sm rounded-pill shadow-sm fw-bold px-4 py-2 d-flex align-items-center justify-content-between gap-2">
                                                    <span class="fs-5">💸 Go Back</span>
                                                    <span class="badge bg-danger text-white px-2 py-1">New</span>
                                                </a>
                                            </div>




                                            <form action="#" id="expensesFormData">
                                                @csrf
                                                <div class="row">
                                                    <div class="mb-3 col-md-6 position-relative" id="datepicker2">
                                                        <label class="form-label">Date </label>
                                                        <input type="text" class="form-control" name="date"
                                                            data-provide="datepicker" data-date-autoclose="true"
                                                            data-date-format="d-M-yyyy"
                                                            data-date-container="#datepicker2"
                                                            value="<?php echo date('d-M-Y'); ?>" disabled="true">
                                                        <i
                                                            class="text-danger dateMSG message fw-normal role font-16"></i>

                                                    </div>

                                                    <div class="mb-3 col-md-6">
                                                        <label for="simpleinput"
                                                            class="form-label fw-normal fs-16 ">Total Expenses:</label>
                                                        <input type="text" id="parchasses-buying-price"
                                                            class="form-control form-control-sm " name="total_expenses"
                                                            value="{{$adminComponents['realExpennses']}}"
                                                            disabled="true">
                                                        <i class="text-danger message  amouthMSG fw-normal role font-16"
                                                            id=""></i>

                                                    </div>

                                                    <div class="mb-3 col-md-6">
                                                        <label for="simpleinput"
                                                            class="form-label fw-normal fs-16 ">Total Profit:</label>
                                                        <input type="text" id="parchasses-buying-price"
                                                            class="form-control form-control-sm " name="total_profit"
                                                            value="{{number_format($adminComponents['realProfit'],2)}}"
                                                            disabled="true">
                                                        <i class="text-danger message  amouthMSG fw-normal role font-16"
                                                            id=""></i>

                                                    </div>


                                                    <div class="mb-3 col-md-6">
                                                        <label for="simpleinput"
                                                            class="form-label fw-normal fs-16 ">Real Profit:</label>
                                                        <input type="text" id="parchasses-buying-price"
                                                            class="form-control form-control-sm " name="real_profit"
                                                            value="{{number_format($adminComponents['todayProfit'],2)}}"
                                                            disabled="true">
                                                        <i class="text-danger message  amouthMSG fw-normal role font-16"
                                                            id=""></i>

                                                    </div>


                                                </div>


                                                <style>

                                                </style>
                                                <center>
                                                    <div class="d-flex justify-content-center py-2">
                                                        <button type="button"
                                                            class="btn btn-success rounded-pill px-4 py-3 shadow-lg hover-scale position-relative"
                                                            style="
                                                                background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
                                                                border: none;
                                                                transition: all 0.3s ease;
                                                                min-width: 300px;
                                                                overflow: hidden;
                                                            " onmouseover="this.style.transform='scale(1.03)'"
                                                            onmouseout="this.style.transform='scale(1)'">
                                                            <!-- Glow effect on hover -->
                                                            <span
                                                                class="position-absolute top-0 start-0 w-100 h-100 bg-white opacity-0 hover-opacity-10"
                                                                style="transition: opacity 0.3s;"></span>

                                                            <div class="d-flex align-items-center">
                                                                <!-- Animated Calculator Icon -->
                                                                <i class="mdi mdi-calculator fs-3 me-3 pulse-icon"
                                                                    style="color: rgba(255,255,255,0.9);"></i>

                                                                <!-- Main Text -->
                                                                <div class="text-start">
                                                                    <div class="fw-bold fs-5 text-white">Today's Net
                                                                        Profit</div>
                                                                    <div class="text-white-80 fw-semibold mb-1"
                                                                        style="font-size: 1.1rem;" id="todayProfit">
                                                                        {{
                                                                        number_format($adminComponents['todayProfit'],
                                                                        2) }}
                                                                    </div>
                                                                    <!-- "Click to Submit" Badge -->
                                                                    <small
                                                                        class="badge bg-light text-dark blink profit-btn"
                                                                        style="font-size: 0.7rem;">
                                                                        <i class="mdi mdi-cursor-pointer me-1 "></i>
                                                                        Click to Submit
                                                                    </small>
                                                                </div>

                                                                <!-- Animated Arrow -->
                                                                <i class="mdi mdi-arrow-right-bold-circle fs-3 ms-4 bounce-horizontal"
                                                                    style="color: rgba(255,255,255,0.9);"></i>
                                                            </div>
                                                        </button>
                                                    </div>
                                                </center>

                                            </form>




                                        </div> <!-- end card-body-->
                                    </div> <!-- end card-->
                                </div> <!-- end col -->
                            </div>
                        </div>

                    </div> <!-- end row -->
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>


    <!-- container -->
    @include('systeamAdmin.expensesses.expensesScript')
    @include('systeamAdmin.admin-templete-controller.footer')