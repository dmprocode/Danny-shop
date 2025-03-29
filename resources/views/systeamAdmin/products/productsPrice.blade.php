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
                        @if($adminComponents['productPrice']->isEmpty())
                        <i class="text-danger fw-bold">No Products Available</i>
                        @else

                        <div class="row">
                            <div class="col-12">
                                <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Products Name</th>
                                            <th>Buying Price</th>
                                            <th>No Pcs</th>
                                            <th> Price per (Pcs)</th>
                                            <th> Price Per (Dzn)</th>
                                            <th>Seeling Price Per (Dzn)</th>
                                            <th>Selling Price (Pcs)</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        @foreach($adminComponents['productPrice'] as $key=>$price)
                                        <tr>
                                            <td>{{$key + 1}}</td>
                                            <td>{{$price->name}} </td>
                                            <td>{{$price->buying_price}}</td>
                                            @if($price->number_pieces == '')
                                            <td class="text-danger fw-bold">No Value</td>
                                            @else
                                            <td>{{$price->number_pieces}}</td>
                                            @endif
                                            <td>{{number_format($price->price_per_item,2)}}</td>
                                            @if($price->price_per_dozen == 0)
                                            <td class="text-danger fw-bold">No Value</td>
                                            @else
                                            <td>{{number_format($price->price_per_dozen),2}}</td>
                                            @endif
                                            @if($price->selling_price_per_dozen == "")
                                            <td>No Value</td>
                                            @else
                                            <td>{{number_format($price->selling_price_per_dozen),2}}</td>
                                            @endif
                                            @if($price->selling_price_per_piece == '')
                                            <td class="text-danger">No Value</td>
                                            @else
                                            <td>{{number_format($price->selling_price_per_piece),2}}</td>
                                            @endif
                                            <td>
                                                <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>

                            </div>
                        </div>
                        @endif



                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
    </div>







    @include('systeamAdmin.products.productScriptPrice')
    @include('systeamAdmin.admin-templete-controller.footer')