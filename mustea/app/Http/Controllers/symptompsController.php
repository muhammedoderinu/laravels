<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class symptompsController extends Controller
{

    public function index(){
        return view('symptomps');
    }

    public function store(Request $request){

       

        $this->validate($request,[
            'fever' =>'required',
            'diarrohea' =>'required',
            'vomitting' =>'required',
         

        ]);

        $fever=$request->input('fever');
        $diarrohea=$request->input('diarrohea');
        $vomitting=$request->input('vomitting');

       //$data = json_decode(json_encode($symptomps), true);

      // if(in_array('fever', $request->get('symptomps'))){
        //$fever = $data[0];
        session(['fever' => $fever]);
    
        //}

        //if(in_array('diarrohea', $request->get('symptomps'))){
           // $diarrohea = $data[1];
            session(['diarrohea' => $diarrohea]);
            
       // }

        
        //if(in_array('vomitting', $request->get('symptomps'))){
            //$vomitting = $data[2];
            session(['vomitting' => $vomitting]);
            
       // }


       
      

      
      
       
       
       

       

        

       


        
            return redirect('dashboard');


        
    }


   

    //
}
