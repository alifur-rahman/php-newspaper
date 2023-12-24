@extends('../Layout.app')
@section('title', 'Login')
@section('content')
        <div class="">
            <div class="login--section pd--100-0 bg--overlay" data-bg-img="{{ asset('public/img/login/bg2.jpg') }} ">
                <div class="">
                    <div class="login--form">
                        <div class="title">
                            <h1 class="h1">Login</h1>
                            <p>Login into account by fillup the below form</p>
                        </div>
                        <form id="login_submit" action="" method="post" class="form"  >
                            <div class="form-group">
                                <label> <span>Email Address</span> <input type="email" id="email" class="form-control" /> </label>
                            </div>
                            <div class="form-group">
                                <label> <span>Password</span> <input type="password" id="password" class="form-control" /> </label>
                            </div>
                            <div class="checkbox">
                                <label> <input type="checkbox" name="rememberme" /> <span>Remember me</span> </label>
                            </div>
                            <button type="submit" class="btn btn-lg btn-block btn-primary"  >LOGIN</button>
                            <p class="help-block clearfix"><a href="/user/forgot" class="btn-link pull-left">Forgot Username or Password?</a> <a href="/user/create" class="btn-link pull-right">Create An Account</a></p>
                        </form>
                        <form id="OTP_form" action="" method="post" class="form" style="display:none">
                            <div class="form-group">
                                <label> <span>Enter OTP Code</span> <input type="text" id="OTP" class="form-control"  /> </label>
                            </div>
                            <button type="submit" class="btn btn-lg btn-block btn-primary"  >CONFIRM OTP</button>
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
        $("#login_submit").submit(function (e) {
            e.preventDefault();
            var email = $('#email').val();
            var password = $('#password').val();
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
                            $('#OTP_form').show();
                            $('#login_submit').hide();
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
@endsection
