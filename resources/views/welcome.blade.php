<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;400;500;600;700;800;900&family=Poppins:wght@100;300;400;500;600;700;800;900&family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">  

        <style>
            body {
                font-family: 'Poppins', sans-serif;
            }

            *{
                border: 1px solid red;
            }
        </style>
    </head>
    <body class="antialiased">
        <div id="app" class="relative flex items-top justify-center min-h-screen sm:items-center py-4 sm:pt-0 bg-red-200">

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center sm:justify-start sm:pt-0">
                    <dashboard></dashboard>
                </div>
            </div>
        </div>
        
    <script src="js/app.js"></script>
    </body>
</html>
