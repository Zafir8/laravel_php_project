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
<body class="bg-white py-24 sm:py-32">
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
        <div class="bg-white py-24 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
              <div class="mx-auto max-w-2xl sm:text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Simple pricing</h2>
              </div>
              <div class="mx-auto mt-16 max-w-2xl rounded-3xl ring-1 ring-gray-200 sm:mt-20 lg:mx-0 lg:flex lg:max-w-none">
                <div class="p-8 sm:p-10 lg:flex-auto">
                  <h3 class="text-2xl font-bold tracking-tight text-gray-900">Subscription</h3>
                    <p class="mt-4 text-lg text-gray-500">Pay a fix charge for a subscription as you go.</p>
                  <div class="mt-10 flex items-center gap-x-4">
                    <h4 class="flex-none text-sm font-semibold leading-6 text-indigo-600">What’s included</h4>
                    <div class="h-px flex-auto bg-gray-100"></div>
                  </div>
                  <ul role="list" class="mt-8 grid grid-cols-1 gap-4 text-sm leading-6 text-gray-600 sm:grid-cols-2 sm:gap-6">
                    <li class="flex gap-x-3">
                      <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                      </svg>
                      60 trips per month
                    </li>
                    <li class="flex gap-x-3">
                      <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                      </svg>
                      Child app access
                    </li>
                    <li class="flex gap-x-3">
                      <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                      </svg>
                        Parent app access
                    </li>
                    <li class="flex gap-x-3">
                      <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                      </svg>
                      Official mobile app
                    </li>
                  </ul>
                </div>
                <div class="-mt-2 p-2 lg:mt-0 lg:w-full lg:max-w-md lg:flex-shrink-0">
                  <div class="rounded-2xl bg-gray-50 py-10 text-center ring-1 ring-inset ring-gray-900/5 lg:flex lg:flex-col lg:justify-center lg:py-16">
                    <div class="mx-auto max-w-xs px-8">
                      <p class="text-base font-semibold text-gray-600">Pay once in every 30 date</p>
                      <p class="mt-6 flex items-baseline justify-center gap-x-2">
                        <span class="text-5xl font-bold tracking-tight text-gray-900">12500</span>
                        <span class="text-sm font-semibold leading-6 tracking-wide text-gray-600">LKR</span>
                      </p>
                      <a href="#" class="mt-10 block w-full rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Buy now</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </section>

    <section>
        <div class="bg-indigo-50 p-8">
            <div class="container mx-auto text-center">
                <h2 class="text-2xl font-bold mb-4">Subscribe to Our Offers</h2>
                <p class="mb-6">Get the latest updates and offers directly in your inbox.</p>
                <form action="YOUR_SUBSCRIPTION_ENDPOINT" method="POST" class="flex justify-center">
                    <input type="email" name="email" placeholder="Enter your email" required class="p-2 rounded-l-lg border border-gray-300">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold p-2 rounded-r-lg">Subscribe</button>
                </form>
            </div>
        </div>
    </section>

    <section>

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
