<x-app-layout>
    <div class="bg-gray-100 py-12">
        <div class="max-w-4xl mx-auto px-4 py-8 bg-white rounded-lg shadow-md">
            <h1 class="text-3xl font-bold text-sky-700 mb-4">Contact Us</h1>
            <p class="text-gray-600 mb-6">We'd love to hear from you! Please fill out the form below to get in touch.</p>

            <!-- Flash Messages -->
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            <form method="POST" action="{{ route('contact.submit') }}">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Name</label>
                    <input type="text" id="name" name="name" class="mt-2 p-2 w-full border rounded" required>
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email</label>
                    <input type="email" id="email" name="email" class="mt-2 p-2 w-full border rounded" required>
                </div>

                <div class="mb-4">
                    <label for="message" class="block text-gray-700">Message</label>
                    <textarea id="message" name="message" class="mt-2 p-2 w-full border rounded" rows="5" required></textarea>
                </div>

                <button type="submit" class="bg-sky-700 text-white py-2 px-4 rounded hover:bg-sky-600">Send</button>
            </form>
        </div>
    </div>
</x-app-layout>
