<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Auth;
use App\Models\User;
use Toastr;
class ContactController extends Controller
{
   public function view(){

        $data['alldata'] = Contact::all();

    return view('admin.contact.view-contact',$data);
    }

    public function store(Request $request){
        $this->validate($request,[
            'address'=>'required',
            'email'=>'required',
            'mobile'=>'required',
            'phone'=>'required',

        ]);


        $data = new Contact();
        $data->address = $request->address;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->phone = $request->phone;

        $data->created_by = Auth::user()->id;


        $data->save();
         Toastr::success('  Contact Added Successfully','success');
        return back();
    }



        public function update(Request $request,$id){
            $data = Contact::find($id);

             $this->validate($request,[
            'address'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'mobile'=>'required',
            'map'=>'required',

        ]);

        $data->address = $request->address;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->mobile = $request->mobile;
        $data->map = $request->map;

        $data->save();
        Toastr::success('  Contact Updated Successfully','success');
        return back();

    }




}
