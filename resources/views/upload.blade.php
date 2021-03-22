@extends('layouts.app')
@section('content')
 <div class="container">
   <div class="row">
     <div class="col-md-6 offset-md-3">
       <div class="card">
         <div class="card-header">
           File Upload
         </div>
         <div class="card-body">
           <form action="{{route('upload.uploadfile')}}" method="post" enctype="multipart/form-data">
              @csrf
              <p name="id" class="form-control">
                {{ Auth::user()->name }}
              </p>
              <div class="form-group">
                <label for="file">Choose File</label>
                <input type="file" class="form-control" name="file" id="file"/>
              </div>
              <button type="submit" class="btn btn-success">Upload</button>
           </form>
         </div>
       </div>
     </div>
   </div>
 </div>
@endsection