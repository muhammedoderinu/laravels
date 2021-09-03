@extends('layout.app')

@section('content')


<form action='/filterpage' method="post">
<div class="w-4/12 m-5">
        @csrf

        <div>
            <label class=" text-black  py-3 rounded
             font-medium w-2/12">Filter</button>
        </div>
    

    <div class="mb-4 " >
     <select id='lga' name='lga'
      class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('sel_depart')  
         border-red-500 @enderror">
      <option value='0'>-- Select Local Government--</option>

      @foreach($departments['data'] as $department)
        <option value='{{ $department->id }}'>{{ $department->locals }}</option>
      @endforeach

      

   </select>

</div>

  

   <div class="mb-4 " >
     <select id='sel' name='sel'
      class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('sel_depart')  
         border-red-500 @enderror">
      <option value='0'>-- Region --</option>

      

   </select>


  
   

   </div>
</div>

<div class="flex mt-10 justify-right">
            <button type="submit" class="bg-blue-500 text-white px-4 py-3 ml-5 rounded
             font-medium w-4/12">Print Slip</button>
        </div>

</form>


<script type='text/javascript'>
    
    $(document).ready(function(){
 
      
 
       // Region Change
       $('#lga').change(function(){

   
 
        
 
         
          console.log( "ready!" );
         
 
 
          // Department id
          var id = $(this).val();
 
          
 
         
 
          // Empty the dropdown
          $('#sel').find('option').not(':first').remove();
 
          // AJAX request 
          $.ajax({
            url: 'getForm/'+id,
            type: 'get',
            dataType: 'json',
 
            success: function(response){
               
             
 
              var len = 0;
              if(response['data'] != null){
                 len = response['data'].length;
                
              }
 
              if(len > 0){
               
                 // Read data and create <option >
                 for(var i=0; i<len; i++){
 
                    var id = response['data'][i].id;
                    var name = response['data'][i].location;

                    $("#sel").html(name); 
                       
 
                   
 
                    var option = "<option value='"+name+"'>"+name+"</option>";
 
                    $("#sel").append(option); 
                 }
              }
 
            }
          });
       });
 
            
 
    });
   
    </script>

   @endsection