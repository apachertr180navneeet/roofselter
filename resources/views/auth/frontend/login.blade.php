@extends('frontend.layout.app')

@section('content')

<!--Start Page Header-->
<section class="page-header" style="background-image: url('{{ asset('webtheme/assets/images/backgrounds/page-header-bg.jpg') }}'); position: relative; padding: 100px 0; background-size: cover; background-position: center;">
    <div class="container" style="position: relative; z-index: 2;">
        <div class="page-header__inner" style="text-align: center;">
            <h2 style="color: #fff; font-size: 45px; font-weight: 700; margin-bottom: 10px;">Account Login</h2>
            <ul class="thm-breadcrumb list-unstyled" style="display: inline-flex; align-items: center; justify-content: center; gap: 10px; background: rgba(0,0,0,0.5); padding: 8px 20px; border-radius: 30px;">
                <li><a href="{{ route('home') }}" style="color: #ffaa17; font-weight: 600; text-decoration: none;">Home</a></li>
                <li style="color: #fff;">/</li>
                <li style="color: #fff;">Login</li>
            </ul>
        </div>
    </div>
    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.6); z-index: 1;"></div>
</section>
<!--End Page Header-->

<!--Start Login Area-->
<section class="login-section" style="padding: 120px 0; background: #f9f9f9; position: relative;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-12">
                <div class="login-card" style="background: #ffffff; border-radius: 12px; padding: 50px 40px; box-shadow: 0 10px 40px rgba(0,0,0,0.05); border: 1px solid #eaeaea;">
                    
                    <div class="login-card-header" style="text-align: center; margin-bottom: 40px;">
                        <h3 style="font-size: 28px; font-weight: 700; color: #1c1c24; margin-bottom: 10px;">Welcome Back</h3>
                        <p style="color: #7b7b8a; font-size: 15px; margin: 0;">Access your account to manage booking details and services.</p>
                    </div>

                    <!-- Session Feedback Alerts -->
                    @if(Session::has('success'))
                        <div class="alert alert-success d-flex align-items-center gap-2 mb-4" style="border-radius: 8px; border: none; background-color: #d1e7dd; color: #0f5132; font-weight: 500; font-size: 14px;" role="alert">
                            <span class="fa fa-check-circle" style="color: #0f5132;"></span>
                            <div>{{Session::get('success')}}</div>
                        </div>
                    @endif

                    @if(Session::has('error'))
                        <div class="alert alert-danger d-flex align-items-center gap-2 mb-4" style="border-radius: 8px; border: none; background-color: #f8d7da; color: #842029; font-weight: 500; font-size: 14px;" role="alert">
                            <span class="fa fa-exclamation-triangle" style="color: #842029;"></span>
                            <div>{{Session::get('error')}}</div>
                        </div>
                    @endif

                    <!-- Form -->
                    <form action="{{route('account.authenticate')}}" method="post">
                        @csrf
                        
                        <!-- Email Input -->
                        <div class="form-group" style="margin-bottom: 25px; position: relative;">
                            <label for="email" style="font-size: 14px; font-weight: 600; color: #1c1c24; margin-bottom: 8px; display: block;">Email Address</label>
                            <div style="position: relative;">
                                <input type="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Enter your email" required autocomplete="username" style="width: 100%; border: 1.5px solid #e0e0e0; padding: 14px 20px 14px 45px; border-radius: 8px; outline: none; font-size: 15px; transition: border-color 0.3s; color: #1c1c24;">
                                <span class="fa fa-envelope" style="position: absolute; left: 18px; top: 50%; transform: translateY(-50%); color: #7b7b8a; font-size: 15px;"></span>
                            </div>
                            @error('email')
                                <div class="invalid-feedback d-block mt-2" style="font-size: 13px; color: #dc3545; font-weight: 500;">
                                    <span class="fa fa-exclamation-circle me-1"></span> {{$message}}
                                </div>
                            @enderror
                        </div>

                        <!-- Password Input -->
                        <div class="form-group" style="margin-bottom: 30px; position: relative;">
                            <label for="password" style="font-size: 14px; font-weight: 600; color: #1c1c24; margin-bottom: 8px; display: block;">Password</label>
                            <div style="position: relative;">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Enter password" required autocomplete="current-password" style="width: 100%; border: 1.5px solid #e0e0e0; padding: 14px 50px 14px 45px; border-radius: 8px; outline: none; font-size: 15px; transition: border-color 0.3s; color: #1c1c24;">
                                <span class="fa fa-lock" style="position: absolute; left: 18px; top: 50%; transform: translateY(-50%); color: #7b7b8a; font-size: 15px;"></span>
                                <span id="togglePassword" style="position: absolute; right: 18px; top: 50%; transform: translateY(-50%); color: #7b7b8a; font-size: 15px; cursor: pointer; transition: color 0.3s;">
                                    <span class="fa fa-eye-slash" id="toggleIcon"></span>
                                </span>
                            </div>
                            @error('password')
                                <div class="invalid-feedback d-block mt-2" style="font-size: 13px; color: #dc3545; font-weight: 500;">
                                    <span class="fa fa-exclamation-circle me-1"></span> {{$message}}
                                </div>
                            @enderror
                        </div>

                        <!-- Login Button -->
                        <button type="submit" class="thm-btn" style="width: 100%; justify-content: center; text-align: center; border: none; padding: 16px 20px; font-size: 16px; font-weight: 700; cursor: pointer; transition: all 0.3s;">
                            Log In Now <span class="icon-next1"></span>
                        </button>
                    </form>

                    <!-- Footer Link -->
                    <div style="text-align: center; margin-top: 35px; border-top: 1px solid #eaeaea; padding-top: 25px;">
                        <p style="color: #7b7b8a; font-size: 15px; margin: 0;">
                            Don't have an account yet? 
                            <a href="{{route('account.register')}}" style="color: #ffaa17; font-weight: 700; text-decoration: none; transition: color 0.3s;">Create Account</a>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!--End Login Area-->

@endsection

@section('scripts')
<script>
$(document).ready(function() {
    // Custom focus styles
    $('input').on('focus', function() {
        $(this).css('border-color', '#ffaa17');
    }).on('blur', function() {
        $(this).css('border-color', '#e0e0e0');
    });

    // Password visibility toggle
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    const toggleIcon = document.querySelector('#toggleIcon');

    if (togglePassword && password && toggleIcon) {
        togglePassword.addEventListener('click', function () {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            
            toggleIcon.classList.toggle('fa-eye');
            toggleIcon.classList.toggle('fa-eye-slash');
        });
    }
});
</script>
@endsection