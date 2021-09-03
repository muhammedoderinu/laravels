@extends('layout.app')

@section('content')


<div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">

<div class="mb-4">
     <select id='lga' name='lga'
      class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('sel_depart')  
         border-red-500 @enderror">
      <option value='0'>-- Select Local Government Area --</option>

       <!-- Read Departments -->
       @foreach($departments['data'] as $department)
        <option value='{{ $department->id }}'>{{ $department->lga }}</option>
      @endforeach

   </select>

</div>
        </div>

</div>

<div class="w-full" id="users"></div>


    




<script type='text/javascript'>
    
    $(document).ready(function(){

       
     
     console.log( "ready!" );
 
       // Region Change
       $('#lga').change(function(){
    
 
          // Department id
          var id = $(this).val();
 
          
 
         
 
          // Empty the dropdown
          $('#sel_emp').find('option').not(':first').remove();
        
 
          // AJAX request 
          $.ajax({
            url: 'get_hospital/'+id,
            type: 'get',
            dataType: 'json',
 
            success: function(response){

                
               
 
              var len = 0;
              if(response['data'] != null){
                 len = response['data'].length;
                 
                 
 
                
              }
              var output='';
 
              if(len > 0){
               
                 // Read data and create <option >
                 for(var i=0; i<len; i++){

                    

                    
                    var id = response['data'][i].id;
                    var name = response['data'][i].name;

                 output+=   
                '<div class= "flex w-full justify-between mt-20 ml-5">'+
                    '<div class= "bg-white w-1/2 h-1/5" >'+
                    '<img src="public/image.jpg" alt="my image" class=w-full>'+
                    '<ul>'+
                        '<li>Name:'+name+'</li>'+
                        '</ul>'
                        '</div>';
                 }

                 document.getElementById('users').innerHTML = output;

              }
              else{
               output+=   
                '<div class= "flex w-full justify-between mt-20 ml-5">'+
                    '<div class= "bg-white w-1/2 h-1/5" >'+
                    '<img src="public/image.jpg" alt="my image" class=w-full>'+
                    '<ul>'+
                        '<li>Name:'+''+'</li>'+
                        '</ul>'
                        '</div>';
                 

                 document.getElementById('users').innerHTML = output;
              }
 
            }
          });
       });
    });
   
    </script>

@endsection
