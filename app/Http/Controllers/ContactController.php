<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index(){
        $contacts=contact::query()->orderBy('id','desc')->with('user')->get();
        return view('dashboard.contact',compact('contacts'));
    }
    public function contact(ContactRequest $request){
        $data=$request->validated();
        $data['user_id']=Auth::user()->id;
        Contact::create($data);
        return redirect()->back()->with('success','we will contact you soon');


    }
}
