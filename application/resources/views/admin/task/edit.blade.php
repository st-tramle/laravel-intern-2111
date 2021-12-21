@extends('admin.layouts.master')
@section('title')
Update Task
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
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Task</h3>
              </div>
              <!-- /.card-header -->
              
              <!-- form start -->
              <form method="post" action="{{route('admin.tasks.update', ['task'=>$task->id])}}" enctype="multipart/form-data">
              @method('PUT')  
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" name="title" class="form-control" value="{{old('title') ? old('title') : $task->title}}">
                  </div>
                  @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <input type="text" name="description" class="form-control" value="{{ old('description') ? old('description') : $task->description}}">
                  </div>
                  @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-group">
                    <label>Type</label>
                    <input type="text" name="type" class="form-control" value="{{ old('type') ? old('type') : $task->type}}">
                  </div>
                  @error('type')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-group">
                    <label>Status</label>
                    <input type="text" name="status" class="form-control" value="{{ old('status') ? old('status') : $task->status}}">
                  </div>
                  @error('status')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-group">
                    <label>Start Date</label>
                    <input type="text" name="start_date" class="form-control" value="{{ old('start_date') ? old('start_date') : $task->start_date}}">
                  </div>
                  @error('start_date')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-group">
                    <label>Due Date</label>
                    <input type="text" name="due_date" class="form-control" value="{{ old('due_date') ? old('due_date') : $task->due_date}}">
                  </div>
                  @error('due_date')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-group">
                    <label>Assignee</label>
                    <input type="text" name="assignee" class="form-control" value="{{ old('assignee') ? old('assignee') : $task->assignee}}">
                  </div>
                  @error('assignee')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-group">
                    <label>Estimate</label>
                    <input type="text" name="estimate" class="form-control" value="{{ old('estimate') ? old('estimate') : $task->estimate}}">
                  </div>
                  @error('estimate')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-group">
                    <label>Actual</label>
                    <input type="text" name="actual" class="form-control" value="{{ old('actual') ? old('actual') : $task->actual}}">
                  </div>
                  @error('actual')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper --> 
@endsection
@section('js')
<!-- bs-custom-file-input -->
<script src="{{ asset('admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
@endsection