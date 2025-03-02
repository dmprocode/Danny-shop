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
                    <div class="row mb-2">
                        <div class="col-sm-5">
                            <a href="javascript:void(0);" class="btn btn-outline-info btn-sm mb-2 add-user"><i
                                    class="mdi mdi-plus-circle me-2 h4"></i> <span class="h5">Add Capital</span> </a>
                        </div>
                        <div class="col-sm-7 ">
                            <div class="text-sm-end">
                                <a href="{{ route('admin-dashboard')}}" class="btn btn- mb-2 me-1  text-light root-btn"
                                    style="background-color:rgb(24,4,24)"><i class="mdi mdi-arrow-left font-16"> Go
                                        Back</i></a>

                            </div>
                        </div><!-- end col-->

                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th class="f-13 text-info ">ID</th>
                                    <th class="f-13 text-info ">Start Amouth</th>
                                    <th class="f-13 text-info ">Update Amouth</th>
                                    <th class="f-13 text-info ">Product Profit</th>
                                    <th class="f-13 text-info ">Added By</th>
                                    <th class="f-13 text-info ">Action</th>



                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1 </td>
                                    <td>100000 </td>
                                    <td>120000</td>
                                    <td>15000</td>
                                    <td>Catherine Mathias</td>
                                    <td>Delete</td>

                                </tr>
                            </tbody>



                        </table>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
    </div>

    <!-- End of user Table -->


    <!-- ===============Capital form ======================-->


    <div class="row" id="capita-form">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-5">
                            <a href="javascript:void(0);" class="btn btn-outline-info btn-sm mb-2 add-user"><i
                                    class="mdi mdi-plus-circle me-2 h4"></i> <span class="h5">Add Capital</span> </a>
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
                                    <input type="number" id="simpleinput" class="form-control form-control-sm " name="fullname">
                                    <i class="text-danger message fullname font-16"></i>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="example-email" class="form-label">Updated Amouth:</label>
                                    <input type="number" id="updated-amouth" class="form-control form-control-sm" name="updatedAmouth">
                                    <i class="text-danger message email font-16"></i>

                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="example-select" class="form-label">Added by:</label>
                                    <select class="form-select" id="example-select" name="userRole">
                                        <option>Select</option>
                                        @foreach($adminComponents ['listOfUser'] as $user)
                                        <option value="{{$user->id}}">{{$user->fullname}}</option>
                                        @endforeach

                                    </select>
                                    <i class="text-danger userRole message role font-16"></i>

                                  </div>
                            </div>
                            <center>
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn- h4 fw-bold text-light add-user-btn w-50 "
                                        style="background-color:teal">Add Capital <span class="uil-plus"></span></button>
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