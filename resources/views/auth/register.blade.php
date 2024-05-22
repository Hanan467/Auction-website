<x-guest-layout>
     <!-- preloader area start -->
     <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area ">
        <div class="container">
            <div class="login-box ptb--100">
            <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="login-form-head">
                        <h4>Sign up</h4>
                        <p>Hello there, Sign up and Join with Us</p>
                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                        <x-input-label for="name" :value="('Name')" />
                        <x-text-input id="name"  type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <i class="ti-user"></i>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                        <div class="form-gp">
                            <x-input-label for="email" :value="('Email')" />
                            <x-text-input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" />
                            <i class="ti-email"></i>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />                       
                         </div>
                        <div class="form-gp">
                        <x-input-label for="password" :value="('Password')" />

                        <x-text-input id="password"
                           type="password"
                           name="password"
                            required autocomplete="new-password" />
                            <i class="ti-lock"></i>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />                        </div>
                        <div class="form-gp">
                        <x-input-label for="password_confirmation" :value="('Confirm Password')" />

                        <x-text-input id="password_confirmation"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />
                            <i class="ti-lock"></i>
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Submit <i class="ti-arrow-right"></i></button>
                            
                        </div>
                        <div class="form-footer text-center mt-5">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                        {{ ('Already registered?') }}
                       </a>                        
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->

    <!-- jquery latest versionv-->
    </form>
</x-guest-layout>
