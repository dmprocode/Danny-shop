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
                <h4 class="page-title fw-normal" id=""> Purchase Table</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row" id="parchasses-table">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-5">
                            <a href="javascript:void(0);"
                                class="btn btn-outline-info btn-sm  mb-2 make-purchases-btn"><i
                                    class="mdi mdi-plus-circle me-2 h4"></i> <span class="h5">Make Purchases </span>
                            </a>
                        </div>
                        <div class="col-sm-7 ">
                            <div class="text-sm-end">
                                <a href="{{ route('admin-dashboard')}}" class="btn btn- mb-2 me-1  text-light root-btn"
                                    style="background-color:rgb(24,4,24)"><i class="mdi mdi-arrow-left font-16"> Go
                                        Back</i></a>

                            </div>
                        </div><!-- end col-->
                        @if($adminComponents['todayParchasses']->isEmpty())
                        <i class="text-danger fw-bold">No Parchasses Records Found on This Day  </i> 
                         @endif
                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Carton</th>
                                    <th>Sales Point</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($adminComponents['todayParchasses'] as $key => $product)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $product->products->name ?? 'N/A' }}</td>
                                    <td>{{ number_format($product->buying_price, 2) }}</td>
                                    <td>{{ $product->number_picess }}</td>
                                    <td>{{ $product->number_catton }}</td>
                                    <td>{{ $product->sales_point }}</td>
                                    <td>{{ \Carbon\Carbon::parse($product->created_at)->diffForHumans() }}</td>
                                    <td>
                                        <a href="javascript:void(0);" class="action-icon"><i
                                                class="mdi mdi-eye"></i></a>
                                        <a href="javascript:void(0);" class="action-icon"><i
                                                class="mdi mdi-square-edit-outline"
                                                 id="edit-parchasses-btn"
                                                 data-id="{{$product->id}}",
                                                 data-buying_price ="{{$product->buying_price}}",
                                                 data-number_catton ="{{$product->number_catton}}",
                                                 data-sales_point="{{$product->sales_point}}"
                                                 data-name ="{{$product->products->name}}"
                                                 data-number_picess="{{$product->number_picess}}"
                                                 ></i></a>
                                        <a href="javascript:void(0);" class="action-icon"><i
                                                class="mdi mdi-delete delete-btn" data-id="{{$product->id}}"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>




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

    <div class="row" id="make-parchasses-div">
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

                        <form action="#" id="parchassesFrormData">
                            @csrf

                            <div class="row">

                                <div class="mb-3 col-md-6">
                                    <label for="example-select" class="form-label">Product Name:</label>
                                    <select class="form-control select2 product-price" data-toggle="select2"
                                        id="select-product-price" name="product_name">
                                        <option>Select</option>
                                        <optgroup label="Select Product Which you whant To Parchasses">
                                            @foreach($adminComponents['productsList'] as $product)
                                            <option value="{{$product->id}}">{{$product->name}}</option>
                                            @endforeach
                                        </optgroup>

                                    </select>

                                    <i class="text-danger product-name-MSG  message fw-normal role font-16"></i>

                                </div>



                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Buying Price:</label>
                                    <input type="text" id="parchasses-buying-price"
                                        class="form-control form-control-sm " name="buying_price"
                                        name="parchasses-buying-price">
                                    <i
                                        class="text-danger parchasses-buying-priceMSG message fw-normal role font-16"></i>

                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Number of
                                        Catton:</label>
                                    <input type="number" id="parchasses_number_of_catton"
                                        class="form-control form-control-sm " name="number_of_catton">
                                    <i class="text-danger number_of_catton message fw-normal role font-16"></i>

                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Picess:</label>
                                    <input type="number" id="parchasses-picess" class="form-control form-control-sm"
                                        name="number_of_pieces">
                                    <i class="text-danger number_of_pieces message fw-normal role font-16"></i>

                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="example-select" class="form-label">Product Classfication:</label>
                                    <select name="category" class="form-select form-select-sm" name="product_category"
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
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Sale Point:</label>
                                    <input type="text" id="size" class="form-control form-control-sm "
                                        name="salesPoint">
                                    <i class="text-danger color message fw-normal sale-point font-16"></i>

                                </div>

                            </div>
                            <center>
                                <div class="d-flex justify-content-center my-4">
                                    <button class="btn btn-lg fw-bold text-light shadow-lg px-5 py-3 rounded-pill"
                                        id="parchasses-products-btn"
                                        style="background: linear-gradient(to right, #008080, #20b2aa); border: none;">
                                        <i class="uil uil-shopping-cart-alt me-2"></i> Purchase Product`s
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
    <!--  ======================Update Parchasses============ -->
    <div class="row" id="update-parchasses-div">
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

                        <form action="#" id="upParchasses-data">
                            @csrf
                             <input type="hidden" id="up_id">
                            <div class="row">

                                <div class="mb-3 col-md-6">
                                    <label for="example-select" class="form-label">Product Name:</label>
                                    <input type="text" class="form-control form-control-sm"  id="products-name" name="product_name"/>
                                    <i class="text-danger product-name-MSG  message fw-normal role font-16"></i>

                                </div>



                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Buying Price:</label>
                                    <input type="text" id="up_buying_price"
                                        class="form-control form-control-sm " id="" name="parchasses-buying-price">
                                    <i
                                        class="text-danger parchasses-buying-priceMSG message fw-normal role font-16"></i>

                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Number of
                                        Catton:</label>
                                    <input type="number" id="up_catton"
                                        class="form-control form-control-sm">
                                    <i class="text-danger number_of_catton message fw-normal role font-16"></i>

                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Picess:</label>
                                    <input type="number" id="parchasses_picess" class="form-control form-control-sm"
                                        name="number_of_pieces">
                                    <i class="text-danger number_of_pieces message fw-normal role font-16"></i>

                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="example-select" class="form-label">Product Classfication:</label>
                                    <select name="category" class="form-select form-select-sm" name="product_category" id="product_category"
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
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Sale Point:</label>
                                    <input type="text" id="salePoint" class="form-control form-control-sm "
                                        name="salesPoint">
                                    <i class="text-danger color message fw-normal sale-point font-16"></i>

                                </div>

                            </div>
                            <center>
                                <div class="d-flex justify-content-center my-4">
                                    <button class="btn btn-lg fw-bold text-light shadow-lg px-5 py-3 rounded-pill"
                                        id="update-parchasses-btn"
                                        style="background: linear-gradient(to right, #008080, #20b2aa); border: none;">
                                        <i class="uil uil-shopping-cart-alt me-2"></i> Update Purchase Product`s
                                        <span class="uil uil-pen ms-2"></span>
                                    </button>
                                </div>
                            </center>


                        </form>



                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
    </div>


    <!-- container -->
    @include('systeamAdmin.parchasess.parchassesScript')
    @include('systeamAdmin.admin-templete-controller.footer')