<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\CityHealthWorker;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
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
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'user_type' => ['required'],
            'key' => [
                Rule::requiredIf($request->user_type == 'CHO'),
                function (string $attribute, mixed $value, Closure $fail) {
                    if ($value !== env('CHO_KEY')) {
                        $fail("Invalid CHO Key");
                    }
                }
            ],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'contact' => ['required', 'digits:11', 'numeric', 'starts_with:09'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'contact_number' => $request->contact,
            'password' => Hash::make($request->password),
        ]);

        if ($request->user_type === 'CHO') {
            CityHealthWorker::create([
                'user_id' => $user->id,
                'admin' => 0
            ]);
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect('bhw/documents');
    }
}