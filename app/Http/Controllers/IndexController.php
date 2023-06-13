<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class IndexController extends Controller
{
    public function redirect(){
        
    }
    public function index(){
        return view('admin.index');
    }
 
}
