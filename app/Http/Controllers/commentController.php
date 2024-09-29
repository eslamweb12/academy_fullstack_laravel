<?php

namespace App\Http\Controllers;

use App\Http\Requests\commentRequest;
use App\Models\comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class commentController extends Controller
{
    public function index(){
        $data=comment::query()->with('user')->orderBy('id','desc')->get();
        return view('comments.create_comment',compact('data'));


    }
    public function store(commentRequest $request){
        $data=$request->validated();
        $data['user_id']=Auth::user()->id;
        comment::query()->create($data);
        return redirect()->back()->with('message','comment added successfully');

    }
    public function allCommentsForAdmin(){
        $data=comment::query()->with('user')->orderBy('id','desc')->get();
        return view('dashboard.comments.manageComments',compact('data'));
    }
    public  function edit($id){
        $data=comment::query()->with('user')->find($id);
        return view('dashboard.comments.edit_comment',compact('data'));

    }
    public function update(commentRequest $request,$id){
        $data=$request->validated();
        $new=comment::query()->findOrFail($id)->update($data);
        return redirect()->back()->with('message','comment updated successfully');




    }
    public function destroy($id)
    {
        $data=comment::query()->findOrFail($id)->delete();
        return redirect()->back()->with('message','comment deleted successfully');

    }
}
