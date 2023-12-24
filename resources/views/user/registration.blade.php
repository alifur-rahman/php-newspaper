@extends('../Layout.app')
@section('title', 'New User Registration')
@section('content')
        <div class="">
            <div class="login--section pd--100-0 bg--overlay" data-bg-img="{{ asset('public/img/login/bg3.jpg') }} ">
                <div class="">
                    <div class="login--form">
                        <div class="title">
                            <h1 class="h1">Create an account</h1>
                            <p>to continue to ePaper</p>
                        </div>
                        <form id="signup_submit" action="#" method="post" class="form"  >
                            <div class="form-group">
                                <label> <span>Full Name</span> <input type="text" id="full_name" class="form-control"  /> </label>
                            </div>
                            <div class="form-group">
                                <label> <span>Email</span> <input type="email" id="email" class="form-control"  /> </label>
                            </div>
                            <div class="form-group">
                                <label> <span>Password</span> <input type="password" id="password" class="form-control"  /> </label>
                            </div>
                            <div class="form-group">
                                <label> <span>Confirm Password</span> <input type="password" id="c_password" class="form-control"  /> </label>
                            </div>
                           
                            <button type="submit" class="btn btn-lg btn-block btn-primary" >REGISTER</button>
                            <p class="help-block clearfix"><a href="/user/forgot" class="btn-link pull-left">Forgot Username or Password?</a> <a href="/user/login" class="btn-link pull-right">Login</a></p>
                            
                        </form>
                        <form id="OTP_form" action="" method="post" class="form" style="display:none">
                            <p>Check your Email get OTP code</p>
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

        $("#signup_submit").submit(function (e) {
            //stop submitting the form to see the disabled button effect
            e.preventDefault();
            var full_name = $('#full_name').val();
            var email = $('#email').val();
            var password = $('#password').val();
            var c_password = $('#c_password').val();
            
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
            else if(c_password == ""){
                $.toast({
                    heading: 'Warning',
                    text: 'Confirm Password is Required!',
                    showHideTransition: 'slide',
                    icon: 'warning'
                })
            }
            else if(password != c_password){
                $.toast({
                    heading: 'Error',
                    text: 'Confirm Password not match',
                    showHideTransition: 'slide',
                    icon: 'error'
                })
            }
            else{
                $('#ajax_loader').show();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
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
                           
                            $('#signup_submit').hide();
                            $('#OTP_form').show();
                            $('#ajax_loader').hide();
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
                            $('#OTP_form').hide();
                            setTimeout(function(){
                                    window.location.href = "/user/login";
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
