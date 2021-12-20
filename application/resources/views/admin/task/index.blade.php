@extends('admin.layouts.master')
@section('title')
Task
@endsection
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            @if (session('msg'))
              <div class="alert alert-success">
                {{session('msg')}}
              </div>
            @endif 
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"></h3>
                <button type="button" class="btn btn-block bg-gradient-success"><a style="color: white;" href="{{route('admin.tasks.create')}}">Add</a></button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Title</th>
                      <th>Description</th>
                      <th>Start Date</th>
                      <th>Due Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($tasks as $id => $task)
                    @php
                    $url = route('admin.tasks.edit',['task'=>$id]);
                    @endphp
                    <tr>
                      <td>{{$id+1}}</td>
                      <td><a href="{{$url}}"> {{$task->title}}</a></td>
                      <td>{{$task->description}}</td>
                      <td>{{$task->startDate}}</td>
                      <td>{{$task->dueDate}}</td>
                      <td>
                        <button type="button" class="btn btn-block bg-gradient-info btn-xs"><a style="color: white;" href="{{$url}}">Edit</a></button>
                        <form method="POST" action="{{ route('admin.tasks.destroy', [ 'task'=> $id ]) }}">
                          @csrf
                          <input type="hidden" name="_method" value="DELETE">
                          <button type="submit" class="btn btn-block bg-gradient-danger btn-xs">
                            <i data-feather="delete">Delete</i>
                          </button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

