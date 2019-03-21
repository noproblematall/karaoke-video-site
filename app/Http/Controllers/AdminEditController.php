<?php

namespace App\Http\Controllers;

use App\Karaoke_List;
use App\Queue_List;
use App\Super_Category;
use App\Normal_Category;

use Illuminate\Http\Request;

class AdminEditController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $super = new Super_Category();
        if($super->count()){
            $results = $super->select(['super_category_name','id'])->get();
        }
        return view('admin.karaoke_edit',compact('results'));
    }

    public function karaokeStore(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:karaoke_lists,title',
            'artist' => 'required',
            'code' => 'required',
            'cdgfile' => 'required',
            'mp3file' => 'required',
            'superselect' => 'required'
        ]);
        $allowedfileExtension1=['cdg'];
        $allowedfileExtension2=['mp3','ogg'];
        $extension1 = request()->cdgfile->getClientOriginalExtension();
        $extension2 = request()->mp3file->getClientOriginalExtension();
        $check1=in_array($extension1,$allowedfileExtension1);
        $check2=in_array($extension2,$allowedfileExtension2);
        if(!$check1){
            $errors = ['cdgfile' => 'The cdgfile must be a file of type: cdg.'];
            if(!$check2){
                $errors = ['cdgfile' => 'The cdgfile must be a file of type: cdg.','mp3file' => 'The mp3file must be a file of type: mp3,ogg.'];
                return back()->withInput($request->only('title','artist','code'))->withErrors($errors);
            }else{
                
                return back()->withInput($request->only('title','artist','code'))->withErrors($errors);
            }
            
        }
        if(Super_Category::find($request->get('superselect'))->normal_category()->count()){
            $errors = ['normalselect' => 'The normal category must be required.'];
            return back()->withInput($request->only('title','artist','code','superselect'))->withErrors($errors);
        }
        $karaoke = new Karaoke_List();        
        $karaoke->title = $request->title;
        $karaoke->artist = $request->artist;
        $karaoke->code = $request->code;
        $cdgname = $karaoke->title . '.' . request()->cdgfile->getClientOriginalExtension();
        $mp3name = $karaoke->title . '.' . request()->mp3file->getClientOriginalExtension();
        $request->cdgfile->storeAs('public/karaoke',$cdgname);
        $request->mp3file->storeAs('public/karaoke',$mp3name);
        $karaoke->cdgpath = 'storage/profile/' . $cdgname;
        $karaoke->mp3path = 'storage/profile/' . $mp3name;

        if(isset($request->normalselect) && $request->normalselect != ""){
            $karaoke->normal_category_id = $request->normalselect;
        }else{
            $karaoke->super_category_id = $request->superselect;
        }
        $karaoke->save();
        return back()->with('success','Your karaoke file has been successfully saved !');
    }

    public function findNormal(Request $request)
    {
        $super_id = $request->data;
        $data = Super_Category::find($super_id)->normal_category()->select('id','normal_category_name')->get();
        if(count($data)){
            echo json_encode($data);
        }else{
            echo json_encode('no');
        }        
    }
}
