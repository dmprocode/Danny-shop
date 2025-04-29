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
                <h4 class="page-title fw-normal" id="">Add User`s</h4>
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
                                <a href="javascript:void(0);" class="btn btn-outline-info btn-sm mb-2 add-capital-btn"><i
                                        class="mdi mdi-plus-circle me-2 h4"></i> <span class="h5">Add Capital</span> </a>
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
                                    @if($adminComponents['capitalUser']->isEmpty())
                                    <i class="text-danger font-16">No Capital Available</i>
                                    @else
                                    <tbody>
                                        @foreach($adminComponents['capitalUser'] as $user)
                                        @foreach($user->capital as $key=>$capital)
                                        <tr>
                                            <td>{{$key + 1}}</td>
                                            <td>{{number_format($capital->start_amount ,2) }}</td>
                                            @if($capital->product_profit == '')
                                            <td class="text-danger">No Value</td>
                                            @else
                                            <td>{{number_format( $capital->product_profit ,2)}}</td>
                                            @endif
                                            <td>{{\Carbon\carbon::parse($capital->created_at)->format('M-j-Y')}}</td>
                                            <td>{{\Carbon\carbon::parse($capital->update_at)->format('M-j-Y')}}</td>

                                            <td>{{ $user->fullname }}</td>
                                            <td>
                                                <span class="dtr-data">
                                                    <a href="javascript:void(0);" class="action-icon"> <i
                                                            class="mdi mdi-square-edit-outline edit-capital"
                                                            data-id="{{$capital->id}}" data-user="{{$user->id}}"
                                                            data-start_amount="{{$capital->start_amount}}"
                                                            data-update_amount="{{$capital->update_amount}}"
                                                            data-fullname="{{$user->fullname}}"></i></a>
                                                    <a href="javascript:void(0);" class="action-icon"> <i
                                                            class="mdi mdi-delete"></i></a></span>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endforeach

                                    </tbody>



                                </table>
                                @endif
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
                                <h4 class="header-title mb-3">Order Summary</h4>

                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <tbody>
                                            <tr>
                                                <td>Grand Total :</td>
                                                <td>$1571.19</td>
                                            </tr>
                                            <tr>
                                                <td>Discount : </td>
                                                <td>-$157.11</td>
                                            </tr>
                                            <tr>
                                                <td>Shipping Charge :</td>
                                                <td>$25</td>
                                            </tr>
                                            <tr>
                                                <td>Estimated Tax : </td>
                                                <td>$19.22</td>
                                            </tr>
                                            <tr>
                                                <th>Total :</th>
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




    <!-- End of user Table -->


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

                        <form action="#" id="userFormData">
                            @csrf

                            <div class="row">

                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Start Amouth:</label>
                                    <input type="text" id="simpleinput" class="form-control form-control-sm "
                                        name="start_amount">
                                    <i class="text-danger start_amount message fw-normal role font-16"></i>

                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="example-select" class="form-label">Added by:</label>
                                    <select class="form-select" id="example-select" name="userRole">
                                        <option>Select</option>
                                        @foreach($adminComponents ['listOfUser'] as $user)
                                        <option value="{{$user->id}}">{{$user->fullname}}</option>
                                        @endforeach

                                    </select>
                                    <i class="text-danger userRole fw-normal message role font-16"></i>

                                </div>
                            </div>
                            <center>
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn- h4 fw-bold text-light  w-50 " id="capitalValue" style="background-color:teal">Add Capital <span class="uil-plus"></span></button>
                                </div>

                            </center>

                        </form>



                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
    </div>


    <!-- ====================Update Capital============= -->


    <div class="row" id="update-capital-form">
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

                        <form action="#" id="up-userFormData">
                            @csrf

                            <div class="row">
                                <input type="hidden" id="up_id" name="up_id">
                                <input type="hidden" id="user_id" name="user_id">



                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Start Amouth:</label>
                                    <input type="text" id="start_amouth" class="form-control form-control-sm "
                                        name="start_amount">
                                    <i class="text-danger start_amount message fw-normal role font-16"></i>

                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Added by:</label>
                                    <input type="text" class="form-control form-control-sm " id="addedBy"
                                        name="addedBy">
                                    <i class="text-danger userRole fw-normal message role font-16"></i>

                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Update Amouth:</label>
                                    <input type="text" id="update_amouth" class="form-control form-control-sm "
                                        name="update_amouth">
                                    <i class="text-danger start_amount message fw-normal role font-16"></i>

                                </div>
                            </div>
                            <center>
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn- h4 fw-bold text-light up-capital-btn w-50 "
                                        style="background-color:teal">Update Capital <span
                                            class="uil-edit"></span></button>
                                </div>

                            </center>

                        </form>



                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
    </div>












    <!-- container -->
    @include('systeamAdmin.capital.capital_script')
    @include('systeamAdmin.admin-templete-controller.footer')