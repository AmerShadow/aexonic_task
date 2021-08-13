<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sign Up</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{ asset('css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
</head>

 <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-form">
                  <div class="col-lg-12">
                    <div class="card">
                        @include('partials.alerts')
                      <div class="card-header"><strong>ADD NEW USER</strong></div>
                        <div class="card-body card-block">
                            <form method="POST" action="{{route('users.store')}}" enctype="multipart/form-data">
                                @csrf


                     <div class="form-group">
                        <label for="exampleInputName">Select Role:</label>
                            <select class="form-control select2" name="role">
                                      <option value="admin">Admin</option>
                                      <option value="normal_user">Normal User</option>
                            </select>
                     </div>           
                     <div class="form-group">
                         <label for="company" class=" form-control-label">User Name</label>
                        <input type="text" id="name" name="name" placeholder="User name" class="form-control">
                     </div>

                     <div class="form-group">
                        <label for="vat" class=" form-control-label">Email</label>
                        <input type="email" id="email" name="email" placeholder="Email" class="form-control">
                     </div> 
                     <div class="form-group">
                        <label for="vat" class=" form-control-label">Password</label>
                        <input type="password" id="password" name="password" placeholder="Password" class="form-control">
                     </div> 

                     <div class="form-group">
                        <label for="vat" class=" form-control-label">Phone</label>
                        <input type="number" id="phone" name="phone" placeholder="Phone" class="form-control" >
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
                        <input type="number" id="pin" name="pin_code" placeholder="pincode" class="form-control">
                     </div> 
                     <div class="form-group">
                        <label for="vat" class=" form-control-label">Pincode</label>
                        <input type="number" id="pin" name="pin_code" placeholder="pincode" class="form-control">
                     </div> 
                     <div class="form-group">
                        <label for="vat" class=" form-control-label">Profile Picture</label>
                        <input type="file" id="image" name="profile_picture" placeholder="Image" class="form-control">
                     </div> 

                     <div class="card">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>

                    </form>                                      
                 </div>
                 </div>
                </div>
            </div>
       </div>
    </div>
</div>
  <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="{{ asset('js/main.js')}}"></script>

</body>
</html>