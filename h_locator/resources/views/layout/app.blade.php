<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Laravel</title>

         <link rel="stylesheet" href="{{ asset('css/app.css')}}">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>


        </head>

        
        
       <body class="bg-gray-200">

       <nav class="p-6 bg-white flex justify-between mb-6">
      
    
        <ul class="flex item-center">
        

        <li>
            <a href="" class="p-3">Home</a>
        </li>
        <li>
            <a href="/dashboard" class="p-3">Dashboard</a>
        </li>
        
        

        </ul>

        <ul class="flex item-center">

        
       

        </ul>


       </nav>

      

           @yield('content')

       </body>

  
</html>