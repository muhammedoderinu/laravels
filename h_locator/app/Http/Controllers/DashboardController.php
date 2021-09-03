<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\flights;
use App\Models\hloc;
use App\Models\hospitals;

class DashboardController extends Controller
{
     public function index(){

        $departments['data'] = flights::orderby("lga","asc")
         ->select('id','lga')
         ->get();

        
     return view('dashboard')->with('departments',$departments); 

        
     }

     public function get_hospital($id){

        $empData['data'] = hospitals::orderby("name","asc")
        ->select('id','name')
        ->where('hId',$id)
        ->get();


        return response()->json($empData);
     }
}
