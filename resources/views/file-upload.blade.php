@extends('layouts.app')

@section('content')
      <div class="container">
         <div class="panel panel-primary">
            <div class="panel-heading">
               <h2>File Upload</h2>
            </div>
            <div class="panel-body">
               @if ($message = Session::get('success'))
                   <div class="alert alert-success alert-block">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>{{ $message }}</strong>
                   </div>
               @endif
 
               @if (count($errors) > 0)
               <div class="alert alert-danger">
                  <strong>Whoops!</strong> There were some problems with your input.
                  <ul>
                     @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                     @endforeach
                  </ul>
               </div>
               @endif
 
               <form action="{{ route('store.file') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                     <div class="col-md-6">
                        <input type="file" name="file" class="form-control" id="upload"/>
                     </div>
                     <input type="hidden" name="assignment_id"  value="{{ $assignment_id }}">
                     <div class="col-md-6">
                        <button type="submit" class="btn btn-success" id="dis_button">Upload File...</button>
                        <p id="error_msg"></p>
                     </div>
                      
                  </div>
               </form>
               <div>
                  {{-- <a href="{{route('show.file')}}">Show</a> --}}
               </div>
            </div>
         </div>
      </div>
@endsection