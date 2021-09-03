@extends('layout.app')

@section('content')
                  
              

    <div class="flex justify-center">
        <div class="w-1/3 bg-white p-6 rounded-lg">
        Patient Information
        <form action="/dashboard" method="post">

        @csrf
        <div class="mb-4">
        <label for="fname" class="sr-only">First name</label>
        <input type="text" name="fname" id="fname" placeholder="First name"
        class="bg-gray-100 border-2 w-full p-4 rounded-lg  @error('fname')
         border-red-500 @enderror" value="{{old('name')}}">

        @error('fname')
        <div class="text-red-500 mt-2 text-sm">
        {{$message}}

        </div>
        @endif
    </div>

    <div class="mb-4">
        <label for="lname" class="sr-only">Last name</label>
        <input type="text" name="lname" id="lname" placeholder="Last name"
        class="bg-gray-100 border-2 w-full p-4 rounded-lg  @error('lname')
         border-red-500 @enderror" value="{{old('name')}}">

        
         @error('lname')
        <div class="text-red-500 mt-2 text-sm">
        {{$message}}

        </div>
        @endif
    

    </div>
       
    <div class="mb-4">
        <label for="pnum" class="sr-only">Phone Number</label>
        <input type="text" name="pnum" id="pnum" placeholder="Phone Number"
        class="bg-gray-100 border-2 w-full p-4 rounded-lg  @error('pnum')
         border-red-500 @enderror" value="{{old('name')}}">
        
         @error('pnum')
        <div class="text-red-500 mt-2 text-sm">
        {{$message}}


        </div>
        @endif
    </div>  
     <!-- Department Dropdown -->
     <div class="mb-4">
     <select id='lga' name='lga'
      class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('sel_depart')  
         border-red-500 @enderror">
      <option value='0'>-- Select Local Government Area --</option>

      <!-- Read Departments -->
      @foreach($departments['data'] as $department)
        <option value='{{ $department->id }}'>{{ $department->locals }}</option>
      @endforeach

   </select>

   @error('lga')
        <div class="text-red-500 mt-2 text-sm">
        {{$message}}
        </div>
   
    @endif
    </div>
    



      <!-- create modal -->
      
     
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="fixed z-10 inset-0 invisible overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true" id="interestModal">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                
                            </div>
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                  Isolation Center
                                </h3>
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-isolation" name="modal-isolation" >
                                <option value='0'></option>
                                  
                                </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                   
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="submit" class=" openModal w-full inline-flex justify-center 
                    rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium
                     text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2
                      focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm" id = "openModal" >
                        Publish
                    </button>
                    <button type="button" class="closeModal mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white
                     text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 
                     sm:ml-3 sm:w-auto sm:text-sm" id="closeModal">
                        Cancel
                    </button>
                </div>
            </div>
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
            
            alert('Your has been sent successfully');

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

                   $('#interestModal').removeClass('invisible');

                        $("#modal-isolation").html(name); 
                       

                   var option = "<option value='"+name+"'>"+name+"</option>";

                  
                }
             }

           }
         });
      });

           

   });
  
   </script>

@endsection