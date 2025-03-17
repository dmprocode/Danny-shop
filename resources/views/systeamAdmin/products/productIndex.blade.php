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
                        @if($adminComponents['products']->isEmpty())
                        <i class="text-danger fw-bold h4">No Products Available</i>
                        @else
                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Catton</th>
                                    <th>Picess</th>
                                    <th>Set</th>
                                    <th>Price Per Iteams</th>
                                    <th>Seeling Price per Iteams</th>
                                    <th> Category</th>
                                    <th>Color</th>
                                    <th>Action</th>

                                </tr>
                            </thead>


                            <tbody>
                                @foreach($adminComponents['products'] as $key=>$product)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{number_format($product->price,2)}}</td>
                                    <td>{{$product->number_catton}}</td>
                                    @if($product->number_catton == '')
                                    <td class="text-danger">No Value</td>
                                    @endif
                                    <td>{{$product->number_of_pieces}}</td>
                                    @if($product->set == '')
                                    <td class="text-danger">No Value</td>
                                    @else
                                    <td>{{$product->set}}</td>
                                    @endif
                                    @if($product->price_per_item == '')
                                    <td class="text-danger">No Value</td>
                                    @else
                                    <td>{{$product->price_per_item}}</td>
                                    @endif
                                    @if($product->selling_price_per_item == '')
                                       <td class="text-danger">No Value</td>
                                    @else
                                    <td>{{$product->selling_price_per_item}}</td>
                                    @endif
                                    <td>{{$product->category}}</td>
                                    <td>{{$product->color}}</td>
                                    <td>
                                      <span class="dtr-data"><a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a></span>
                                    </td>
                               </tr>
                               @endforeach
                            </tbody>
                        </table>
                        @endif


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
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Buying Price:</label>
                                    <input type="text" id="buying_price" class="form-control form-control-sm "
                                        name="buying_price">
                                    <i class="text-danger buying_price message fw-normal role font-16"></i>

                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Number of Catton:</label>
                                    <input type="number" id="number_of_catton" class="form-control form-control-sm "
                                        name="number_of_catton">
                                    <i class="text-danger number_of_catton message fw-normal role font-16"></i>

                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Number of  Set:</label>
                                    <input type="number" id="number_of_set" class="form-control form-control-sm "
                                        name="number_of_set">
                                    <i class="text-danger number_of_set message fw-normal role font-16"></i>

                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Picess:</label>
                                    <input type="number" id="picess" class="form-control form-control-sm "
                                        name="number_of_pieces">
                                    <i class="text-danger number_of_pieces message fw-normal role font-16"></i>

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

                                    <i class="text-danger category message fw-normal role font-16"></i>

                                </div>

                                


                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Color:</label>
                                    <input type="text" id="color" class="form-control form-control-sm "
                                        name="color">
                                    <i class="text-danger color message fw-normal role font-16"></i>

                                </div>


                                <div class="mb-3 col-md-6">
                                    <label for="simpleinput" class="form-label fw-normal fs-16 ">Size:</label>
                                    <input type="number" id="size" class="form-control form-control-sm "
                                        name="size">
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