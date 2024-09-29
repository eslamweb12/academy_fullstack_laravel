<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\userFormRequest;
use App\Models\User;
use App\Repositry\userRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private $repo;
    public function __construct(userRepository $repo){
        $this->repo = $repo;

    }
    public function index(){
       $users=User::query()->orderBy('id','desc')->get();
       return view('dashboard.manageUser',compact('users'));
    }

   public function register(userFormRequest $request){
       $data = $request->validated();
   return    $this->repo->createUser($data);

   }
   public function login(userFormRequest $request){
        $data = $request->validated();
        return $this->repo->Log_in($data);

   }
    public function update_user(Request  $request, string $id)
    {
        // Retrieve the validated data

        $data = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'nullable|string',
        ]);


        // Find the user by ID
        $user = User::findOrFail($id);


        // Update the user's details
        $user->update($data);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'User updated successfully');
    }

   public  function  delete_user(Request $request,string $id){
        $user=User::query()->findOrFail($id);
        $user->delete();
       return redirect()->back()->with('delete', 'User delete successfully');

   }
   public function show($id){
        $user=User::query()->findOrFail($id);
        return view('dashboard.editUser',compact('user'));


   }
   public function logout(){
        Auth::logout();
        return redirect()->route('welcome');
   }
}
