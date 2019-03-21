<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Super_Category;
use App\Normal_Category;
use App\Admin;

class AdminSettingController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $user = Auth::user();
        $user = array(
            'name' => $user->name,
            'email' => $user->email,
            'photo' =>$user->photo,
        );
        $super_model = new Super_Category();
        if($super_model->count()){
            $results = $super_model->select(['super_category_name','id'])->get();
            return view('admin.settings', ['results' => $results,'user' => $user]);
        }else{
            return view('admin.settings', compact('user'));
        }        
    }

    public function superStore(Request $request)
    {
        $this->validate($request, [
            'super'   => 'required|unique:super_categorys,super_category_name'
        ]);
        $super_category = $request->get('super');
        $super_model = new Super_Category();        
        $super_model->super_category_name = $super_category;
        $super_model->save();
        return back()->with('success','Your super category has been successfully saved');
    }

    public function normalStore(Request $request)
    {
        $this->validate($request, [
            'supersetting' => 'required',
            'normal' => 'required|unique:normal_categorys,normal_category_name'
        ]);
        $normal_category = $request->get('normal');
        $super_category_id = $request->get('supersetting');
        $normal_model = new Normal_Category();
        $normal_model->normal_category_name = $normal_category;
        $normal_model->super_category_id = $super_category_id;
        $normal_model->save();
        return back()->with('success','Your normal category has been successfully saved');
    }

    public function adminUpdate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
            'photo' => 'image|mimes:jpeg,png,jpg'
        ]);
        $user = Auth::user();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        if($request->hasfile('photo')){
            $fileName = time() . '.' . request()->photo->getClientOriginalExtension();
            $request->photo->storeAs('public/profile',$fileName);
            $user->photo = 'storage/profile/' . $fileName;
        }
        $user->save();
        return back()->with('success','Your profile has been successfully updated');
        
    }
}
