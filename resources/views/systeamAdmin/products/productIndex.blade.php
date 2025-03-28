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
                                    class="mdi mdi-plus-circle me-2 h4"></i> <span class="h5">Add Products </span> </a>
                        </div>
                        <div class="col-sm-7 ">
                            <div class="text-sm-end">
                                <a href="{{ route('admin-dashboard')}}" class="btn btn- mb-2 me-1  text-light root-btn"
                                    style="background-color:rgb(24,4,24)"><i class="mdi mdi-arrow-left font-16"> Go
                                        Back</i></a>

                            </div>
                        </div><!-- end col-->
                        @if($adminComponents['products']->isEmpty())
                        <i class="text-danger fw-bold h4">No Products Available</i>
                        @else
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    @if($adminComponents['products']->isEmpty())
                                    <i class="text-danger fw-bold h4">No Products Available</i>
                                    @else
                                    <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Image</th>
                                                <th>Category</th>
                                                <th>Buying Price</th>
                                                <th>No of Cutton</th>
                                                <th>No Of Dozeen</th>
                                                <th>Price per Dazeen</th>
                                                <th>No of Pices</th>
                                                <th>Price Per Iteams</th>
                                                <th>Color</th>
                                                <th>Size</th>
                                                <td>Action</td>

                                            </tr>
                                        </thead>


                                        <tbody>
                                            @foreach($adminComponents['products'] as $key=>$product)
                                            <tr>
                                                <td>{{$key + 1}}</td>
                                                <td>{{$product->name}}</td>
                                                @if($product->image == "")
                                                <td>
                                                    <img src="{{ asset('assets/myImage/santa-claus-red-sleigh-and-green-gift-boxes-16911.png') }}" alt="Product Image" width="50" height="50">
                                                </td>
                                                @else
                                                <td>   
                                                     <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" width="50" height="50">
                                                </td>
                                                @endif
                                                <td>{{$product->category}}</td>
                                                <td>{{number_format($product->buying_price,2)}}</td>
                                                <td>{{$product->number_carton}}</td>
                                                <td>{{$product->number_dozen}}</td>
                                                <td>{{$product->price_per_dozen}}</td>
                                                <td>{{$product->number_pieces}}</td>
                                                <td>{{$product->price_per_item}}</td>
                                                <td>{{$product->color}}</td>
                                                <td>{{$product->size}}</td>
                                                <td class="__web-inspector-hide-shortcut__">
                                                            <a href="javascript:void(0);" class="action-icon __web-inspector-hide-shortcut__"> <i class="mdi mdi-eye"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline edit-product-btn"
                                                            data-id ="{{$product->id}}",
                                                            data-name ="{{$product->name}}",
                                                            data-category ="{{$product->category}}",
                                                            data-buying_price ="{{$product->buying_price}}",
                                                            data-number_carton ="{{$product->number_carton}}",
                                                            data-number_pieces ="{{$product->number_pieces}}",
                                                            data-color ="{{$product->color}}",
                                                            data-size ="{{$product->size}}",
                                                            data-price_per_dozen ="{{$product->price_per_dozen}}",
                                                            data-price_per_item = "{{$product->price_per_item}}",
                                                            data-number_pieces ="{{$product->number_pieces}}"
                                                            ></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @endif
                                </div> <!-- end table-responsive-->
                            </div> <!-- end col -->
                        </div>
                        @endif


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
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Buying Price:</label>
                                    <input type="text" id="buying_price" class="form-control form-control-sm "
                                        name="buying_price">
                                    <i class="text-danger buying_price message fw-normal role font-16"></i>

                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Number of
                                        Catton:</label>
                                    <input type="number" id="number_of_catton" class="form-control form-control-sm "
                                        name="number_of_catton">
                                    <i class="text-danger number_of_catton message fw-normal role font-16"></i>

                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="example-select" class="form-label">Product Measerment:</label>
                                    <select name="measerments" class="form-select form-select-sm" id="measerments"
                                        required>
                                        <option value="" disabled selected>Select Product Measerment</option>
                                        <option value="Piecess" id="picesses">Piecess</option>
                                        <option value="Dazeen">Dazeen</option>
                                        <option value="Set">Set</option>
                                        <option value="Other">Other</option>
                                    </select>

                                    <i class="text-danger measerments message fw-normal role font-16"></i>

                                </div>



                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 "> Number of Set:</label>
                                    <input type="text" id="numset" class="form-control form-control-sm " name="numset">
                                    <i class="text-danger numset message fw-normal role font-16"></i>

                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Picess:</label>
                                    <input type="number" id="picess" class="form-control form-control-sm "
                                        name="number_of_pieces">
                                    <i class="text-danger number_of_pieces message fw-normal role font-16"></i>

                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="example-select" class="form-label">Product Classfication:</label>
                                    <select name="category" class="form-select form-select-sm" id="product-category"
                                        required>
                                        <option value="" disabled selected>Select Product Category</option>
                                        <option value="Electronics">Electronics</option>
                                        <option value="Glass">Glassware</option>
                                        <option value="Ceramics">Ceramics (Vyombo vya Udongo)</option>
                                        <option value="Plastic">Plastic</option>
                                        <option value="Metal">Metal (Chuma)</option>
                                        <option value="Bone china">Bone China (Vyombo vya Mfupa)</option>
                                        <option value="Wood">Wood</option>

                                    </select>

                                    <i class="text-danger category message fw-normal role font-16"></i>

                                </div>




                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Color:</label>
                                    <input type="text" id="color" class="form-control form-control-sm " name="color">
                                    <i class="text-danger color message fw-normal role font-16"></i>

                                </div>


                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Size:</label>
                                    <input type="text" id="size" class="form-control form-control-sm " name="size">
                                    <i class="text-danger color message fw-normal role font-16"></i>

                                </div>


                                <!-- <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Selling Price per Pice:</label>
                                    <input type="number" id="selling_price_pice" class="form-control form-control-sm " name="selling_price_pice">

                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Selling Price per Dezeen:</label>
                                    <input type="number" id="selling_price_per_dozen" class="form-control form-control-sm " name="selling_price_per_dozen">

                                </div> -->







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
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Price Per Iteams:</label>
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
                                    <input type="text" id="up_color" class="form-control form-control-sm " name="up_color">
                                    <i class="text-danger color message fw-normal role font-16"></i>

                                </div>


                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Size:</label>
                                    <input type="text" id="up_size" class="form-control form-control-sm " name="up_size">
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