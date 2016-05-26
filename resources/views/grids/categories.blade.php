@extends('layouts.master')

@section('content')

<div class="page page-tables-datatables">

    <div class="pageheader">

        <h2>Score Card Categories <span></span></h2>

        <div class="page-bar">

            <ul class="page-breadcrumb">
                <li>
                    <a href="index.html"><i class="fa fa-home"></i> Home</a>
                </li>
                <li>
                    <a href="#">Tables</a>
                </li>
                <li>
                    <a href="#">Datatables</a>
                </li>
            </ul>

        </div>

    </div>

    <!-- row -->
    <div class="row">
        <!-- col -->
        <div class="col-md-12">
            <!-- tile -->

            <section class="tile">
                @if (session('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Success!!! </strong>{{ session('message') }}
                </div>
                @endif

                @if (session('fail'))
                <div class="alert alert-warning alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Failure!!!</strong> {{ session('message') }}.
                </div>
                @endif
                <!-- tile header -->
                <div class="tile-header dvd dvd-btm">
                    <h1 class="custom-font"><strong>Score</strong> Cards</h1>
                    <ul class="controls">
                        <li>

                            <a href="{{url("/addcategory")}}" ><i class="fa fa-plus mr-5"></i> Add Entry</a>
                        </li>
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
                    <div class="table-  responsive">
                        <table class="table table-custom" id="editable-usage">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Name</th>
                                    <th>Status</th>
                                    <th>Date Created</th>
                                    <th>Date Updated</th>
                                    <th style="width: 160px;" class="no-sort">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $index)
                                <tr class="odd gradeX">
                                    <td>{{$index->id}}</td>
                                    <td>{{$index->name}}</td>
                                    <td>{{$index->status}}</td>
                                    <td>{{$index->created_at}}</td>
                                    <td>{{$index->updated_at}}</td>
                                    <td class="actions">
                                        <a href="{{url("/editcategories/$index->id/1")}}"class="text-primary text-uppercase text-strong text-sm mr-10">Edit</a>
                                        <a href="{{url("/deletecategories/$index->id/2")}}"class="text-danger text-uppercase text-strong text-sm mr-10">Delete</a>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /tile body -->

            </section>
        </div>
        <!-- /col -->
    </div>
    <!-- /row -->

</div>

@endsection
