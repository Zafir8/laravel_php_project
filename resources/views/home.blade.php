<x-app-layout>
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>ShiftMe</title>
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


</head>
<body class="bg-white">
    {{-- give me the font style --}}
    <h1 class="text-4xl font-bold text-sky-700 my-8 ml-5 ">ShiftMe</h1>
    <div class="flex flex-wrap md:flex-nowrap"> <!-- Use md:flex-nowrap to prevent wrap on medium devices and up -->
        <div class="w-full md:w-1/2"> <!-- Take up full width on small screens, half width on medium screens and up -->
            <img class="mx-auto md:mx-0" src="{{ asset('images/bus.png') }}" alt="Bus"> <!-- Center on small screens, align left on medium screens and up -->
        </div>
        <div class="w-full md:w-1/2 flex justify-center md:justify-start items-center"> <!-- Center content on small screens, align left on medium screens and up -->
            <div class="text-center md:text-left"> <!-- Center text on small screens, align left on medium screens and up -->
                <h2 class="text-2xl font-semibold ml-20 mx-auto md:mx-0 text-sky-700">Ride safe with ease!</h2>
                <p class="my-2 ml-20 mx-auto md:mx-0">Book a ride with ShiftMe and get to school on time.</p>
                <br>
                <button type="button" class=" mx-auto md:mx-0 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline ml-20">
                    Book a ride
                </button>
            </div>
        </div>
    </div>

    <br>
    <section>
    <div class="flex flex-wrap justify-around bg-gray-200 ">
        <!-- Box 1 -->
        <div class="w-full md:w-1/4 p-4">
            <div class="border border-gray-200 rounded-lg hover:shadow-lg transition-shadow duration-300 bg-white">
                <img src="{{asset('images/safety.png')}}" alt="Image 1" class="w-full h-48 object-cover rounded-t-lg">
                <div class="p-4">
                    <h3 class="text-xl font-semibold mb-2 bg-white">Bus safety</h3>
                    <p>Our buses are equipped with safety features to ensure your child's safety.</p>
                </div>
            </div>
        </div>

        <!-- Box 2 -->
        <div class="w-full md:w-1/4 p-4">
            <div class="border border-gray-200 rounded-lg hover:shadow-lg transition-shadow duration-300 bg-white">
                <img src="{{asset('images/Parent.png')}}" alt="Image 2" class="w-full h-48 object-cover rounded-t-lg">
                <div class="p-4">
                    <h3 class="text-xl font-semibold mb-2">Parent full control</h3>
                    <p>Parents can track their child's bus location and get notified when they arrive at school.</p>
                </div>
            </div>
        </div>

        <!-- Box 3 -->
        <div class="w-full md:w-1/4 p-4">
            <div class="border border-gray-200 rounded-lg hover:shadow-lg transition-shadow duration-300 bg-white">
                <img src="{{asset('images/App.png')}}" alt="Image 3" class="w-full h-48 object-cover rounded-t-lg">
                <div class="p-4">
                    <h3 class="text-xl font-semibold mb-2">Easy to use</h3>
                    <p>Our app is easy to use and navigate. You can book a ride in just a few clicks.</p>
                </div>
            </div>
        </div>

        <!-- Box 4 -->
        <div class="w-full md:w-1/4 p-4">
            <div class="border border-gray-200 rounded-lg hover:shadow-lg transition-shadow duration-300 bg-white">
                <img src="{{asset('images/payment.png')}}" alt="Image 4" class="w-full h-48 object-cover rounded-t-lg">
                <div class="p-4">
                    <h3 class="text-xl font-semibold mb-2">Ride more, pay less</h3>
                    <p>Our prices are affordable for a subscription as you go with a fix charge.</p>
                </div>
            </div>
        </div>
    </div>


    </section>

    <section>
        <h2 class="text-2xl font-bold text-sky-700 my-8 text-center ">Available on </h2>
        <div class="flex justify-center items-center "> <!-- Container centered horizontally and vertically -->
            <img src="{{asset('images/appstore-playstore.png')}}" alt="Descriptive Alt Text" class="max-w-100px h-auto w-72 h-px "> <!-- Image will maintain its aspect ratio -->
        </div>
    </section>

    <footer class="bg-deep-blue text-white text-center p-4">
        <div class="container mx-auto">
            <p>&copy; 2024 ShiftMe. All rights reserved.</p>
            <div class="flex justify-center space-x-4 mt-2">
                <a href="#privacy-policy" class="hover:text-gray-300">Privacy Policy</a>
                <a href="#terms-of-service" class="hover:text-gray-300">Terms of Service</a>
                <a href="#contact-us" class="hover:text-gray-300">Contact Us</a>
            </div>
            <p class="mt-2">Follow us on social media</p>
            <div class="flex justify-center space-x-4 mt-2">
                <a href="your_facebook_link" class="hover:text-gray-300"><i class="fab fa-facebook-f"></i></a>
                <a href="your_twitter_link" class="hover:text-gray-300"><i class="fab fa-twitter"></i></a>
                <a href="your_instagram_link" class="hover:text-gray-300"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </footer>






</body>
</html>


</x-app-layout>
