<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RepeatController extends Controller
{
    public function main(){
     return view('main');
    }

    public function about(){
        return view('about');
       }

       public function service(){
        return view('service');
       }

       public function project(){
        return view('project');
       }
       public function blog(){
        return view('blog');
       }

       public function single(){
        return view('single');
       }

       public function contact(){
        return view('contact');
       }
    
}
