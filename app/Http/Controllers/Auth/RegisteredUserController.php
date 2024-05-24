<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    // public function store(Request $request): RedirectResponse
    // {
    //     $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
    //         'password' => ['required', 'confirmed', Rules\Password::defaults()],
    //     ]);

    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //     ]);

    //     event(new Registered($user));

    //     Auth::login($user);

    //     return redirect(route('dashboard', absolute: false));
    // }

    public function register(Request $request)
    {
        $userType = $request->input('user_type');

        if ($userType == 'seller') {
            $this->validateSeller($request);
            $user = $this->createSeller($request->all());
        } else {
            $this->validateBidder($request);
            $user = $this->createBidder($request->all());
        }

        auth()->login($user);

        return redirect()->route('home')->with('success', 'Registration successful!');
    }

    protected function validateSeller(Request $request)
    {
        $request->validate([
            'organization_name' => 'required|string|max:255',
            'seller_address' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'seller_phone_number' => 'required|string|max:20',
            'seller_username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|string|min:8|confirmed',
        ]);
    }

    protected function validateBidder(Request $request)
    {
        $request->validate([
            'bidder_first_name' => 'required|string|max:255',
            'bidder_last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'bidder_phone_number' => 'required|string|max:20',
            'bidder_username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|string|min:8|confirmed',
        ]);
    }

    protected function createSeller(array $data)
    {
        return User::create([
            'name' => $data['organization_name'],
            'address' => $data['seller_address'],
            'email' => $data['email'],
            'phone' => $data['seller_phone_number'],
            'username' => $data['seller_username'],
            'password' => Hash::make($data['password']),
            'role' => 'seller',
        ]);
    }

    protected function createBidder(array $data)
    {
        return User::create([
            'name' => $data['bidder_first_name'] . ' ' . $data['bidder_last_name'],
            'email' => $data['email'],
            'phone' => $data['bidder_phone_number'],
            'username' => $data['bidder_username'],
            'password' => Hash::make($data['password']),
            'role' => 'bidder',
        ]);
    }
}
