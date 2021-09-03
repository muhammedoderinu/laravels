<?php

namespace App\Http\Controllers;

use App\Models\patient;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    public function index(){

        $id = session('sel');


        $empData['data'] = patient::orderby("loc","asc")
        ->select('id','loc','firstname','lastname','phonenumber')
        ->where('loc',$id)
        ->get();

        $data = json_decode(json_encode($empData), true);

        //dd($data);

        return view('form')->with('empDatas',$empData); 
    
    }


    public function getForm(Request $request){


        
            

       
     //return response()->json($empData);


    }
}
