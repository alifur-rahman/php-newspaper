<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Sign up / Login Form</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{asset('public/css/jquery.toast.min.css')}}" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{asset('public/user/css/login2.css')}}">

  <style>
      .al_ajax_loader {
        position: absolute;
        left: 0;
        top: 34%;
        width: 100%;
        height: 100%;
        text-align: center;
        display: none;
    }
    .al_ajax_loader img {
            width: 100px;
            height: 100px;
            text-align: ;
        }
        .main{
            position: relative;
        }
       
  </style>

</head>


<body>
	<div class="main main-form">  	
		<input type="checkbox" id="chk" aria-hidden="true">
			<div class="signup">
				<form  id="signup_submit">
					<label for="chk" aria-hidden="true">Sign up</label>
                    <input type="text" id="full_name" placeholder="Type your name" required="">
					<input type="email" id="Remail" placeholder="Email" required="">
					<input type="password" id="Rpassword"  placeholder="Password" required="">
					<button type="submit" >Sign up</button>
				</form>
			</div>

			<div  class="login">
				<form id="login_submit">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="email" id="lemail" name="lemail" placeholder="Email" required="">
					<input type="password" name="lpassword" id="lpassword" placeholder="Password" required="">
					<button  type="submit" >Login</button>
				</form>
			</div>
           
           

            <div id="ajax_loader" class="al_ajax_loader">
                <img src="{{ asset('public/img/ajax-loader.gif') }}" alt="" srcset="">
            </div>
	</div>
   

    <div class="main OTP_form" style="display:none ">  	
		<input type="checkbox" id="chk" aria-hidden="true">

            <div class="" >
				<form id="OTP_form">
                    <label >Email Verification </label>
					<input type="text"  id="OTP" placeholder="Type OTP" >
					<button  type="submit" >Submit</button>
				</form>
			</div>

            <div id="ajax_loader" class="al_ajax_loader">
                <img src="{{ asset('public/img/ajax-loader.gif') }}" alt="" srcset="">
            </div>
	</div>

    <div class="main ROTP_form" style="display:none ">  	
		<input type="checkbox" id="chk" aria-hidden="true">

            <div class="" >
				<form id="ROTP_form">
                    <label >Email Verification </label>
					<input type="text"  id="ROTP" placeholder="Type OTP" >
					<button  type="submit" >Submit</button>
				</form>
			</div>

            <div id="ajax_loader" class="al_ajax_loader">
                <img src="{{ asset('public/img/ajax-loader.gif') }}" alt="" srcset="">
            </div>
	</div>
   <div>
    <a class="back_to_home" href="/"> <i class="fa fa-home"></i> Back to Home </a>
    <a class="back_to_home" href="/user/auth/forgot"> <i class="fa fa-key"></i> Forgot Password </a>
  
   </div>

<script src="{{asset('public/js/jquery-3.2.1.min.js')}} "></script>
<script src="{{asset('public/js/jquery.toast.min.js')}} "></script>
<script>
    $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // signup 

        $("#signup_submit").submit(function (e) {
            //stop submitting the form to see the disabled button effect
            e.preventDefault();
            var full_name = $('#full_name').val();
            var email = $('#Remail').val();
            var password = $('#Rpassword').val();
            
            if(full_name == ""){
                $.toast({
                    heading: 'Warning',
                    text: 'Full Name is Required!',
                    showHideTransition: 'slide',
                    icon: 'warning'
                })
            }
            else if(email == ""){
                $.toast({
                    heading: 'Warning',
                    text: 'Email is Required!',
                    showHideTransition: 'slide',
                    icon: 'warning'
                })
            }
            else if(password == ""){
                $.toast({
                    heading: 'Warning',
                    text: 'Password is Required!',
                    showHideTransition: 'slide',
                    icon: 'warning'
                })
            }
           
            else{
                $('#ajax_loader').show();
               
                $.ajax({
                    type:"POST",
                    url: "{{ url('/user/create/sendData') }}",
                    data: {
                        full_name: full_name,
                        email: email,
                        password:password
                    },
                    dataType: 'json',
                    success: function(res){
                        if(res.data == "success"){
                            $.toast({
                                heading: 'Success',
                                text: 'Registration Success',
                                showHideTransition: 'slide',
                                icon: 'success'
                            });
                            $.toast({
                                heading: 'Email Verify Need',
                                text: 'OTP Send, check your Email',
                                showHideTransition: 'slide',
                                icon: 'error'
                            })
                            $('#ajax_loader').hide();
                            $('.ROTP_form').show();
                            $('.main-form').hide();
                        }
                        else if(res.data == "duplicate"){
                            $.toast({
                                heading: 'Error',
                                text: 'This Email Already Taken',
                                showHideTransition: 'slide',
                                icon: 'error'
                            })
                            $('#ajax_loader').hide();
                        }
                        else{
                            console.log(res);
                        }
                       
                    }
                });


               
            }




        });
        $("#ROTP_form").submit(function (e) {
            e.preventDefault();
            var OTP = $('#ROTP').val();
            var email = $('#Remail').val();
            if(OTP == ""){
                $.toast({
                    heading: 'Warning',
                    text: 'Enter the OTP',
                    showHideTransition: 'slide',
                    icon: 'warning'
                })
            }
            else{
                $('#ajax_loader').show();
                $.ajax({
                    type:"POST",
                    url: "{{ url('/user/forgot/sendOTP') }}",
                    data: {
                        OTP: OTP,
                        email: email,
                        page: 'registration'
                    },
                    dataType: 'json',
                    success: function(res){
                        if(res.data == "success"){
                            $.toast({
                                heading: 'Success',
                                text: 'OTP Match found',
                                showHideTransition: 'slide',
                                icon: 'success'
                            });
                            $('#ajax_loader').hide();
                            $('#ROTP_form').hide();
                            setTimeout(function(){
                                    window.location.href = "/user/home";
                            },1000)
                        }
                        else if(res.data == "error"){
                            $.toast({
                                heading: 'Wrong OTP',
                                text: 'You have entred wrong OPT code',
                                showHideTransition: 'slide',
                                icon: 'error'
                            })
                            $('#ajax_loader').hide();
                        }
                        else{
                            console.log(res);
                        }
                       
                    }
                });
            }
           
          
        });


        // login 
        $("#login_submit").submit(function (e) {
            e.preventDefault();
            var email = $('#lemail').val();
            var password = $('#lpassword').val();
            if(email == ""){
                $.toast({
                    heading: 'Warning',
                    text: 'Email is Required!',
                    showHideTransition: 'slide',
                    icon: 'warning'
                })
            }
            else if(password == ""){
                $.toast({
                    heading: 'Warning',
                    text: 'Password is Required!',
                    showHideTransition: 'slide',
                    icon: 'warning'
                })
            }
            else{
                $('#ajax_loader').show();
                $.ajax({
                    type:"POST",
                    url: "{{ url('/user/login/sendData') }}",
                    data: {
                        email: email,
                        password: password
                    },
                    dataType: 'json',
                    success: function(res){
                        if(res.data == "success"){
                            $.toast({
                                heading: 'Success',
                                text: 'Login Success',
                                showHideTransition: 'slide',
                                icon: 'success'
                            });
                            setTimeout(function(){
                                    window.location.href = '/user/home';
                            },1000)
                            $('#ajax_loader').hide();
                        }
                        else if(res.data == 'Not Verified'){
                            $.toast({
                                heading: 'Email Verify Need',
                                text: 'OTP Send, check your Email',
                                showHideTransition: 'slide',
                                icon: 'error'
                            })
                            $('#ajax_loader').hide();
                            $('.OTP_form').show();
                            $('.main-form').hide();
                        }
                        else if(res.data == "error"){
                            $.toast({
                                heading: 'Error',
                                text: 'Wrong Username Or Password',
                                showHideTransition: 'slide',
                                icon: 'error'
                            })
                            $('#ajax_loader').hide();
                        }
                        else{
                            console.log(res);
                        }
                       
                    }
                });
            }
           
          
        });

        $("#OTP_form").submit(function (e) {
            e.preventDefault();
            var OTP = $('#OTP').val();
            var email = $('#lemail').val();
            if(OTP == ""){
                $.toast({
                    heading: 'Warning',
                    text: 'Enter the OTP',
                    showHideTransition: 'slide',
                    icon: 'warning'
                })
            }
            else{
                $('#ajax_loader').show();
                $.ajax({
                    type:"POST",
                    url: "{{ url('/user/forgot/sendOTP') }}",
                    data: {
                        OTP: OTP,
                        email: email,
                        page: 'login'
                    },
                    dataType: 'json',
                    success: function(res){
                        if(res.data == "success"){
                            $.toast({
                                heading: 'Success',
                                text: 'OTP Match found',
                                showHideTransition: 'slide',
                                icon: 'success'
                            });
                            $('#ajax_loader').hide();
                            $('#OTP_form').hide();
                            setTimeout(function(){
                                    window.location.href = "/user/home";
                            },1000)
                        }
                        else if(res.data == "error"){
                            $.toast({
                                heading: 'Wrong OTP',
                                text: 'You have entred wrong OPT code',
                                showHideTransition: 'slide',
                                icon: 'error'
                            })
                            $('#ajax_loader').hide();
                        }
                        else{
                            console.log(res);
                        }
                       
                    }
                });
            }
           
          
        });

    });

   
</script>
</body>


</html>
