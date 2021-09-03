<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lga;
use App\Models\region;

class LgaController extends Controller
{
    public function index(){

       // Fetch departments
        $departments['data'] = lga::orderby("lga","asc")
            ->select('id','lga')
            ->get();

            dd($departments);
   
        // Load index view
        return view('dashboard',['departments'=>$departments]); 
      }
   
      // Fetch records
      public function getEmployees($departmentid=0){
   
        // Fetch Employees by Departmentid
        $empData['data'] = region::orderby("name","asc")
           ->select('id','name')
           ->where('lga',$departmentid)
           ->get();
   
        return response()->json($empData);
   
      }
    //
}
