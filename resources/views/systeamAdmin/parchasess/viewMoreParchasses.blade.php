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
                    <div class="col-sm-5 w-25">
                        <a href="http://127.0.0.1:8000/admin/parchassesIndex" class="btn btn-info rounded-pill mb-2 d-flex align-items-center justify-content-center" style="font-size: 15px; padding: 6px 16px;">
                            <i class="mdi mdi-arrow-left-bold-circle-outline me-2" style="font-size: 18px;"></i> 
                            <span class="fw-semibold">Go Back</span>
                        </a>
                    </div>


                        @if($adminComponents['parchassesWithProduct']->isEmpty())
                        <i class="text-danger fw-bold">No Parchasses Record Available</i>
                        @else
                       
                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Carton</th>
                                    <th>Picess</th>
                                    <th>Sales Point</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            

                            <tbody>
                                @foreach($adminComponents['parchassesWithProduct'] as $key=>$parchassess)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$parchassess->products->name}}</td>
                                    <td>{{number_format($parchassess->buying_price,2)}}</td>
                                    <td>{{$parchassess->number_catton}}</td>
                                    <td>{{$parchassess->number_picess}}</td>
                                    <td>{{$parchassess->sales_point}}</td>
                                    <td>{{\Carbon\carbon::parse($parchassess->created_at)->format('M-j-Y')}}</td>
                                    <td><span class="dtr-data">
                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a></span></td>

                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end mb-3">
                            <div class="w-25">
                                <a href="#" 
                                    class="btn btn-outline-primary rounded-pill shadow-sm d-flex align-items-center justify-content-center" 
                                    style="font-size: 14px; padding: 8px 20px; transition: 0.3s all;">
                                    
                                    <i class="mdi mdi-format-list-bulleted-type me-2" style="font-size: 20px;"></i> 
                                    <span class="fw-bold">Total : {{number_format($adminComponents['viewMoreParchasses'],2)}} /=</span>
                                </a>
                            </div>
                        </div>

                        @endif

                        



                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
    </div>
    <!-- container -->
    @include('systeamAdmin.parchasess.parchassesScript')
    @include('systeamAdmin.admin-templete-controller.footer')