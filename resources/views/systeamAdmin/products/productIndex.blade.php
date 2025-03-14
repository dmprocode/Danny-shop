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
                <h4 class="page-title fw-normal" id="">Add Product`s</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

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

                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Iteams</th>
                                    <th>Price Per Iteams</th>
                                    <th>Seeling Price per Iteams</th>
                                    <th> Classfication</th>
                                    <th>Color</th>
                                    <th>Action</th>

                                </tr>
                            </thead>


                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Alyons Fen</td>
                                    <td>Electronic</td>
                                    <td>120000</td>
                                    <td>2</td>
                                    <td>4</td>
                                    <td>35000</td>
                                    <td>60000</td>
                                    <td>Red</td>
                                    <td>Set</td>
                                    <td>
                                      <span class="dtr-data"><a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a></span>
                                    </td>
                               </tr>
                            </tbody>
                        </table>


                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
    </div>

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
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Product Name:</label>
                                    <input type="text" id="simpleinput" class="form-control form-control-sm "
                                        name="start_amount">
                                    <i class="text-danger start_amount message fw-normal role font-16"></i>

                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Product         Image:</label>
                                    <input type="text" id="simpleinput" class="form-control form-control-sm "
                                        name="start_amount">
                                    <i class="text-danger start_amount message fw-normal role font-16"></i>

                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Product Category:</label>
                                    <input type="text" id="simpleinput" class="form-control form-control-sm "
                                        name="start_amount">
                                    <i class="text-danger start_amount message fw-normal role font-16"></i>

                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Product Price:</label>
                                    <input type="text" id="simpleinput" class="form-control form-control-sm "
                                        name="start_amount">
                                    <i class="text-danger start_amount message fw-normal role font-16"></i>

                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Product Quantity:</label>
                                    <input type="text" id="simpleinput" class="form-control form-control-sm "
                                        name="start_amount">
                                    <i class="text-danger start_amount message fw-normal role font-16"></i>

                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Product Iteams:</label>
                                    <input type="text" id="simpleinput" class="form-control form-control-sm "
                                        name="start_amount">
                                    <i class="text-danger start_amount message fw-normal role font-16"></i>

                                </div>


                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Price per Iteams:</label>
                                    <input type="text" id="simpleinput" class="form-control form-control-sm "
                                        name="start_amount">
                                    <i class="text-danger start_amount message fw-normal role font-16"></i>

                                </div>


                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Selling Price per Iteam:</label>
                                    <input type="text" id="simpleinput" class="form-control form-control-sm "
                                        name="start_amount">
                                    <i class="text-danger start_amount message fw-normal role font-16"></i>

                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Product Classfication:</label>
                                    <input type="text" id="simpleinput" class="form-control form-control-sm "
                                        name="start_amount">
                                    <i class="text-danger start_amount message fw-normal role font-16"></i>

                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Color:</label>
                                    <input type="text" id="simpleinput" class="form-control form-control-sm "
                                        name="start_amount">
                                    <i class="text-danger start_amount message fw-normal role font-16"></i>

                                </div>





                            </div>
                            <center>
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn- h4 fw-bold text-light  w-50 " id="capitalValue"
                                        style="background-color:teal">Add Capital <span
                                            class="uil-plus"></span></button>
                                </div>

                            </center>

                        </form>



                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
    </div>

    <!-- container -->
    <!-- @include('systeamAdmin.capital.capital_script') -->
    @include('systeamAdmin.admin-templete-controller.footer')