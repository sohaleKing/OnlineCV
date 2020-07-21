<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class CompanyController extends Controller
{
    public function index($id, Company $company){
        return view('company.index', compact('company'));
    }
    public function create(){
        return view('company.create');
    }
    public function store(Request $request){
        $this->validate($request, [
            'address' => 'required',
            'description' => 'required|min:20',
            'slogan' => 'required',
            'phone' => 'required|min:10|numeric',
            'website' => 'required',
        ]);
        $user_id = auth()->user()->id;
        Company::where('user_id',$user_id)->update([
          'address'=>request('address'),
          'phone'=>request('phone'),
          'description'=>request('description'),
          'website'=>request('website'),
          'slogan'=>request('solgan'),
        ]);
        return redirect()->back()->
        with('message','your Company Information Updated Successfully');
    }
    public function coverPhoto(Request $request){
        $this->validate($request, [
            'cover_photo' => 'required|mimes:jpg,png,jpeg|max:2048',
        ]);
       $user_id = auth()->user()->id;
       $cover = $request->file('cover_photo')
       ->store('public/files');
       Company::where('user_id', $user_id)->update([
            'cover_photo'=>$cover
       ]);
       return redirect()->back()->
        with('message','Cover Iamge Uploaded Successfully');
    }
    public function logo(Request $request){
         $this->validate($request, [
            'logo' => 'required|max:2048',
        ]);
         $user_id = auth()->user()->id;
         if($request->hasFile('logo')){
             $file = $request->file('logo');
             $text = $file->getClientOriginalExtension();
             $fileName = time().'.'.$text;
             $file->move('uploads/avatar', $fileName);
              Company::where('user_id', $user_id)->update([
            'logo'=>$fileName
             ]);
             return redirect()->back()->
        with('message','Logo changed Successfully');
         }
    }
}
