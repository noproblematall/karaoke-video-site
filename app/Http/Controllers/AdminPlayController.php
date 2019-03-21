<?php

namespace App\Http\Controllers;

use App\Karaoke_List;
use App\Queue_List;
use App\Super_Category;
use App\Normal_Category;

use Illuminate\Http\Request;

class AdminPlayController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        
    }

    public function searchView()
    {
        $super_model = new Super_Category();
        if($super_model->count()){
            $results = $super_model->select(['super_category_name','id'])->get();
            return view('admin.play_search', ['results' => $results]);
        }else{
            return view('admin.play_search');
        }    
    }

    public function findkaraoke(Request $request)
    {
        $target = $request->get('target');
        $targets = Karaoke_List::select('id','title')->where('title', 'like', '%'.$target.'%')->get();
        echo json_encode($targets);
    }

    public function addQueue(Request $request)
    {
        $exist = array();
        $karaoke_id = $request->get('multititle');
        if(!count($karaoke_id)){
            $errors = ['multititle' => 'Please select karaoke title you want.'];
            return back()->withErrors($errors);
        }else{
            foreach($karaoke_id as $id){
                if(Karaoke_List::find($id)->queue_list()->count()){
                    array_push($exist, $id);
                    continue;
                }
                $queue = new Queue_List();
                $queue->karaoke_list_id = $id;
                $queue->is_admin = 1;
                $queue->save();
            }
            if(count($exist)){
                return back()->with('warning','Your karaoke has been successfully saved into queue.But some karaoke is already saved by someone.');
            }else{
                return back()->with('success','Your karaoke has been successfully saved into queue');
            }
            
        }
    }

    public function addMultiQueue(Request $request)
    {
        $exist = array();
        $karaoke_id = $request->get('multiselect');
        if(!count($karaoke_id)){
            $errors = ['multiselect' => 'Please select karaoke title you want.'];
            return back()->withErrors($errors);
        }else{
            foreach($karaoke_id as $id){
                if(Karaoke_List::find($id)->queue_list()->count()){
                    array_push($exist, $id);
                    continue;
                }
                $queue = new Queue_List();
                $queue->karaoke_list_id = $id;
                $queue->is_admin = 1;
                $queue->save();
            }
            if(count($exist)){
                return back()->with('warning','Your karaoke has been successfully saved into queue.But some karaoke is already saved by someone.');
            }else{
                return back()->with('success','Your karaoke has been successfully saved into queue');
            }
        }
    }

    public function find(Request $request)
    {
        $super_category_id = $request->get('data');
        if(Super_Category::find($super_category_id)->normal_category()->count()){
            $normal_category_id = Super_Category::find($super_category_id)->normal_category()->select('id','normal_category_name')->get();
            echo json_encode(['normal',$normal_category_id]);
        }else{
            if(Super_Category::find($super_category_id)->karaoke_list()->count()){
                $karaoke = Super_Category::find($super_category_id)->karaoke_list()->select('title','id')->get();
                echo json_encode(['yes',$karaoke]);
            }else{
                echo json_encode(['no']);
            }
        }
        
    }

    public function findOnly(Request $request)
    {
        $normal_category_id = $request->get('data');        
        if(Normal_Category::find($normal_category_id)->karaoke_list()->count()){
            $karaoke = Normal_Category::find($normal_category_id)->karaoke_list()->select('id','title')->get();
            echo json_encode(['yes',$karaoke]);
        }else{
            echo json_encode(['no']);
        }
    }


}
