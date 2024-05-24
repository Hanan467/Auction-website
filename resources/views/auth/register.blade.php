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
                        <a href="#" onclick="showForm('seller')" class="active" id="seller-link">Sign up as a Seller</a>
                        <a href="#" onclick="showForm('bidder')" id="bidder-link">Sign up as a Bidder</a>
                    </div>
                    <div id="seller-form" class="form-container">
                    <div class="login-form-body">
                    <!-- Step 1: Organization Name, Address, Phone Number, Email -->
                    <div class="step step-1 active">
                        <div class="form-gp">
                        <x-input-label for="organizationName" :value="('organizationName')" />
                        <x-text-input id="organizationName"  type="text" name="organization_name" :value="old('organizationName')" required autofocus autocomplete="organizationName" />
                        <i class="ti-user"></i>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="form-gp">
                            <x-input-label for="sellerAddress" :value="('sellerAddress')" />
                            <x-text-input id="sellerAddress" type="text" name="sellerAddress" :value="old('sellerAddress')" required autocomplete="sellerAddress" />
                            <i class="ti-location-pin"></i>
                            <x-input-error :messages="$errors->get('sellerAddress')" class="mt-2" />                       
                         </div>
                        <div class="form-gp">
                            <x-input-label for="email" :value="('Email')" />
                            <x-text-input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" />
                            <i class="ti-email"></i>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />                       
                         </div>
                         <div class="form-gp">
                            <x-input-label for="sellerPhoneNumber" :value="('sellerPhoneNumber')" />
                            <x-text-input id="sellerPhoneNumber" type="number" name="sellerPhoneNumber" :value="old('sellerPhoneNumber')" required autocomplete="sellerPhoneNumber" />
                            <i class="ti-mobile"></i>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />                       
                         </div>
                         <div class="RegistrationLink">
                                    <a href="#" class="btn-next " id="seller-next">Next</a>
                                </div>
                        </div>
                    
                            <!-- Step 2: Username, Password, Confirm Password -->
                            <div class="step step-2" style="display: none;">
                            <div class="form-gp">
                            <x-input-label for="sellerUserName" :value="('sellerUserName')" />
                            <x-text-input id="sellerUserName" type="text" name="sellerUserName" :value="old('sellerUserName')" required autocomplete="sellerUserName" />
                            <i class="ti-user"></i>
                            <x-input-error :messages="$errors->get('sellerUserName')" class="mt-2" />                       
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
                    </div>
                    </div>

                    <div id="bidder-form" class="form-container">
                    <div class="login-form-body">
                    <!-- Step 1: Organization Name, Address, Phone Number, Email -->
                    <div class="step step-1 active">
                        <div class="form-gp">
                        <x-input-label for="bidderFirstName" :value="('bidderFirstName')" />
                        <x-text-input id="bidderFirstName"  type="text" name="bidderFirstName" :value="old('bidderFirstName')" required autofocus autocomplete="organizationName" />
                        <i class="ti-user"></i>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="form-gp">
                            <x-input-label for="bidderLastName" :value="('bidderLastName')" />
                            <x-text-input id="bidderLastName" type="text" name="bidderLastName" :value="old('bidderLastName')" required autocomplete="sellerAddress" />
                            <i class="ti-user"></i>
                            <x-input-error :messages="$errors->get('bidderLastName')" class="mt-2" />                       
                         </div>
                        <div class="form-gp">
                            <x-input-label for="email" :value="('Email')" />
                            <x-text-input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" />
                            <i class="ti-email"></i>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />                       
                         </div>
                         <div class="form-gp">
                            <x-input-label for="sellerPhoneNumber" :value="('sellerPhoneNumber')" />
                            <x-text-input id="sellerPhoneNumber" type="number" name="sellerPhoneNumber" :value="old('sellerPhoneNumber')" required autocomplete="sellerPhoneNumber" />
                            <i class="ti-mobile"></i>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />                       
                         </div>
                         <div class="RegistrationLink">
                                    <a href="#" class="btn-next " id="seller-next">Next</a>
                                </div>
                        </div>
                    
                            <!-- Step 2: Username, Password, Confirm Password -->
                            <div class="step step-2" style="display: none;">
                            <div class="form-gp">
                            <x-input-label for="sellerUserName" :value="('sellerUserName')" />
                            <x-text-input id="sellerUserName" type="text" name="sellerUserName" :value="old('sellerUserName')" required autocomplete="sellerUserName" />
                            <i class="ti-user"></i>
                            <x-input-error :messages="$errors->get('sellerUserName')" class="mt-2" />                       
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