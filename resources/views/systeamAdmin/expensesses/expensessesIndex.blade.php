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
                <h4 class="page-title fw-normal" id=""> Exapenses Table</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->





    <div class="row" id="expenses-table">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4 my-1">
                            <a href="javascript:void(0);" id="make-expenses"
                                class="btn btn-outline-danger btn-sm rounded-pill shadow-sm fw-bold px-4 py-2 d-flex align-items-center justify-content-between gap-2">
                                <span class="fs-5">💸 Add Expenses</span>
                                <span class="badge bg-danger text-white px-2 py-1">New</span>
                            </a>
                        </div>



                        <div class="col-sm-8">
                            <div class="text-sm-end">
                                <a href="{{ route('admin-dashboard')}}" class="btn btn- mb-2 me-1  text-light root-btn"
                                    style="background-color:rgb(24,4,24)"><i class="mdi mdi-arrow-left font-16"> Go
                                        Back</i></a>

                            </div>
                        </div><!-- end col-->

                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            @if($adminComponents['expenses']->isEmpty())
                            <i class="text-danger fw-bold">No Expenses Record Available</i>
                            @else
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Amouth</th>
                                    <th>Discription</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($adminComponents['expenses'] as $key=>$expensive)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{number_format($expensive->amount,2)}}</td>
                                    <td>{{$expensive->description}}</td>
                                    <td>{{ \Carbon\Carbon::parse($expensive->date)->format('F j, Y')}}</td>
                                    <td>
                                    <span class="dtr-data">
                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>             
                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a></span>
                                    </td>
                                </tr>
                                @endforeach


                            </tbody>
                            @endif
                        </table>



                        <!-- Buttons: Print & Submit -->
                        <div class="d-print-none mt-4 d-flex justify-content-between align-items-center">
                            <!-- Left-aligned button -->
                            <div>
                                <button
                                    class="btn btn-primary btn-sm rounded-pill shadow-sm fw-bold text-uppercase d-flex align-items-center gap-2">
                                    <span>🛒</span>
                                    <span class="h6">Total Expenses</span>
                                    <span class="badge bg-light text-dark ms-auto">{{number_format($adminComponents['todayTotalExpense'],2)}}</span>
                                </button>
                            </div>

                            <div>
                                <a href="javascript:window.print()"
                                    class="btn btn-primary btn-lg rounded-pill shadow-sm px-4">
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


    <div class="row" id="expenses-form-div">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4 my-1">
                            <a href="javascript:void(0);" id="go-make-expenses"
                                class="btn btn-outline-danger btn-sm rounded-pill shadow-sm fw-bold px-4 py-2 d-flex align-items-center justify-content-between gap-2">
                                <span class="fs-5">💸 Go  Back</span>
                                <span class="badge bg-danger text-white px-2 py-1">New</span>
                            </a>
                        </div>



                        <div class="col-sm-8">
                            <div class="text-sm-end">
                                <a href="{{ route('admin-dashboard')}}" class="btn btn- mb-2 me-1  text-light root-btn"
                                    style="background-color:rgb(24,4,24)"><i class="mdi mdi-arrow-left font-16"> Go
                                        Back</i></a>

                            </div>
                        </div><!-- end col-->
                        <form action="#" id="expensesFormData">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Amouth:</label>
                                    <input type="text" id="parchasses-buying-price"
                                        class="form-control form-control-sm " name="amouth">
                                    <i class="text-danger message  amouthMSG fw-normal role font-16" id=""></i>

                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Discription</label>
                                  <input type="text" class="form-control form-contro-sm" maxlength="50" data-toggle="maxlength" name="disc">
                                    <i class="text-danger dscMSG message fw-normal role font-16"></i>

                                </div>
                                <div class="mb-3 col-md-6 position-relative" id="datepicker2">
                                    <label class="form-label">Date </label>
                                    <input type="text" class="form-control" name="date" data-provide="datepicker" data-date-autoclose="true" data-date-format="d-M-yyyy" data-date-container="#datepicker2">
                                    <i class="text-danger dateMSG message fw-normal role font-16"></i>

                                </div>

                            </div>
                            <center>
                                <div class="d-flex justify-content-center my-4">
                                    <button class="btn btn-sm fw-bold text-white shadow-lg px-5 py-3 rounded-pill border-0"
                                            id="add-expensses"
                                            style="background: linear-gradient(to right, #008080, #20b2aa)">
                                    <i class="uil uil-money-bill me-2"></i> Add Expenses
                                    <span class="uil uil-plus ms-2"></span>
                                    </button>
                                </div>
                            </center>


                        </form>

                       


                        
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
    </div>
</div> <!-- end card-body-->
</div> <!-- end card-->
</div> <!-- end col -->
</div>
</div>



<!--  ======================Update Parchasses============ -->



<!-- container -->
@include('systeamAdmin.expensesses.expensesScript')
@include('systeamAdmin.admin-templete-controller.footer')