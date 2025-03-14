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
                            <a href="javascript:void(0);"
                                class="btn btn-outline-info btn-sm  mb-2 add-products-btn"><i
                                    class="mdi mdi-plus-circle me-2 h4"></i> <span class="h5">Add Products </span> </a>
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
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Product Name:</label>
                                    <input type="text" id="product_name" class="form-control form-control-sm "
                                        name="product_name">
                                    <i class="text-danger product_name message fw-normal role font-16"></i>

                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Product Image:</label>
                                    <input type="file" id="product_image" class="form-control form-control-sm "
                                        name="product_image">
                                    <i class="text-danger product_image message fw-normal role font-16"></i>

                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Product Category:</label>
                                    <input type="text" id="product_" class="form-control form-control-sm "
                                        name="start_amount">
                                    <i class="text-danger start_amount message fw-normal role font-16"></i>

                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Product Price:</label>
                                    <input type="number" id="product_price" class="form-control form-control-sm "
                                        name="product_price">
                                    <i class="text-danger product_price message fw-normal role font-16"></i>

                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Product Quantity:</label>
                                    <input type="number" id="product_quantity" class="form-control form-control-sm "
                                        name="product_quantity">
                                    <i class="text-danger product_quantity message fw-normal role font-16"></i>

                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Product Iteams:</label>
                                    <input type="number" id="product_iteams" class="form-control form-control-sm "
                                        name="product_iteams">
                                    <i class="text-danger product_iteams message fw-normal role font-16"></i>

                                </div>


                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Price per Iteams:</label>
                                    <input type="number" id="price_per_iteams" class="form-control form-control-sm "
                                        name="price_per_iteams">
                                    <i class="text-danger price_per_iteams message fw-normal role font-16"></i>

                                </div>


                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Selling Price per Iteam:</label>
                                    <input type="number" id="selling_price" class="form-control form-control-sm "
                                        name="selling_price">
                                    <i class="text-danger selling_price message fw-normal role font-16"></i>

                                </div>

                                <div class="mb-3 col-md-6">
                                        <label for="example-select" class="form-label">Product Classfication:</label>
                                        <select name="category" class="form-select form-select-sm" id="product-category" required>
                                            <option value="" disabled selected>Select Product Category</option>
                                            <option value="electronics">Electronics</option>
                                            <option value="glass">Glassware</option>
                                            <option value="ceramics">Ceramics (Vyombo vya Udongo)</option>
                                            <option value="plastic">Plastic</option>
                                            <option value="metal">Metal (Chuma)</option>
                                            <option value="bone_china">Bone China (Vyombo vya Mfupa)</option>

                                        </select>

                                    <i class="text-danger products_Classfication message fw-normal role font-16"></i>

                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Color:</label>
                                    <input type="text" id="color" class="form-control form-control-sm "
                                        name="color">
                                    <i class="text-danger color message fw-normal role font-16"></i>

                                </div>





                            </div>
                            <center>
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn- h4 fw-bold text-light  w-50 " id="addProducts"
                                        style="background-color:teal">Add Product <span
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