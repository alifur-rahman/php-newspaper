@extends('../Layout.app')
@section('title', 'Forgot Password')
@section('content')
        <div class="">
            <div class="login--section pd--100-0 bg--overlay" data-bg-img="{{ asset('public/img/login/bg2.jpg') }} ">
                <div class="">
                    <div class="login--form">
                        <div class="title">
                            <h1 class="h1">Reset Password</h1>
                            <p>If you forgot your password </p>
                        </div>
                        <form id="Email_form" action="" method="post" class="form" >
                            <div class="form-group">
                                <label> <span>Enter Email Address</span> <input type="email" id="email" class="form-control"  /> </label>
                            </div>
                            <button type="submit" class="btn btn-lg btn-block btn-primary" id="Email_submit" >SENT OTP</button>
                            <p class="help-block clearfix"><a href="/user/login" class="btn-link pull-left">Login</a> <a href="/user/create" class="btn-link pull-right">Create An Account</a></p>
                        </form>
                        <form id="OTP_form" action="" method="post" class="form" style="display:none">
                            <div class="form-group">
                                <label> <span>Enter OTP Code</span> <input type="text" id="OTP" class="form-control"  /> </label>
                            </div>
                            <button type="submit" class="btn btn-lg btn-block btn-primary"  >CONFIRM OTP</button>
                            <p class="help-block clearfix"><a href="/user/login" class="btn-link pull-left">Login</a> <a href="/user/create" class="btn-link pull-right">Create An Account</a></p>
                        </form>
                        <form id="N_password_form" action="" method="post" class="form d-none" style="display:none">
                            <div class="form-group">
                                <label> <span>New Password</span> <input type="password" id="newPass" placeholder="Type a new password" class="form-control"  /> </label>
                                <label> <span>Confirm Password</span> <input type="password" id="CnewPass" placeholder="Type a new password" class="form-control"  /> </label>
                            </div>
                            <button type="submit" class="btn btn-lg btn-block btn-primary" >SET PASSWORD</button>
                            <p class="help-block clearfix"><a href="/user/login" class="btn-link pull-left">Login</a> <a href="/user/create" class="btn-link pull-right">Create An Account</a></p>
                        </form>

                        <div id="ajax_loader" class="al_ajax_loader">
                            <img src="{{ asset('public/img/ajax-loader.gif') }}" alt="" srcset="">
                        </div>
                        
                    </div>
                </div>
            </div>
               

        </div>

        
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $("#Email_form").submit(function (e) {
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

        $("#OTP_form").submit(function (e) {
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

        $("#N_password_form").submit(function (e) {
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
                                    window.location.href = '/user/login';
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
@endsection
