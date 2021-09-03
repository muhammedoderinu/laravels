<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lgas;
use App\Models\regions;
use App\models\User;
use App\Models\patient;

use Attribute;

class DashboardController extends Controller
{

  
    public function index(){

         // Fetch departments
         $departments['data'] = lgas::orderby("locals","asc")
         ->select('id','locals')
         ->get();

         

     // Load index view
     return view('dashboard')->with('departments',$departments); 

        
    }

    public function getEmployees($id=0){
        
        // Fetch Employees by Departmentid
        $empData['data'] = regions::orderby("location","asc")
           ->select('id','location')
           ->where('locationId',$id)
           ->get();

   
        return response()->json($empData);
   
    }

    

    public function store(Request $request){
        // store user info into session

        

        $this->validate($request,[
            'fname' =>'required',
            'lname' =>'required',
            'pnum' =>'required',
            'lga' => 'required',
           

        ]);

        $fname = $request->input('fname');
        $lname = $request->input('lname');
        $pnum = $request->input('pnum');
        $n_lga = $request->input('lga');
      

        $departments = lgas::orderby("locals","asc")
         ->select('locals')
         ->where('id',$n_lga)
         ->get();

         $jlga = json_decode(json_encode($departments), true);
            $lga = $jlga[0]["locals"];


            $empData = regions::orderby("location","asc")
            ->select('location')
            ->where('locationId',$n_lga)
            ->get();

            $jloc = json_decode(json_encode($empData), true);
            $location = $jloc[0]["location"];
 
    
         
         
        

            $data = $request->session('fname')->all();
            $pjlga = json_decode(json_encode($data), true);

            $fever = $pjlga["fever"];
            $diarrohea = $pjlga["diarrohea"];
            $vomitting=$pjlga["vomitting"];
    

       
            $datas=array("firstname"=>$fname,"lastname"=>$lname,"phonenumber"=>$pnum,"lga"=>$lga,
            "fever"=>$fever,"diarrohea"=>$diarrohea,
               "vomitting"=>$vomitting,
             "loc"=>$location );

            patient::create($datas);

       

        return redirect('/symptomps');
    }
    //
}
