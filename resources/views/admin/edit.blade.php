@extends('layouts.layout')
@section('content')
<div class="col-lg-8">
    <div class="card">
        @include('partials.alerts')
      <div class="card-header"><strong>EDIT USER</strong></div>
         <div class="card-body card-block">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <form method="POST" action="{{route('users.update', $user->id)}}" enctype="multipart/form-data">
                @csrf
                 @method('PATCH')

                 <div class="form-group">
                        <label for="exampleInputName">Select Role:</label>
                            <select class="form-control select2" name="role">
                                      <option value="admin">Admin</option>
                                      <option value="normal_user">Normal User</option>
                            </select>
                     </div>
                     <div class="form-group">
                         <label for="company" class=" form-control-label">User Name</label>
                        <input type="text" id="name" name="name" placeholder="User name" class="form-control" value="{{$user->name}}">
                     </div>

                     <div class="form-group">
                        <label for="vat" class=" form-control-label">Email</label>
                        <input type="email" id="email" name="email" placeholder="Email" class="form-control" value="{{$user->email}}">
                     </div>
                     <div class="form-group">
                        <label for="vat" class=" form-control-label">Password</label>
                        <input type="password" id="password" name="password" placeholder="Password" class="form-control">
                     </div>

                     <div class="form-group">
                        <label for="vat" class=" form-control-label">Phone</label>
                        <input type="number" id="phone" name="phone" placeholder="Phone" class="form-control" value="{{$user->phone}}">
                     </div>

                     <div class="form-group">
                        <label for="exampleInputName">Select City:</label>
                            <select class="form-control select2" name="city">
                                      <option value="nanded">Nanded</option>
                                      <option value="hyderabad">Hyderabad</option>
                            </select>
                     </div>
                      <div class="form-group">
                        <label for="exampleInputName">Select State:</label>
                            <select class="form-control" name="state">
                                      <option value="maharashtra">Maharashtra</option>
                                      <option value="telangana">Telangana</option>


                            </select>
                     </div>

                     <div class="form-group">
                        <label for="exampleInputName">Select Country:</label>
                            <select class="form-control" name="country">
                                      <option value="india">India</option>
                                      <option value="Us">Us</option>


                            </select>
                     </div>

                     <div class="form-group">
                        <label for="vat" class=" form-control-label">Pincode</label>
                        <input type="number" id="pin" name="pincode" placeholder="pincode" class="form-control" value="{{$user->pin_code}}">
                     </div>
                     <div class="form-group">
                        <label for="vat" class=" form-control-label">Profile Picture</label>
                        <input type="file" id="image" name="profile_picture" placeholder="Image" class="form-control">
                     </div>

        <div class="card">
            <button type="submit" class="btn btn-primary">Edit User</button>
        </div>
    </form>


     </div>
 </div>
</div>


@endsection
