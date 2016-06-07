@extends('layouts.master')

@section('content')


<div class="page page-forms-common">


    <!-- row -->
    <div class="row">


        <div class="col-md-6">

            <!-- tile -->
            <section class="tile">

                <!-- tile header -->
                <div class="tile-header dvd dvd-btm">
                    <h1 class="custom-font"><strong>Add </strong>Users</h1>
                    <ul class="controls">
                        <li class="dropdown">

                            <a role="button" tabindex="0" class="dropdown-toggle settings" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                                <i class="fa fa-spinner fa-spin"></i>
                            </a>

                            <ul class="dropdown-menu pull-right with-arrow animated littleFadeInUp">
                                <li>
                                    <a role="button" tabindex="0" class="tile-toggle">
                                        <span class="minimize"><i class="fa fa-angle-down"></i>&nbsp;&nbsp;&nbsp;Minimize</span>
                                        <span class="expand"><i class="fa fa-angle-up"></i>&nbsp;&nbsp;&nbsp;Expand</span>
                                    </a>
                                </li>
                                <li>
                                    <a role="button" tabindex="0" class="tile-refresh">
                                        <i class="fa fa-refresh"></i> Refresh
                                    </a>
                                </li>
                                <li>
                                    <a role="button" tabindex="0" class="tile-fullscreen">
                                        <i class="fa fa-expand"></i> Fullscreen
                                    </a>
                                </li>
                            </ul>

                        </li>
                        <li class="remove"><a role="button" tabindex="0" class="tile-close"><i class="fa fa-times"></i></a></li>
                    </ul>
                </div>
                <!-- /tile header -->

                <!-- tile body -->
                <div class="tile-body">
                    <form action="{{url('/adduser')}}" method="post">
                         <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="" class="form-control" id="exampleInputEmail1" placeholder="Please enter the Name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" value="" class="form-control" id="exampleInputEmail1" placeholder="Please enter the email">
                        </div>
                         <div class="form-group">
                            <label for="email">Password</label>
                            <input type="password" name="password" value="" class="form-control" id="exampleInputEmail1" placeholder="Please enter the default password">
                        </div>
                         <div class="form-group">
                            <label for="role">Role</label>
                            <select name="role" class="form-control mb-5">
                                <option>ADMIN</option>
                                <option>MAKER</option>
                                <option>CHECKER</option>
                            </select>
                        </div>
                         <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control mb-5">
                                <option>ACTIVE</option>
                                <option>INACTIVE</option>
                            </select>
                        </div>
                        <input type="submit" name="" value="Submit" class="btn btn-rounded btn-success btn-sm">
                        <?php echo csrf_field(); ?>
                    </form>

                </div>
                <!-- /tile body -->

            </section>
            <!-- /tile -->
            <!-- /tile -->

        </div>
        <!-- /col -->



    </div>
    <!-- /row -->


</div>



@endsection

