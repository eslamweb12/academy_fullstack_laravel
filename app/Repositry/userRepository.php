<?php

namespace App\Repositry;

use App\Models\User;

class userRepository
{
    public function createUser($data)
    {
        $User = User::create($data); // Create the user

        return redirect()->to('/')->with('success', 'Welcome to our academy!');
    }
    public function Log_in($data){
        if(auth()->attempt($data)) {
            return redirect()->to('/')->with('success', 'Welcome to our academy!');

        }
        return redirect()->to('/auth/login')->with('error', 'email or password is not correct');
    }


}
