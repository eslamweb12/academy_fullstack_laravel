<?php

namespace App\Http\Controllers\Api\Auth;

use App\action\message;
use App\Http\Controllers\Controller;
use App\Http\Requests\loginRequest;
use App\Http\Requests\userFormRequest;
use App\Http\Resources\userResource;
use App\Models\User;
use App\Repositry\userRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    private $repo;

    public function __construct(userRepository $repo)
    {
        $this->repo = $repo;

    }

    public function index()
    {
        $users = User::query()->orderBy('id', 'desc')->get();
        return message::success(userResource::collection($users),'all users');
    }


    public function register(userFormRequest $request)
    {
        $data = $request->validated();
       $new =User::query()->create($data);

        return message::success(userResource::make($new),'user registered successfully');

    }

    public function login(loginRequest $request)
    {
        // Fix typo in 'credentials' variable
        $credentials = ['email' => request('email'), 'password' => request('password')];

        // Check if authentication is successful
        if (auth()->attempt($credentials)) {
            $user = auth()->user();

            // Correct the typo to 'plainTextToken'
            $token = $user->createToken('password')->plainTextToken;

            // Add the token to the user's data
            $data['token'] = $token;

            // Return a success message with the token
            return message::success(userResource::make($user), 'You have logged in successfully.', $token);
        }

        // Return an error message if credentials are incorrect
        return message::error('Email or password is not correct', 400);
    }

    public function update_user(Request  $request, string $id)
    {
        // Retrieve the validated data

        $data = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'nullable|string',
        ]);


        // Find the user by ID
        $user = User::query()->findOrFail($id);


        // Update the user's details
       $newUser= $user->update($data);

        // Redirect back with a success message
        return message::success(userResource::make($newUser),'user updated successfully');
    }

    public  function  delete_user(Request $request,string $id){
        $user=User::query()->findOrFail($id);
        $user->delete();
        return message::success(null,'user deleted successfully');

    }
    public function show($id){
        $user=User::query()->findOrFail($id);
        return message::success(userResource::make($user),'this is the user');


    }
    public function logout(){
        Auth::logout();
        return message::success(null,'logout successfully');
    }
}
