<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\regions;
use App\Models\lgas;

class PrintFilterController extends Controller
{
    public function index(){

        $departments['data'] = lgas::orderby("locals","asc")
        ->select('id','locals')
        ->get();

        

    // Load index view
    return view('filterpage')->with('departments',$departments); 


        
    }

    public function getForm($id){


        $empData['data'] = regions::orderby("location","asc")
        ->select('id','location')
        ->where('locationId',$id)
        ->get();

         return response()->json($empData);
         //return ('i');

    }

    public function store(Request $request){

        $this->validate($request,[
            'lga' =>'required',
           

        ]);

        $id=$request->input('sel');

        session(['sel' => $id]);

        // collect the filter result

        // Query the database with the filter result

        return redirect('/form');
    }
}
