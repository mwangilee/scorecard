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
                    <h1 class="custom-font"><strong>Scoring </strong>Categories</h1>
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
                    <form action="{{url('/addweights')}}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="parametername">Parameter Name</label>
                            <select name="parametername" class="form-control mb-5">
                                  @foreach ($params as $index)
                                <option>{{$index->id." - ".$index->parametername}}</option>
                                 @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="min">Min</label>
                            <input type="text"name="min" value="" class="form-control" id="exampleInputPassword1" placeholder="Please enter the min value">
                        </div>
                        <div class="form-group">
                            <label for="min">Max</label>
                            <input type="text"name="max" value="" class="form-control" id="exampleInputPassword1" placeholder="Please enter the max value">
                        </div>
                        <div class="form-group">
                            <label for="min">Value</label>
                            <input type="text"name="value" value="" class="form-control" id="exampleInputPassword1" placeholder="Please enter the value">
                        </div>
                        <div class="form-group">
                            <label for="status">Score</label>
                            <input type="text"name="score" value="" class="form-control" id="exampleInputPassword1" placeholder="Please enter the score">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text"name="status" value="" class="form-control" id="exampleInputPassword1" placeholder="Category status ACTIVE/INACTIVE">
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

