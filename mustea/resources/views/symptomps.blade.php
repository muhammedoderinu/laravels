@extends('layout.app')

@section('content')

<div class="flex justify-center">
    <div class="w-4/12 bg-white p-6 -rounded-lg">

<form action="/symptomps" method="post">
        @csrf

        @error('fever')
        <div class="text-red-500 mt-2 text-sm">
        All fields are required
        @endif





       

        <label class="w-full  flex items-center bg-blue-300 p-4 rounded-lg mb-6 text-white text-center" >What are your symptomps</label><br/>

        <div class="flex justify-between bg-gray-100 p-6 mb-6">

       


        <div  class="mb-4 bg-gray-100 text-blue-700 ">
        <input type="checkbox" name="fever" class ="bg-gray-100  form-checkbox" 
        value="fever"> Fever 
        </div>


        </div>

        <div class="flex justify-between bg-gray-100 p-6 mb-6">

        <div  class="mb-4 bg-gray-100 text-blue-700 ">
        <input type="checkbox" name="diarrohea" class ="bg-gray-100  form-checkbox" 
        value="diarrohea"> diarrohea
        </div>



    </div>

    <div class="flex justify-between bg-gray-100 p-6 mb-6">

        <div  class="mb-4 bg-gray-100 text-blue-700 ">
        <input type="checkbox" name="vomitting" class ="bg-gray-100  form-checkbox" 
        value="Vomitting"> Vomitting
        </div>

       
    </div>

        
        <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded
             font-medium w-full">Next</button>
        </div>
    </form>

    </div>
    </div>
</div>

@endsection