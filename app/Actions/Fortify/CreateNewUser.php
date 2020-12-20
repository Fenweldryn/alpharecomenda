<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Notifications\NewUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'condominio' => ['required', 'string'],
            'casa' => ['required', 'string'],
            'password' => $this->passwordRules(),
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'condominio' => $input['condominio'],
            'casa' => $input['casa'],
            'password' => Hash::make($input['password']),
        ]);

        $admin = User::where('admin', 1)->first();
        if ($admin) {
            $admin->notify(new NewUser($user));
        }

        return $user;
    }
}
