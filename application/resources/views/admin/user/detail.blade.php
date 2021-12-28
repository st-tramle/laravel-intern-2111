@extends('admin.layouts.master')
@section('title')
User
@endsection
@section('content')
 <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Information
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <dl class="row">
                    <dt class="col-sm-4">Name</dt>
                    <dd class="col-sm-8">{{ $user->name }}</dd>
                    <dt class="col-sm-4">Email</dt>
                    <dd class="col-sm-8">{{ $user->email }}</dd>
                    </dl>
                </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-8">
                <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Task List
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <ul>
                        @foreach( $user->tasks as $task)
                        <li>{{ $task->title }}</li>
                        @endforeach
                    </ul>
                </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
  <!-- /.content-wrapper -->
@endsection
