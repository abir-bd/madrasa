<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use App\Models\Result;
use App\Models\Role;

class ResultController extends Controller
{
    public function view(){
        $data['alldata'] = Result::orderBy('id','DESC')->get();
        $data['roles'] = Role::get();
        $data['classes'] = StudentClass::get();
        return view('admin.result.view-result',$data);
        }

    public function store(){

    }
}
