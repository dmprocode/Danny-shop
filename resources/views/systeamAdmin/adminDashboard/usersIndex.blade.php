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
                <h4 class="page-title fw-normal">Add User`s</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <!-- User Table -->


    <div class="row" id="user-table">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-5">
                            <a href="javascript:void(0);" class="btn btn-outline-info btn-sm mb-2 add-user"><i
                                    class="mdi mdi-plus-circle me-2 h4"></i> <span class="h5">Add User`s</span> </a>
                        </div>
                        <div class="col-sm-7 ">
                            <div class="text-sm-end">
                                <a href="{{ route('admin-dashboard')}}" class="btn btn- mb-2 me-1  text-light root-btn"
                                    style="background-color:rgb(24,4,24)"><i class="mdi mdi-arrow-left font-16"> Go
                                        Back</i></a>

                            </div>
                        </div><!-- end col-->
                        @if($userTable['users']->isEmpty())
                        <i class="text-danger font-16">No User Available</i>
                        @else
                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th class="f-13 text-info ">ID</th>
                                    <th class="f-13 text-info ">Name</th>
                                    <th class="f-13 text-info ">Email</th>
                                    <th class="f-13 text-info ">Date of Birth</th>
                                    <th class="f-13 text-info ">Age</th>
                                    <th class="f-13 text-info ">User role</th>
                                    <th class="f-13 text-info ">Address</th>
                                    <th class="f-13 text-info ">Gender</th>
                                    <th class="f-13 text-info ">Action</th>



                                </tr>
                            </thead>


                            <tbody>
                                @foreach($userTable['users'] as $key=>$user)
                                <tr>
                                    <td class="font-13">{{$key + 1}}</td>
                                        @if(empty($user->userImage))
                                            @if($user->gender == 'male')
                                            <td>Male icon</td>
                                            @else
                                            <td>
                                                Female icon
                                            </td>
                                        @endif
                                    @else
                                    <td class="font-13">
                                        <img src="{{ asset('storage/' . $user->userImage) }}" alt="User Image"
                                            class="rounded-circle border shadow-sm" width="40" height="40">
                                        {{ $user->fullname }}
                                    </td>
                                    @endif
                                    <td class="font-13">{{$user->email}}</td>
                                    <td class="font-13">{{\Carbon\Carbon::parse($user->age)->format('M-j-Y')}}</td>
                                    <td class="font-13">{{\Carbon\Carbon::parse($user->dob)->age }}</td>
                                    <td class="font-13">{{$user->userRole}}</td>
                                    <td class="font-13">{{$user->address}}</td>
                                    <td class="font-13">{{$user->gender}}</td>
                                    <td>
                                        <a href="javascript:void(0);"> <i class="mdi mdi-eye text-secondary"></i></a>
                                        <a href="javascript:void(0);"> <i class="mdi mdi-square-edit-outline text-secondary edit-user"
                                         data-id="{{$user->id}}"
                                         data-email="{{$user->email}}"
                                         data-dob="{{$user->dob}}"
                                         data-user-role  ="{{$user->userRole}}"
                                         data-address="{{$user->address}}"
                                         data-gender="{{$user->gender}}"
                                         data-fullname="{{$user->fullname}}"


                                         ></i></a>
                                        <a href="javascript:void(0);"> <i class="mdi mdi-delete text-secondary"></i></a>
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

    <!-- End of user Table -->

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
                    <form action="#" id="userFormData">
                        @csrf

                        <div class="row">

                            <div class="mb-3 col-md-6">
                                <label for="simpleinput" class="form-label fw-normal fs-16 ">Full Name:</label>
                                <input type="text" id="simpleinput" class="form-control form-control-sm "
                                    placeholder=" John Doe" name="fullname">
                                <i class="text-danger message fullname font-16"></i>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="example-email" class="form-label">Email:</label>
                                <input type="email" id="example-email" class="form-control form-control-sm"
                                    placeholder="johndoe@gmail.com" name="email">
                                <i class="text-danger message email font-16"></i>

                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="password" class="form-label">User Password:</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control form-control-sm"
                                        placeholder="Enter your password" name="password">
                                    <div class="input-group-text" data-password="false">
                                        <span class="password-eye"></span>
                                    </div>
                                </div>
                                <i class="text-danger message password font-16"></i>

                            </div>

                            <div class="mb-3 col-md-6 position-relative" id="datepicker4">
                                <label class="form-label">Date of Birth:</label>
                                <input type="text" class="form-control form-control-sm" data-provide="datepicker"
                                    data-date-autoclose="true" data-date-container="#datepicker4"
                                    data-date-format="d-M-yyyy" placeholder="Day-Mouth-Year" name="dob">
                                <i class="text-danger dob message role font-16"></i>

                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="example-select" class="form-label">User Role:</label>
                                <select class="form-select" id="example-select" name="userRole">
                                    <option>Select</option>
                                    <option value="admin">Admin</option>
                                    <option value="shopkeeper">Shopkeeper</option>
                                    <option value="customer">Customer</option>

                                </select>
                                <i class="text-danger userRole message role font-16"></i>

                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="simpleinput" class="form-label ">Address:</label>
                                <input type="text" id="simpleinput" class="form-control form-control-sm"
                                    placeholder="ex Morogoro" name="address">
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="example-select" class="form-label">Select Gender:</label>
                                <select class="form-select" id="example-select" name="gender">
                                    <option>Select</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>

                                </select>
                                <i class="text-danger message gender font-16"></i>

                            </div>



                            <div class="mb-3 col-md-6">
                                <label for="simpleinput" class="form-label ">User Image:</label>
                                <input type="file" id="simpleinput" class="form-control form-control-sm"
                                    name="userImage">
                                <i class="text-danger message userImage font-16 "></i>

                            </div>

                        </div>
                        <center>
                            <div class="d-flex justify-content-center">
                                <button class="btn btn- h4 fw-bold text-light add-user-btn w-50 "
                                    style="background-color:teal">Add User <span class="uil-plus"></span></button>
                            </div>

                        </center>

                    </form>


                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>


    <div class="row" id="update-user-form">
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
                    <form action="#" id="userFormData">
                        @csrf
                        <input type="text" id="up_id">

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="simpleinput" class="form-label fw-normal fs-16 ">Full Name:</label>
                                <input type="text" id="fullname" class="form-control form-control-sm "
                                    placeholder=" John Doe" name="fullname">
                                <i class="text-danger message fullname font-16"></i>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="example-email" class="form-label">Email:</label>
                                <input type="email" id="user-email" class="form-control form-control-sm"
                                    placeholder="johndoe@gmail.com" name="email">
                                <i class="text-danger message email font-16"></i>

                            </div>

                            

                            <div class="mb-3 col-md-6 position-relative" id="datepicker4">
                                <label class="form-label">Date of Birth:</label>
                                <input type="text" class="form-control form-control-sm" data-provide="datepicker"
                                    data-date-autoclose="true" data-date-container="#datepicker4"
                                    data-date-format="d-M-yyyy" placeholder="Day-Mouth-Year" name="dob" id="dob">
                                <i class="text-danger dob message role font-16"></i>

                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="example-select" class="form-label">User Role:</label>
                                <select class="form-select" id="user-role" name="userRole">
                                    <option>Select</option>
                                    <option value="admin">Admin</option>
                                    <option value="shopkeeper">Shopkeeper</option>
                                    <option value="customer">Customer</option>

                                </select>
                                <i class="text-danger userRole message role font-16"></i>

                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="simpleinput" class="form-label ">Address:</label>
                                <input type="text" id="address" class="form-control form-control-sm"
                                    placeholder="ex Morogoro" name="address">
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="example-select" class="form-label">Select Gender:</label>
                                <select class="form-select gender" id=""  name="gender">
                                    <option>Select</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>

                                </select>
                                <i class="text-danger message gender font-16"></i>

                            </div>
                        </div>
                        <center>
                            <div class="d-flex justify-content-center">
                                <button class="btn btn- h4 fw-bold text-light update-user-btn w-50 "
                                    style="background-color:teal">Update User <span class="uil-edit"></span></button>
                            </div>

                        </center>

                    </form>


                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>




    <!-- container -->
    @include('systeamAdmin.adminDashboard.usersIndex_script')
    @include('systeamAdmin.admin-templete-controller.footer')