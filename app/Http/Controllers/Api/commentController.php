<?php

namespace App\Http\Controllers\Api;

use App\action\message;
use App\Http\Controllers\Controller;
use App\Http\Requests\commentRequest;
use App\Http\Resources\commentResource;
use App\Models\comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class commentController extends Controller
{
    public function index(){
        $data=comment::query()->with('user')->orderBy('id','desc')->get();
        return message::success(commentResource::collection($data),'all comments');


    }
    public function store(commentRequest $request){
        $data=$request->validated();
        $data['user_id']=Auth::user()->id;
       $new= comment::query()->create($data);
        return message::success(commentResource::make($new),'comment created successfully');

    }
    public function allCommentsForAdmin(){
        $data=comment::query()->with('user')->orderBy('id','desc')->get();
        return message::success(commentResource::collection($data),'all comments');
    }

    public function update(commentRequest $request,$id){
        $data=$request->validated();
        $new=comment::query()->findOrFail($id)->update($data);
        return message::success(commentResource::make($new),'comment updated successfully');




    }
    public function destroy($id)
    {
        $data=comment::query()->findOrFail($id)->delete();
      return message::success(commentResource::make($data),'comment deleted successfully');

    }
}
