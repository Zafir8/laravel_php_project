<x-app-layout>
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ShiftMe</title>
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

</head>
<body class="bg-gray-100">
    <h1 class="text-4xl font-bold my-8 ml-5">ShiftMe</h1>
    <div class="flex flex-wrap md:flex-nowrap"> <!-- Use md:flex-nowrap to prevent wrap on medium devices and up -->
        <div class="w-full md:w-1/2"> <!-- Take up full width on small screens, half width on medium screens and up -->
            <img class="mx-auto md:mx-0" src="{{ asset('images/Bus.png') }}" alt="Bus"> <!-- Center on small screens, align left on medium screens and up -->
        </div>
        <div class="w-full md:w-1/2 flex justify-center md:justify-start items-center"> <!-- Center content on small screens, align left on medium screens and up -->
            <div class="text-center md:text-left"> <!-- Center text on small screens, align left on medium screens and up -->
                <h2 class="text-2xl font-semibold ml-20">Ride safe with ease!</h2>
                <p class="my-2 ml-20">Book a ride with ShiftMe and get to school on time.</p>
                <br>
                <a  href="#book-a-ride" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full  ml-20">Book a ride</a>

            </div>
        </div>
    </div>
</body>

</body>
</html>


</x-app-layout>
