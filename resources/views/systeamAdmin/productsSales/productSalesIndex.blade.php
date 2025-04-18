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
                                    <th>Product </th>
                                    <th>Price</th>
                                    <th>Selling Price</th>
                                    <th>Total </th>
                                    <th>Profit</th>
                                    <th>Customer </th>
                                    <th>Piece</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php $row = 1; @endphp
                                @foreach($adminComponents['productsSales'] as $user)
                                @foreach($user->products as $productsale)
                                <tr>
                                    <td>{{ $row++ }}</td>
                                    <td>{{ $productsale->name }}</td>
                                    <td>{{ number_format($productsale->price_per_item, 2) }}</td>
                                    <td>{{ number_format($productsale->pivot->selling_price, 2) }}</td>
                                    <td>{{number_format($productsale->pivot->pieceSellingPrice ,2)}}</td>
                                    <td>{{ number_format($productsale->pivot->product_profit, 2) }}</td>
                                    <td>{{ $user->fullname }}</td>
                                    <td>{{$productsale->pivot->product_quantity}}</td>

                                    <td>
                                        <a href="javascript:void(0);" class="action-icon"> <i
                                                class="mdi mdi-eye"></i></a>
                                        <a href="javascript:void(0);" class="action-icon"> <i
                                                class="mdi mdi-square-edit-outline" id="edit-product-sell"
                                                data-id="{{$user->id}}" 
                                                data-fullname="{{$user->fullname}}"
                                                data-name="{{$productsale->name}}"
                                                data-price_per_item="{{$productsale->price_per_item}}"
                                                data-selling_price="{{$productsale->pivot->selling_price}}"
                                                data-product_quantity =" {{$productsale->product_quantity}}"
                                                
                                                ></i></a>
                                        <a href="javascript:void(0);" class="action-icon"> <i
                                                class="mdi mdi-delete" id="delete_products_sell" 
                                                data-id="{{$productsale->id}}"
                                                data-user="{{$user->id}}"
                                                
                                                ></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                @endforeach
                                
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end gap-3 my-3">
                            <div class="p-3 bg-gradient bg-info text-white rounded shadow-sm">
                                <h5 class="mb-0">
                                    <i class="mdi mdi-cash-multiple me-2"></i>
                                    <strong>Today’s Sales:</strong> {{ number_format($adminComponents['todaySelling'],
                                    2) }}
                                </h5>
                            </div>
                            <div class="p-3 bg-gradient bg-danger text-white rounded shadow-sm">
                                <h5 class="mb-0">
                                    <i class="mdi mdi-trending-up me-2"></i>
                                    <strong>Today’s Profit:</strong> {{ number_format($adminComponents['todayProfit'],
                                    2) }}
                                </h5>
                            </div>
                        </div>
                        <div class="text-end">
                            <a href="javascript:window.print()" class="btn btn-primary"><i class="mdi mdi-printer"></i>
                                Print</a>
                            <a href="javascript: void(0);" class="btn btn-info">Submit</a>
                        </div>

                        <div class="watermark-print"> CSD - Management Information Systems (MIS) </div>

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
                                    <select class="form-control select2 customer_id" data-toggle="select2"
                                        id="customer_id">
                                        <option>Select</option>
                                        <optgroup label="Select Castomer name">
                                            @foreach($adminComponents['customers'] as $customer)
                                            <option value="{{ $customer->id }}">{{ $customer->fullname }}</option>
                                            @endforeach

                                        </optgroup>
                                    </select>

                                    <i class="text-danger customer_name message fw-normal role font-16"></i>

                                </div>
                                <!-- Single Select -->
                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 product_id">Products
                                        Name:</label>
                                    <select class="form-control select2" data-toggle="select2" id="product-name">
                                        <option>Select</option>
                                        <optgroup label="Select Products Based On it`s Name" id="">
                                            @foreach($adminComponents['product'] as $product)
                                            <option value="{{$product->id}}">{{$product->name}}</option>
                                            @endforeach
                                        </optgroup>

                                    </select>
                                </div>



                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Remain Quantity Stock
                                        :</label>
                                    <input type="text" class="form-control form-control-sm quantityStock"
                                        id="quantityStock">

                                    <i class="text-danger product_name message fw-normal role font-16"></i>

                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Buying Price Per Piece
                                        :</label>
                                    <input type="text" class="form-control form-control-sm" id="buyingPrice">


                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Customer Quantity
                                        :</label>
                                    <input type="number" class="form-control form-control-sm" id="customer_quantity">

                                    <i class="text-danger customer_quantity message fw-normal role font-16"></i>

                                </div>


                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Selling Price :</label>
                                    <input type="text" class="form-control form-control-sm" id="sellingPrice">

                                    <i class="text-danger sellingprice message fw-normal role font-16"></i>

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


    <!-- ======================Update Products Sales=================== -->


    <div class="row" id="Update-products-sales">
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
                                <input type="hidden" id="up_id">
                                <input type="hidden" id="product_id">
                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Customer Name:</label>
                                    <input type="text" class="form-control   form-control-sm" id ="customert_name">

                                    </select>

                                    <i class="text-danger customer_name message fw-normal role font-16"></i>

                                </div>
                                <!-- <div class="mb-3 col-md-6">
                                    <label for="product-name" class="form-label fw-normal fs-16">Product Name:</label>
                                    <select class="form-control select2 product_id" id="product_name" data-toggle="select2">
                                        <option value="">Select</option>
                                        <optgroup label="Select Products Based On Name">
                                            @foreach($adminComponents['product'] as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>

                                    <small class="text-danger product_name message fw-normal role font-16"></small>
                                </div> -->

                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Buying Price Per Piece
                                        :</label>
                                    <input type="text" class="form-control form-control-sm" id="up_buyingPrice">


                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Customer Quantity
                                        :</label>
                                    <input type="text" class="form-control form-control-sm up_customer_quantity" id="up_productQuantity">

                                    <i class="text-danger customer_quantity message fw-normal role font-16"></i>

                                </div>


                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Selling Price :</label>
                                    <input type="text" class="form-control form-control-sm" id="up_sellingPrice">

                                    <i class="text-danger sellingprice message fw-normal role font-16"></i>

                                </div>
                            </div>
                            <center>
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn- h4 fw-bold text-light  w-50 " id="update-product-sell"
                                        style="background-color:teal">Update Product`s <span
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