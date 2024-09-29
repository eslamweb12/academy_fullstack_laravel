<?php

namespace App\Http\Controllers;

use App\Http\Requests\materialRequest;
use App\Models\course;
use App\Models\material;
use Illuminate\Http\Request;

class materailCourse extends Controller
{
    public function create($id){




       return view('dashboard.material_courses.create_material',['course_id'=>$id]);







    }
    public  function store(materialRequest $request){
        $data=$request->validated();
        $data['course_id']=$request['course_id'];
        material::query()->create($data);
        return redirect()->back()->with('success','material created successfully');





    }
    public  function index()
    {
        $materials=material::query()->get();
        return view('dashboard.material_courses.index',['materials'=>$materials]);

    }
    public function edit($id){
        $material=material::query()->findOrFail($id);
        return view('dashboard.material_courses.edit_material',['material'=>$material]);
    }
    public function update(Request $request,$id){
        $material=material::query()->findOrFail($id);
       $data= $request->validate([
            'title'=>'required|string',
            'type'=>'required|string',
            'link'=>'required',
        ]);


        $material->update($data);
        return redirect()->back()->with('success','material updated successfully');

    }
    public function destroy($id)
    {
        $material=material::query()->findOrFail($id);
        $material->delete();
        return redirect()->back()->with('success','material deleted successfully');

    }

}
