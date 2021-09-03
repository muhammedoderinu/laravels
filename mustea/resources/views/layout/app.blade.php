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
            <a href="/login" class="p-3">Admin</a>
        </li>
        <li>
            <a href="/symptomps" class="p-3">Home</a>
        </li>
        
        

        </ul>

        <ul class="flex item-center">

        
        @auth
        <li>
            <a href="/register" class="p-3">Register</a>
        </li>

        <li>
            <a href="{{route('logout')}}" class="p-3">Log out</a>
        </li>


        <li>
            <a href="/login" class="p-3">Log in</a>
        </li>
        @endauth

        </ul>


       </nav>

      

           @yield('content')

       </body>

  
</html>