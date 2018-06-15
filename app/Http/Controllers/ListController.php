<?php

namespace App\Http\Controllers;

use App\Freetime;
use App\Overtime;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function index(){

    	$overtimes=Overtime::where('active',1)->get();
    	$freetimes=Freetime::where('active',1)->get();
    	return view('list.index')->with(['overtimes'=>$overtimes, 'freetimes'=>$freetimes]);
    }
}
