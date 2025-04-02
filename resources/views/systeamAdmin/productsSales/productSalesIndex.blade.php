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
                <h4 class="page-title fw-normal" id=""> Product`s Table</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row" id="products-table">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-5">
                            <a href="javascript:void(0);" class="btn btn-outline-info btn-sm  mb-2 add-products-btn"><i
                                    class="mdi mdi-plus-circle me-2 h4"></i> <span class="h5">Add Customer`s </span>
                            </a>
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
                                    <th>Customer Name</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Selling Price</th>
                                    <th>Profit</th>
                                    <th>Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Daniel Mathias </td>
                                    <td>Maharage</td>
                                    <td>5000</td>
                                    <td>1000</td>
                                    <td>1000</td>
                                    <td>Delete</td>
                                </tr>

                            </tbody>
                        </table>




                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
    </div>



    <div class="row" id="add-products-div">
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

                        <form action="#" id="productsFormData">
                            @csrf

                            <div class="row">

                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Customer Name:</label>
                                    <select class="form-control select2" data-toggle="select2">
                                        <option>Select</option>
                                        <optgroup label="Alaskan/Hawaiian Time Zone">
                                            <option value="AK">Alaska</option>
                                            <option value="HI">Hawaii</option>
                                        </optgroup>
                                    </select>

                                    <i class="text-danger product_name message fw-normal role font-16"></i>

                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Products Name:</label>
                                    <select class="form-control select2" data-toggle="select2">
                                        <option>Select</option>
                                        <optgroup label="Select Products Based On ite Name">
                                            @foreach($adminComponents['product'] as $product)
                                            <option value="{{$product->id}}">{{$product->name}}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>

                                    <i class="text-danger product_name message fw-normal role font-16"></i>

                                </div>
                            </div>
                            <center>
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn- h4 fw-bold text-light  w-50 " id="addProducts"
                                        style="background-color:teal">Add Customer <span
                                            class="uil-plus"></span></button>
                                </div>

                            </center>

                        </form>



                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
    </div>

    <div class="row" id="up-products-div">
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

                        <form action="#" id="up-productsFormData">
                            @csrf

                            <div class="row">
                                <input type="hidden" id="id" name="id">
                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Product Name:</label>
                                    <input type="text" id="up_productname" class="form-control form-control-sm "
                                        name="up_productname">
                                    <i class="text-danger up_productname message fw-normal role font-16"></i>

                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Buying Price:</label>
                                    <input type="text" id="up_buying_price" class="form-control form-control-sm "
                                        name="up_buying_price">
                                    <i class="text-danger up-buying_price message fw-normal role font-16"></i>

                                </div>


                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Price Per
                                        Iteams:</label>
                                    <input type="text" id="up_price_perIteams" class="form-control form-control-sm "
                                        name="up_price_perIteams">
                                    <i class="text-danger up-buying_price message fw-normal role font-16"></i>

                                </div>





                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Number of
                                        Catton:</label>
                                    <input type="number" id="up_number_of_catton" class="form-control form-control-sm "
                                        name="up_number_of_catton">
                                    <i class="text-danger up-number_of_catton message fw-normal role font-16"></i>

                                </div>

                                <!-- <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Number of Set:</label>
                                    <input type="number" id="up-number_of_set" class="form-control form-control-sm "
                                        name="up-number_of_set">
                                    <i class="text-danger up-number_of_set message fw-normal role font-16"></i>

                                </div> -->

                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Picess:</label>
                                    <input type="number" id="up_picess" class="form-control form-control-sm "
                                        name="up_picess">
                                    <i class="text-danger up-picess message fw-normal role font-16"></i>

                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="example-select" class="form-label">Product Classfication:</label>
                                    <select name="up_category" class="form-select form-select-sm" id="up_category"
                                        required>
                                        <option value="" disabled selected>Select Product Category</option>
                                        <option value="electronics">Electronics</option>
                                        <option value="glass">Glassware</option>
                                        <option value="ceramics">Ceramics (Vyombo vya Udongo)</option>
                                        <option value="plastic">Plastic</option>
                                        <option value="metal">Metal (Chuma)</option>
                                        <option value="bone_china">Bone China (Vyombo vya Mfupa)</option>

                                    </select>

                                    <i class="text-danger category message fw-normal role font-16"></i>

                                </div>


                                <div class="mb-3 col-md-6">
                                    <label for="example-select" class="form-label">Product Measerment:</label>
                                    <select name="up_measerments" class="form-select form-select-sm" id="up_measerments"
                                        required>
                                        <option value="" disabled selected>Select Product Measerment</option>
                                        <option value="Piecess" id="picesses">Piecess</option>
                                        <option value="Dazeen">Dazeen</option>
                                        <option value="Set">Set</option>
                                        <option value="Other">Other</option>
                                    </select>

                                    <i class="text-danger up_measerments message fw-normal role font-16"></i>

                                </div>




                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Color:</label>
                                    <input type="text" id="up_color" class="form-control form-control-sm "
                                        name="up_color">
                                    <i class="text-danger color message fw-normal role font-16"></i>

                                </div>


                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Size:</label>
                                    <input type="text" id="up_size" class="form-control form-control-sm "
                                        name="up_size">
                                    <i class="text-danger size message fw-normal role font-16"></i>

                                </div>







                            </div>
                            <center>
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn- h4 fw-bold text-light  w-50 " id="updateProduct-btn"
                                        style="background-color:teal">Update Product <span
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
    @include('systeamAdmin.products.productScript')
    @include('systeamAdmin.admin-templete-controller.footer')