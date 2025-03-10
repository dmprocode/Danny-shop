@include('products.products-templete-controller.header')
@include('products.products-templete-controller.sidenave')
@include('products.products-templete-controller.topnav')


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
                <h4 class="page-title fw-normal">Dashboard</h4>
            </div>
        </div>
        @if(session('message'))
        <span class="text-danger">{{session('message')}}</span>
        @endif
    </div>



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
                   
                    <!-- end row -->

            

                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>products Name</th>
                                            <th>Buying Price</th>
                                            <th>Quantity</th>
                                            <th>Selling price</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($adminComponents['products'] as $product)
                                        <tr>
                                            <td>{{$product->id}}</td>
                                            <td>{{$product->productname}}</td>
                                            @if($product->buying_price == '')
                                            <td><i class="text-danger">No Value</i></td>
                                            @else
                                            <td>{{number_format($product->buying_price)}}</td>

                                            @endif
                                            <td>{{$product->quantity}}</td>
                                            @if($product->selling_price == '')
                                            <td><i class="text-danger">No Value</i></td>
                                            @else
                                            <td>{{number_format($product->selling_price)}}</td>
                                            @endif
                                        </tr>
                                        @endforeach
                                        

                                    </tbody>
                                </table>
                            </div> <!-- end table-responsive-->
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="clearfix pt-3 d-none">
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
                                <p><b>Total Bbuying Price:</b> <span class="float-end">{{number_format($adminComponents['buyingPrice'],2)}}</span></p>
                               
                            </div>
                            <div class="clearfix"></div>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row-->

                    <div class="d-print-none mt-4">
                        <div class="text-end">
                            <a href="javascript:window.print()" class="btn btn-primary"><i class="mdi mdi-printer"></i>
                                Print</a>
                            <a href="javascript: void(0);" class="btn btn-info">Submit</a>
                        </div>
                    </div>
                    <!-- end buttons -->

                </div> <!-- end card-body-->
            </div> <!-- end card -->
        </div> <!-- end col-->
    </div>
    <!-- end page title -->



    <div class="row" id="user-form">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-5">
                            <a href="javascript:void(0);" class="btn btn-outline-danger go-back-btn  mb-2"><i
                                    class=" uil-entry me-2 h4"></i> <span class="h4">Go Back</span> </a>
                        </div>
                        <div class="col-sm-7">
                            <div class="text-sm-end d-none">
                                <button type="button" class="btn btn-success mb-2 me-1"><i
                                        class="mdi mdi-cog-outline"></i></button>
                                <button type="button" class="btn btn-light mb-2 me-1">Import</button>
                                <button type="button" class="btn btn-light mb-2">Export</button>
                            </div>
                        </div><!-- end col-->
                    </div>
                    <form action="{{ route('add-products') }}" method="POST" id="userFormData">


                        @csrf

                        <div class="row">

                            <div class="mb-3 col-md-6">
                                <label for="simpleinput" class="form-label fw-normal fs-16 ">Product name:</label>
                                <input type="text" id="simpleinput" class="form-control form-control-sm "
                                    name="productname">
                                <i class="text-danger message fullname font-16"></i>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="example-email" class="form-label">Quantity:</label>
                                <input type="text" id="example-email" class="form-control form-control-sm"
                                    name="quanity">
                                <i class="text-danger message email font-16"></i>

                            </div>


                            <div class="mb-3 col-md-6">
                                <label for="example-email" class="form-label">Buying Price:</label>
                                <input type="number" id="example-email" class="form-control form-control-sm"
                                    name="buyingPrice">
                                <i class="text-danger message email font-16"></i>

                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="example-email" class="form-label">Selling Price:</label>
                                <input type="number" id="example-email" class="form-control form-control-sm"
                                    name="sellingprice">
                                <i class="text-danger message email font-16"></i>

                            </div>

                        </div>
                        <center>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn- h4 fw-bold text-light add-user-btn w-50 "
                                    style="background-color:teal">Add User <span class="uil-plus"></span></button>
                            </div>

                        </center>

                    </form>


                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>

    <!-- container -->
    @include('products.productsIndex.productscript')
    @include('products.products-templete-controller.footer')