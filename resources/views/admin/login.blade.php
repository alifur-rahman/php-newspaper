<!DOCTYPE html>
<html lang="en">


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Amin IT Newspapper - Login</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href=" {{asset('public/admin_assets/css/app.min.css')}} ">
  <link rel="stylesheet" href=" {{asset('public/admin_assets/bundles/izitoast/css/iziToast.min.css')}}">

  <link rel="stylesheet" href=" {{asset('public/admin_assets/bundles/bootstrap-social/bootstrap-social.css')}} ">
  <!-- Template CSS -->
  <link rel="stylesheet" href=" {{asset('public/admin_assets/css/style.css')}} ">
  <link rel="stylesheet" href=" {{asset('public/admin_assets/css/components.css')}} ">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/">
  <link rel='shortcut icon' type='image/x-icon' href='assets/' />
  <link rel="stylesheet" href=" {{asset('public/admin_assets/css/custom.css')}} ">
  <link rel='shortcut icon' type='image/x-icon' href=" {{asset('public/admin_assets/img/favicon.ico')}} ">
  <style>
    body {
	background: url("{{asset('public/img/login/admin-login-bg.jpg')}}");
	background-position-x: 0%;
	background-position-y: 0%;
	background-repeat: repeat;
	background-attachment: scroll;
	background-size: auto;
	flex-direction: column;
	background-attachment: fixed;
	background-position: bottom;
	background-repeat: no-repeat;
	background-size: cover;
}
  </style>
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Login</h4>
              </div>
              <div class="card-body">
                <form method="POST" action="#" id="login-form" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="email">Username</label>
                    <input id="username" required type="text" class="form-control" name="username" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your username
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                     
                    </div>
                    <input id="password" required type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Remember Me</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
                
                </div>
              </div>
            </div>
          
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src=" {{asset('public/admin_assets/js/app.min.js')}} "></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <script src=" {{asset('public/admin_assets/bundles/izitoast/js/iziToast.min.js')}} "></script>
  <!-- Template JS File -->
  <script src=" {{asset('public/admin_assets/js/scripts.js')}} "></script>
  <!-- axios js  -->
  <script src="{{asset('public/admin_assets/js/axios.min.js')}}"></script>
  <!-- Custom JS File -->
  <script src=" {{asset('public/admin_assets/js/custom.js')}} "></script>
  <script>
      $('#login-form').on('submit', function(e){
        e.preventDefault();
        var FormData = $(this).serializeArray();
        let username = FormData[0]['value'];
        let password = FormData[1]['value'];

        if(username == ""){
          iziToast.error({
            title: 'Username is Required!',
            position: 'topRight'
          });
        }
        else if(password == ""){
          iziToast.error({
            title: 'Password is Required!',
            position: 'topRight'
          });
        }
        else{
          var url = "/admin/onAdminLogin";
          var data = {username:username, password:password};
          axios.post(url,data)
          .then(function(response){
            
            if(response.status==200 && response.data==1){
              iziToast.success({
                  title: 'Login Success',
                  position: 'topRight'
              });
              setTimeout(function(){
                window.location.href = "/admin";
              },1000)
              
            }
            else{
              iziToast.error({
                title: response.data,
                position: 'topRight'
              });
            }

          })
          .catch(function (error){
              console.log(error);
          });


          
        }


      });
  </script>
</body>


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
</html>