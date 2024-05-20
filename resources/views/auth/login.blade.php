<x-guest-layout>
    <!-- Session Status -->
 
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area ">
        <div class="container">
            <div class="login-box ptb--100">
            <form method="POST" action="{{ route('login') }}">
                    @csrf 
                    <div class="login-form-head">
                        <h4>Sign In</h4>
                        <p>Welcome back, you have been missed</p>
                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                           <x-input-label for="email" :value="('Email')" />                            <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />                           
                           <i class="ti-email"></i>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />                        
                        </div>
                        <div class="form-gp">
                        <x-input-label for="password" :value="('Password')" />

                        <x-text-input id="password"
                           name="password"
                           type="password"
                           required autocomplete="current-password" />
                            <i class="ti-lock"></i>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <div class="row mb-4 rmber-area">
                            <div class="col-6">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                    <label class="custom-control-label" for="customControlAutosizing">Remember Me</label>
                                </div>
                            </div>
                            <div class="col-6 text-right">
                            @if (Route::has('password.request'))
                         <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                         {{ ('Forgot your password?') }}
                          </a>
                            @endif                            
                        </div>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">{{ __('Sign in') }} <i class="ti-arrow-right"></i></button>
                        </div>
                        <div class="form-footer text-center mt-5">
                            <p class="text-muted">Don't have an account? <a href="register.html">Sign up</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
