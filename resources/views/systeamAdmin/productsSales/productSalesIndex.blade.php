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

    <div class="row" id="sales-product-table">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-5">
                            <a href="javascript:void(0);" class="btn btn-outline-info btn-sm  mb-2 sale-products-btn">
                                <i class="mdi mdi-plus-circle me-2 h4"></i> <span class="h5">Sale Product</span>
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



    <div class="row" id="sales-products-div">
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
                                    <select class="form-control select2 customer_id" data-toggle="select2" id="customer_id">
                                        <option>Select</option>
                                        <optgroup label="Select Castomer name">
                                        @foreach($adminComponents['customers'] as $customer)
                                            <option value="{{ $customer->id }}">{{ $customer->fullname }}</option>
                                        @endforeach

                                        </optgroup>
                                    </select>

                                    <i class="text-danger product_name message fw-normal role font-16"></i>

                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Products Name:</label>
                                    <select class="form-control select2 product_id" data-toggle="select2" id="product-name">
                                        <option>Select</option>
                                        <optgroup label="Select Products Based On it`s Name" id ="">
                                            @foreach($adminComponents['product'] as $product)
                                            <option value="{{$product->id}}" >{{$product->name}}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>

                                    <i class="text-danger product_name message fw-normal role font-16"></i>

                                </div>


                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Remain Quantity Stock   :</label>
                                     <input type="text" class="form-control form-control-sm quantityStock" id="quantityStock">

                                    <i class="text-danger product_name message fw-normal role font-16"></i>

                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Buying Price Per Piece   :</label>
                                     <input type="text" class="form-control form-control-sm" id ="buyingPrice">

                                    <i class="text-danger product_name message fw-normal role font-16"></i>

                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Customer Quantity   :</label>
                                     <input type="number" class="form-control form-control-sm" id="customer_quantity">

                                    <i class="text-danger product_name message fw-normal role font-16"></i>

                                </div>


                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Selling Price   :</label>
                                     <input type="text" class="form-control form-control-sm" id="sellingPrice">

                                    <i class="text-danger product_name message fw-normal role font-16"></i>

                                </div>
                            </div>
                            <center>
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn- h4 fw-bold text-light  w-50 " id="sell-product-button"
                                        style="background-color:teal">Sell Product`s <span
                                            class=" uil-money-insert"></span></button>
                                </div>

                            </center>

                        </form>



                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
    </div>

  
    <!-- container -->
    @include('systeamAdmin.productsSales.salesScript')
    @include('systeamAdmin.admin-templete-controller.footer')