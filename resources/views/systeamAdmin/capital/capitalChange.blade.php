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
                <h4 class="page-title fw-normal" id="">Change Capital</h4>
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
                            <div class="col-sm-5">
                                <a href="javascript:void(0);"
                                    class="btn btn-outline-info btn-sm mb-2 add-capital-btn"><i
                                        class="mdi mdi-plus-circle me-2 h4"></i> <span class="h5">Change Capital</span>
                                </a>
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
                        <div class="col-lg-8">
                            <div class="table-responsive">
                                <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                    @if($adminComponents['userWithCapital']->isEmpty())
                                    <i class="text-danger font-16">No Data Available</i>
                                    @else
                                    <thead class="table-light">
                                        <tr>
                                            <th>ID</th>
                                            <th class="">Capital Allocation</th>
                                            <th>Further investment</th>
                                            <th>User Add</th>
                                            <th>Added Date</th>
                                            <th>Updated Date</th>


                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($adminComponents['userWithCapital'] as $user)
                                        @foreach($user->capital as $key=>$capital)
                                        <tr>
                                            <td>{{$key + 1}}</td>
                                            <td>{{number_format($capital->start_amount,2)}}</td>
                                            <td>{{number_format($capital->update_amount,2)}}</td>
                                            <td>{{$user->fullname}}</td>
                                            <td>{{\Carbon\carbon::parse($capital->created_at)->format('M-j-Y')}}</td>
                                            <td>{{\Carbon\carbon::parse($capital->updated_at)->format('M-j-Y')}}</td>
                                        </tr>
                                        @endforeach
                                        @endforeach
                                      
                                    </tbody>

                                    @endif

                                </table>

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

                        <div class="col-lg-4">
                            <div class="border p-3 mt-4 mt-lg-0 rounded">
                                <h4 class="header-title mb-3">CAPITAL</h4>

                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <tbody>
                                            <tr>
                                                <td>Capital Allocation :</td>
                                                <td class="text-danger fw-bold">{{number_format($adminComponents['capitalAllocation'],2)}}</td>
                                            </tr>
                                            
                                            <tr>
                                                <td>Further investment:</td>
                                                <td class="text-danger  fw-bold">{{number_format($adminComponents['fatherInvestimeants'],2)}}</td>
                                            </tr>
                                            <tr>
                                                <td>Standing Capital:  </td>
                                                <td class="text-info fw-bold">{{number_format($adminComponents['capitalAllocation'] + $adminComponents['fatherInvestimeants'],2)}}</td>
                                            </tr>
                                            <tr>
                                                <th>Profit</th>
                                                <th>$1458.3</th>
                                            </tr>
                                            <tr>
                                                <th>Profit</th>
                                                <th>$1458.3</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- end table-responsive -->
                            </div>





                        </div> <!-- end col -->

                    </div> <!-- end row -->
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>



    <!-- ===============Capital form ======================-->


    <div class="row" id="capital-form">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-5">
                            <a href="javascript:void(0);"
                                class="btn btn-outline-danger btn-sm text-info mb-2 go-back-btn"><i
                                    class="mdi mdi-plus-circle me-2 h4"></i> <span class="h5">Go Back </span> </a>
                        </div>
                        <div class="col-sm-7 ">
                            <div class="text-sm-end">
                                <a href="{{ route('admin-dashboard')}}" class="btn btn- mb-2 me-1  text-light root-btn"
                                    style="background-color:rgb(24,4,24)"><i class="mdi mdi-arrow-left font-16"> Go
                                        Back</i></a>

                            </div>
                        </div><!-- end col-->

                        <form action="#" id="changeCapital">
                            @csrf

                            <div class="row">

                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Add Amouth:</label>
                                    <input type="text" id="change_amouth" class="form-control form-control-sm" name="change_amouth">
                                    <i class="text-danger change-amouth messsage fw-normal role font-16"></i>

                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="example-select" class="form-label">Added by:</label>
                                    <select class="form-select" id="example-select" name="userRole">
                                        <option>Select</option>
                                        @foreach($adminComponents ['listOfUser'] as $user)
                                        <option value="{{$user->id}}">{{$user->fullname}}</option>
                                        @endforeach

                                    </select>
                                    <i class="text-danger userRole fw-normal messsage role font-16"></i>

                                </div>


                            </div>
                            <center>
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn- h4 fw-bold text-light change-capital-btn w-50 "
                                        style="background-color:teal">Change Capital <span
                                            class="uil-plus"></span></button>
                                </div>

                            </center>

                        </form>



                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
    </div>





    @include('systeamAdmin.capital.capital_script')
    @include('systeamAdmin.admin-templete-controller.footer')