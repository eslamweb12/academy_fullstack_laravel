<?php

namespace App\Http\Controllers\Api;

use App\action\message;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Http\Resources\contactResource;
use App\Models\contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index(){
        $contacts=contact::query()->orderBy('id','desc')->with('user')->get();
        return message::success(contactResource::collection($contacts),'user registered successfully');
    }
    public function contact(ContactRequest $request){
        $data=$request->validated();
        $data['user_id']=Auth::user()->id;
     $contact=   Contact::create($data);
        return message::success(contactResource::make($contact),'you message creared successfully successfully');


    }
}
