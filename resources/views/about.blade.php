<x-app-layout>
    <div class="bg-gray-100 py-12">
        <!-- Hero Section -->
        <div class="text-center py-8 px-4">
            <h1 class="text-4xl font-bold text-sky-700">About Shuttle Go</h1>
            <p class="mt-4 text-xl text-gray-600">Your trusted partner for safe and reliable school transportation.</p>
        </div>

        <!-- Vision & Mission Section -->
        <div class="max-w-4xl mx-auto px-4 py-8 grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Vision Card -->
            <div class="bg-white rounded-lg shadow-md p-6 flex flex-col items-center">
                <h2 class="text-lg font-bold text-sky-700">Our Vision</h2>
                <p class="text-center text-gray-600 mt-2">To transform school transportation into a safe, reliable, and enjoyable experience for all students.</p>
            </div>
            <!-- Mission Card -->
            <div class="bg-white rounded-lg shadow-md p-6 flex flex-col items-center">
                <h2 class="text-lg font-bold text-sky-700">Our Mission</h2>
                <p class="text-center text-gray-600 mt-2">To provide dependable and secure transportation solutions that parents trust and children love.</p>
            </div>
        </div>

        <!-- Safety Card Section -->
        <div class="max-w-4xl mx-auto px-4 py-8 grid grid-cols-1 md:grid-cols-3 gap-4">
            <!-- Card 1 -->
            <div class="bg-white rounded-lg shadow-md p-6 flex flex-col items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-500 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h3 class="text-lg font-bold text-sky-700">Background Checks</h3>
                <p class="text-center text-gray-600 mt-2">Every driver undergoes rigorous background checks to ensure your child's safety.</p>
            </div>
            <!-- Card 2 -->
            <div class="bg-white rounded-lg shadow-md p-6 flex flex-col items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-500 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2 2 0 0118 14h0a2 2 0 01-2-2V7h-1v5a2 2 0 01-2 2h0a2 2 0 01-1.595-.405L8 17h5m2 0v5m-2-5a2 2 0 002 2 2 2 0 002-2m-2-2a2 2 0 00-2 2 2 2 0 00-2-2m2 2V7"></path>
                </svg>
                <h3 class="text-lg font-bold text-sky-700">GPS Tracking</h3>
                <p class="text-center text-gray-600 mt-2">All vehicles are equipped with GPS tracking to monitor routes and ensure punctuality.</p>
            </div>
            <!-- Card 3 -->
            <div class="bg-white rounded-lg shadow-md p-6 flex flex-col items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-500 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h1m0 0h-1V9h1m2 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h3 class="text-lg font-bold text-sky-700">Safety Regulations</h3>
                <p class="text-center text-gray-600 mt-2">Strict adherence to all safety regulations to guarantee a secure environment for all riders.</p>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="text-center py-8 bg-white mx-auto max-w-4xl rounded-lg shadow-md p-6">
            <h2 class="text-3xl font-bold text-sky-700">Contact Us</h2>
            <form class="mt-4">
                <input type="text" placeholder="Your Name" class="block w-full p-2 border rounded mb-2" required>
                <input type="email" placeholder="Your Email" class="block w-full p-2 border rounded mb-2" required>
                <textarea placeholder="Your Message" class="block w-full p-2 border rounded mb-2" rows="4" required></textarea>
                <br>
                <button type="submit" class="bg-black text-white px-4 py-2 rounded hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-black focus:ring-opacity-50">Send Message</button>
            </form>
        </div>
        <!-- Location -->
        <div class="text-center py-8 bg-white mx-auto max-w-4xl rounded-lg shadow-md p-6">
            <h2 class="text-3xl font-bold text-sky-700">Our Location</h2>
            <p class="text-xl text-gray-600 mt-2">1234 colombo 04 Dark street, colombo, Sri lanka</p>

            <!-- Map and Directions -->
            <div class="mt-4 flex justify-center"> <!-- Flexbox container for centering the iframe -->
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31693.892628027485!2d-0.12548744999999998!3d51.5085302!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48761b3339b9f9b9%3A0x60efe7cc1d21da9c!2sLondon%2C%20UK!5e0!3m2!1sen!2sus!4v1629303524006!5m2!1sen!2sus"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <p class="text-gray-600 text-sm mt-2">Find us easily with the map above or visit us at the given address. We look forward to welcoming you.</p>

            <!-- Contact Information -->
            <div class="mt-4">
                <h3 class="text-2xl font-bold text-sky-700">Contact Information</h3>
                <p class="text-gray-600">Email: contact@shuttlego.com</p>
                <p class="text-gray-600">Phone: +123 456 7890</p>
            </div>
        </div>
    </div>
</x-app-layout>
