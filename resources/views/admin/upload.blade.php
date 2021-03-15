@extends('layouts.admin')
@section('content')
 <div class="container">
   <div class="row">
     <div class="col-md-6 offset-md-3">
       <div class="card">
         <div class="card-header">
           File Upload
         </div>
         <div class="card-body">
           <form action="{{route('upload.uploadfileadmin')}}" method="post" enctype="multipart/form-data">
              @csrf
              <select name="user_id" class="form-control">
                @foreach (\App\Models\User::all() as $user)
                @if ($user->id === intval($user_id))
                  <option selected value="{{$user->id}}">{{$user->name}}</option>
                @else
                  <option value="{{$user->id}}">{{$user->name}}</option>
                @endif
                @endforeach
              </select>
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