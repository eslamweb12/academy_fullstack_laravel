<?php

namespace App\Http\Controllers\Api;

use App\action\message;
use App\Http\Controllers\Controller;
use App\Http\Requests\materialRequest;
use App\Http\Resources\materailResource;
use App\Models\material;
use Illuminate\Http\Request;

class materailCourse extends Controller
{

    public  function store(materialRequest $request){
        $data=$request->validated();
        $data['course_id']=$request['course_id'];
     $materail=   material::query()->create($data);
        return message::success(materailResource::make($materail),'materail created successfully');





    }
    public  function index()
    {
        $materials=material::query()->get();
        return message::success(materailResource::collection($materials),'all materails');

    }
    public function update(Request $request,$id){
        $material=material::query()->findOrFail($id);
        $data= $request->validate([
            'title'=>'required|string',
            'type'=>'required|string',
            'link'=>'required',
        ]);


      $new=  $material->update($data);
        return message::success(materailResource::make($new),'materail updated successfully');

    }
    public function destroy($id)
    {
        $material=material::query()->findOrFail($id);
        $material->delete();
        return message::success(null,'materail deletd successfully',null);

    }

}
