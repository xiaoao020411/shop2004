<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student as StudentModel;

class StudentController extends Controller
{
    public function index(){
        return view('student.index');
    }
    public function save(Request $request){
        $data=$request->except('_token');
        $res = StudentModel::insert($data);
        if($res){
            return redirect('/list');
        }
    }
    public function list(){
        $StudentInfo = StudentModel::get();
        return view('student.list',['StudentInfo'=>$StudentInfo]);
    }
    public function destroy($id)
    {
        $res=StudentModel::destroy($id);
        if ($res) {
            return redirect('/list');
        }
    }
    public function edit($id)
    {
        $StudentInfo=StudentModel::find($id);
        return view('student.edit',['StudentInfo'=>$StudentInfo]);
    }
    public function update(Request $request, $id)
    {
        $data=$request->except('_token');
        
        $res=StudentModel::where('stu_id',$id)->update($data);
        if ($res!==false) {
            return redirect('/list');
        }
    }
}
