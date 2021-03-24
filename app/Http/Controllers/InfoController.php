<?php

namespace App\Http\Controllers;
use App\Models\Teacher;
use App\Models\Student;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    //

    public function index()
    {
        $teachers = Teacher::select('id','name')->get();
        return view('stuinfo',compact('teachers'));
    }

    public function getStudent($id)
    {
        DB::table('students')->where('id', '=', $id)->get();
    }

}
