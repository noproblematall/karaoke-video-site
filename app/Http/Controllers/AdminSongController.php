<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminSongController extends Controller
{
    public function __consturct()
    {

    }

    public function index()
    {
        // session()->put('status','Welcome');
        return view('admin.dashboard');
    }
    public function play_karaoke()
    {
        return view('admin.play_karaoke');
    }
    public function play_song()
    {
        return view('admin.play_song');
    }
    
    public function ads()
    {
        return view('admin.ads');
    }
    public function analytics()
    {
        return view('admin.analytics');
    }
    public function mediamanager()
    {
        return view('admin.mediamanager');
    }
    public function messages()
    {
        return view('admin.messages');
    }
    
    public function song_edit()
    {
        return view('admin.song_edit');
    }
    
}
