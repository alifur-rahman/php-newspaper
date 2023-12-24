<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Forgot Password</title>
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


<body class="forgot-bg">
	<div class="main main-form" id="Email_form" >  	
		<input type="checkbox" id="chk" aria-hidden="true">
			<div class="signup">
				<form  id="for-email">
					<label for="chk" aria-hidden="true">Forgot</label>
					<input type="email" id="email" placeholder="Email" required="">
					<button type="submit" >Sent Mail</button>
				</form>
			</div>

			<div  class="login">
				<form>
					<label for="chk" class="arro-check" aria-hidden="true">  <span><i class="fa fa-info-circle"></i> <i class="fa fa-angle-down reverti"></i></span> </label>
                        <h6 class="form_information_text">Enter Your Email which you was used to create your account. After submit the form wait few second to send your OTP verification code. Check your mail inbox or spam folder collect the OTP code and submit it for check. Then Type your new password and submit it.</h6>
                        <h4 style="text-align: center">Thank You</h4>
              
				</form>
			</div>

            <div id="ajax_loader" class="al_ajax_loader">
                <img src="{{ asset('public/img/ajax-loader.gif') }}" alt="" srcset="">
            </div>
	</div>
    <div class="main OTP_form" id="OTP_form" style="display:none ">  	
		<input type="checkbox" id="chk" aria-hidden="true">

            <div class="" >
				<form id="for-otp">
                    <label >Verification </label>
					<input type="text"  id="OTP" placeholder="Type OTP" >
					<button  type="submit" >Check OTP</button>
				</form>
			</div>

            <div id="ajax_loader" class="al_ajax_loader">
                <img src="{{ asset('public/img/ajax-loader.gif') }}" alt="" srcset="">
            </div>
	</div>
    <div class="main new-password" id="N_password_form" style="display:none ">  	
		<input type="checkbox" id="chk" aria-hidden="true">

            <div class="" >
				<form id="for-n-password">
                    <label >Set New</label>
					<input type="text"  id="newPass" placeholder="New Password" required>
                    <input type="text"  id="CnewPass" placeholder="Retype Password" required>
					<button  type="submit" >Change</button>
				</form>
			</div>

            <div id="ajax_loader" class="al_ajax_loader">
                <img src="{{ asset('public/img/ajax-loader.gif') }}" alt="" srcset="">
            </div>
	</div>

   <div>
        <a class="back_to_home" href="/"> <i class="fa fa-home"></i> Back to Home </a>
        <a class="back_to_home" href="/user/auth"> <i class="fa fa-user"></i> Login/Signup </a>
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

        $("#for-email").submit(function (e) {
            e.preventDefault();
            var email = $('#email').val();
            if(email == ""){
                $.toast({
                    heading: 'Warning',
                    text: 'Email is Required!',
                    showHideTransition: 'slide',
                    icon: 'warning'
                })
            }
            else{
                $('#ajax_loader').show();
                $.ajax({
                    type:"POST",
                    url: "{{ url('/user/forgot/sendEmail') }}",
                    data: {
                        email: email
                    },
                    dataType: 'json',
                    success: function(res){
                        if(res.data == "success"){
                            $.toast({
                                heading: 'Success',
                                text: 'OTP Send Success. Check your Email',
                                showHideTransition: 'slide',
                                icon: 'success'
                            });
                            $('#ajax_loader').hide();
                            $('#OTP_form').show();
                            $('#Email_form').hide();
                        }
                        else if(res.data == "error"){
                            $.toast({
                                heading: 'Email not Found!',
                                text: 'This Email is not Registered <br> <a href="/user/create">Sign Up here</a>',
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

        $("#for-otp").submit(function (e) {
            e.preventDefault();
            var OTP = $('#OTP').val();
            var email = $('#email').val();
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
                        page: 'forgot'
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
                            $('#N_password_form').show();
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

        $("#for-n-password").submit(function (e) {
            e.preventDefault();
            var newPass = $('#newPass').val();
            var CnewPass = $('#CnewPass').val();
            var email = $('#email').val();
            if(newPass == ""){
                $.toast({
                    heading: 'Warning',
                    text: 'Type New Password',
                    showHideTransition: 'slide',
                    icon: 'warning'
                })
            }
            else if(CnewPass == ""){
                $.toast({
                    heading: 'Warning',
                    text: 'Type Confirm New Password',
                    showHideTransition: 'slide',
                    icon: 'warning'
                })
            }
            else if(newPass != CnewPass){
                $.toast({
                    heading: 'Warning',
                    text: 'New Password & Confirm Password are not match',
                    showHideTransition: 'slide',
                    icon: 'warning'
                })
            }
            else{
                $('#ajax_loader').show();
                $.ajax({
                    type:"POST",
                    url: "{{ url('/user/forgot/setPassword') }}",
                    data: {
                        newPass: newPass,
                        email: email
                    },
                    dataType: 'json',
                    success: function(res){
                        if(res.data == "success"){
                            $.toast({
                                heading: 'Success',
                                text: 'Successfully Updated the Password <br> <a href="/user/login">login here</a>',
                                showHideTransition: 'slide',
                                icon: 'success'
                            });
                            $('#ajax_loader').hide();
                            setTimeout(function(){
                                    window.location.href = '/user/auth';
                            },1000)

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
