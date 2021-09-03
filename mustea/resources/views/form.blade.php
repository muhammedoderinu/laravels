@extends('layout.app')


@section('content')

<div class=" flex justify-center">

    <div class="w-7/12  flex justify-between bg-white p-6 -rounded-lg">
    <h1 class='text-blue'>First name</h1>
    <br>
    <div class="">
    @foreach($empDatas['data'] as $empData)
        {{ $empData->firstname }}
      @endforeach

      </div>

      <h1 class='text-blue-500 '>Last name</h1>
      <div class="mt-5">
    @foreach($empDatas['data'] as $empData)
        {{ $empData->lastname }}
      @endforeach

      </div>
      <h1 class='text-blue-500 '>Phone number</h1>
      <div class="">
    @foreach($empDatas['data'] as $empData)
        {{ $empData->phonenumber }}
      @endforeach

      </div>

      <h1 class='text-blue-500 '>Region</h1>

      <div class="">
    @foreach($empDatas['data'] as $empData)
        {{ $empData->loc }}
      @endforeach

      </div>
    
</div>
</div>

 <!-- Script -->
   
 <script type='text/javascript'>
    
    $(document).ready(function(){
 
       $('#closeModal').click( function(e){
 
             $('#interestModal').addClass('invisible');
              });
 
              $('#openModal').click( function(e){
 
 $('#interestModal').addClass('invisible');
  });
        
             
           
    
 
       // Region Change
       $('#lga').change(function(){
 
        
 
          $('#interestModal').removeClass('invisible');
 
          console.log( "ready!" );
         
 
 
          // Department id
          var id = $(this).val();
 
          
 
         
 
          // Empty the dropdown
          $('#sel_emp').find('option').not(':first').remove();
 
          // AJAX request 
          $.ajax({
            url: 'getEmployees/'+id,
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
 
                   
                        
 
                    var option = "<option value='"+name+"'>"+name+"</option>";
 
                 }
              }
 
            }
          });
       });
 
            
 
    });
   
    </script>


@endsection