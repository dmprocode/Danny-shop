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
                            <a href="javascript:void(0);" class="btn btn-outline-info btn-sm  mb-2 add-product-store"><i
                                    class="mdi mdi-plus-circle me-2 h4 "></i> <span class="h5">Add Products
                                    Store`s</span> </a>
                        </div>
                        <div class="col-sm-7 ">
                            <div class="text-sm-end">
                                <a href="#" class="btn btn- mb-2 me-1  text-light root-btn"
                                    style="background-color:rgb(24,4,24)"><i class="mdi mdi-arrow-left font-16"> Go
                                        Back</i></a>

                            </div>
                        </div><!-- end col-->

                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">

                                    <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Product Name</th>
                                                <th>Number Of Cartons</th>
                                                <th>Price</th>
                                                <th>Date</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>


                                        <tbody>
                                            @foreach($adminComponents['product_store'] as $key=>$store)

                                            <tr>
                                                <td>{{$key + 1}}</td>
                                                <td>{{$store->product->name}}</td>
                                                <td>{{$store->number_of_cartons}}</td>
                                                <td>{{number_format($store->product->buying_price,2)}}</td>
                                                <td>{{ $store->created_at->format('l, d F Y') }}</td>
                                                <td class="table-action" style="display: none;">
                                                    <a href="javascript:void(0);" class="action-icon"> <i
                                                            class="mdi mdi-square-edit-outline product-edit-store-btn"
                                                            data-name="{{$store->product->name}}" ,
                                                            data-number_of_cartons="{{$store->number_of_cartons}}"
                                                            data-product_id="{{$store->product_id}}" ,
                                                            data-id="{{$store->id}}" ,></i></a>
                                                    <a href="javascript:void(0);" class="action-icon"> <i
                                                            class="mdi mdi-delete delete-product-store"
                                                            data-id="{{$store->id}}"></i></a>

                                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-cart-remove de-stock-btn"
                                                    data-id="{{$store->id}}"
                                                    data-number_of_cartons= "{{$store->number_of_cartons}}"
                                                    data-name= "{{$store->product->name}}">
                                                </i>
</a>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div> <!-- end table-responsive-->
                            </div> <!-- end col -->
                        </div>
                        <div class="d-flex justify-content-end gap-3 my-3">
                            <!-- Total Product Card -->
                            <div class="card border-0 shadow-sm bg-primary text-white" style="width: 180px;">
                                <div class="card-body p-3">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-white bg-opacity-25 p-2 rounded-circle me-3">
                                            <i class="mdi mdi-package-variant fs-4 text-white"></i>
                                        </div>
                                        <div>
                                            <small class="text-white text-opacity-75">Total Products</small>
                                            <h4 class="mb-0 fw-bold">{{number_format($adminComponents['number_product_store'])}}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Amount Card -->
                            <div class="card border-0 shadow-sm bg-success text-white" style="width: 180px;">
                                <div class="card-body p-3">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-white bg-opacity-25 p-2 rounded-circle me-3">
                                            <i class="mdi mdi-cash-multiple fs-4 text-white"></i>
                                        </div>
                                        <div>
                                            <small class="text-white text-opacity-75">Total Amount</small>
                                             <h55 class="mb-0 fw-bold">{{number_format($adminComponents['total_value'])}} /= </h55>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-end">
                            <a href="javascript:window.print()" class="btn btn-primary"><i class="mdi mdi-printer"></i>
                                Print</a>
                            <a href="javascript: void(0);" class="btn btn-info">Submit</a>
                        </div>


                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
    </div>

    <!-- ==============================Add Product Store=================== -->

    <div class="row" id="product-store-form">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-5">
                            <a href="javascript:void(0);" class="btn btn-outline-info btn-sm  mb-2 add-products-btn"><i
                                    class="mdi mdi-plus-circle me-2 h4"></i> <span class="h5">Add Product Store </span>
                            </a>
                        </div>
                        <div class="col-sm-7 ">
                            <div class="text-sm-end">
                                <a href="#" class="btn btn- mb-2 me-1  text-light root-btn"
                                    style="background-color:rgb(24,4,24)"><i class="mdi mdi-arrow-left font-16"> Go
                                        Back</i></a>

                            </div>
                        </div><!-- end col-->

                        <div class="row">
                            <div class="col-12">
                                <form action="#" id="productsFormData">
                                    @csrf

                                    <div class="row">

                                        <div class="mb-3 col-md-6">
                                            <label for="simpleinput" class="form-label fw-normal fs-16 "> Product
                                                Name:</label>

                                            <select class="form-control select2" data-toggle="select2" id="product_id">
                                                <option value="" disabled selected>Select Product Name</option>

                                                <optgroup label="Available Products">
                                                    @foreach($adminComponents['product'] as $product)
                                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                                    @endforeach
                                                </optgroup>
                                            </select>

                                            <i class="text-danger product_name  message fw-normal role font-16"></i>

                                        </div>



                                        <div class="mb-3 col-md-6">
                                            <label for="simpleinput" class="form-label fw-normal fs-16 "> Number of
                                                Ctn:</label>
                                            <input type="number" class="form-control form-control-sm " name="numset"
                                                id="numberOfCtn">
                                            <i class="text-danger number-ctn  message fw-normal role font-16"></i>

                                        </div>
                                    </div>
                                    <center>
                                        <div class="d-flex justify-content-center">
                                            <button class="btn btn- h4 fw-bold text-light  w-50 " id="addProductsstore"
                                                style="background-color:teal">Add Product Store <span
                                                    class="uil-plus"></span></button>
                                        </div>

                                    </center>

                                </form>

                            </div> <!-- end col -->
                        </div>
                        <div class="d-flex justify-content-end gap-3 my-3">
                            <div class="p-3 bg-gradient bg-info text-white rounded shadow-sm">
                                <h5 class="mb-0">
                                    <i class="mdi mdi-cash-multiple me-2"></i>
                                    <strong>Total Capital :</strong>
                                </h5>
                            </div>

                        </div>

                        <div class="text-end">
                            <a href="javascript:window.print()" class="btn btn-primary"><i class="mdi mdi-printer"></i>
                                Print</a>
                            <a href="javascript: void(0);" class="btn btn-info">Submit</a>
                        </div>


                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
    </div>

    <!----------------------update product div------------------>

    <div class="row" id="update-product-div">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-5">
                            <a href="javascript:void(0);" class="btn btn-outline-info btn-sm  mb-2 add-products-btn"><i
                                    class="mdi mdi-plus-circle me-2 h4"></i> <span class="h5">Add Product Store </span>
                            </a>
                        </div>
                        <div class="col-sm-7 ">
                            <div class="text-sm-end">
                                <a href="#" class="btn btn- mb-2 me-1  text-light root-btn"
                                    style="background-color:rgb(24,4,24)"><i class="mdi mdi-arrow-left font-16"> Go
                                        Back</i></a>

                            </div>
                        </div><!-- end col-->

                        <div class="row">
                            <div class="col-12">
                                <form action="#" id="productsFormData">
                                    @csrf

                                    <div class="row">
                                        <input type="hidden" class="id" id="product-id">

                                        <div class="mb-3 col-md-6">
                                            <label for="simpleinput" class="form-label fw-normal fs-16 "> Product
                                                Name:</label>

                                            <input type="text" class="form-control form-control-sm product-name"
                                                name="numset" id="">


                                        </div>



                                        <div class="mb-3 col-md-6">
                                            <label for="simpleinput" class="form-label fw-normal fs-16 "> Number of
                                                Ctn:</label>
                                            <input type="text" class="form-control form-control-sm number-cattons"
                                                name="numset" id="">

                                        </div>
                                    </div>
                                    <center>
                                        <div class="d-flex justify-content-center">
                                            <button class="btn btn- h4 fw-bold text-light  w-50 "
                                                id="edit-product-store" style="background-color:teal">Update Product
                                                <span class="uil-plus"></span></button>
                                        </div>

                                    </center>

                                </form>

                            </div> <!-- end col -->
                        </div>





                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
    </div>

<!-- ===========================De stock Product from the store============== -->

 <div class="row" id="destock-product-div">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-5">
                            <a href="javascript:void(0);" class="btn btn-outline-info btn-sm  mb-2 add-products-btn"><i
                                    class="mdi mdi-plus-circle me-2 h4"></i> <span class="h5">Add Product Store </span>
                            </a>
                        </div>
                        <div class="col-sm-7 ">
                            <div class="text-sm-end">
                                <a href="#" class="btn btn- mb-2 me-1  text-light root-btn"
                                    style="background-color:rgb(24,4,24)"><i class="mdi mdi-arrow-left font-16"> Go
                                        Back</i></a>

                            </div>
                        </div><!-- end col-->

                        <div class="row">
                            <div class="col-12">
                                <form action="#" id="productsFormData">
                                    @csrf

                                    <div class="row">
                                        <input type="hidden" class="product-id">
                                        <div class="mb-3 col-md-6">
                                            <label for="simpleinput" class="form-label fw-normal fs-16 "> Product
                                                Name:</label>

                                            <input type="text" class="form-control form-control-sm "
                                                name="numset" id="name" disabled="true">


                                        </div>



                                        <div class="mb-3 col-md-6">
                                            <label for="simpleinput" class="form-label fw-normal fs-16 "> Number of
                                                Ctn:</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="numset" id="number_of_cartons">
                                                <small class="text-danger fw-bold message" id="errorMSG"></small>

                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center my-3">
                                        <button class="btn btn-danger rounded-pill px-5 py-3 shadow-lg d-flex align-items-center justify-content-center gap-3" 
                                                id="edit-product-store">
                                            <i class="mdi mdi-cart-remove fs-4"></i>
                                            <span class="fw-bold fs-5 de-stock-store-btn">De-Stock Product</span>
                                            <i class="mdi mdi-arrow-down fs-4"></i>
                                        </button>
                                    </div>
                                </form>

                            </div> <!-- end col -->
                        </div>





                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
    </div>


</div>
<!-- container -->
@include('systeamAdmin.products.productStoreIndexScript')
@include('systeamAdmin.admin-templete-controller.footer')