<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
class PagesController extends Controller
{
    public function login(){
      
        return "Login";
    }
    public function get_issues(){
        return "Get GIT issues";
        #return view('pages.git_issues');
    }
    public function create_issues(){

        return view('pages.gitcreate');
    }

    public function services(){
        $data = array('title'=>'services','services'=>['Web Design','Software Dev','Support','Networks']);
        return view('pages.services')->with($data);
    }
}
