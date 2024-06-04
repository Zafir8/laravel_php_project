<x-app-layout>
    <div class="container mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-3xl font-bold mb-6 text-center text-indigo-600">Driver Dashboard</h2>
            <div class="bg-white shadow-md rounded-lg p-6">
                <h3 class="text-2xl font-bold text-gray-900 mb-6">Your Rides</h3>
                @if($assignedRides->isEmpty())
                    <p class="text-gray-700">You have no upcoming rides.</p>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach($assignedRides as $ride)
                            <div class="bg-green-100 p-6 rounded-lg shadow-md">
                                <h4 class="text-xl font-semibold text-green-700">Your Passenger: {{ $ride->passenger?->name }}</h4>
                                <h4 class="text-xl font-semibold text-green-700">Ride to {{ $ride->location }}</h4>
                                <p class="text-sm text-gray-600 mt-2"><strong>Vehicle:</strong> {{ $ride->vehicleCategory->name }}</p>
                                <p class="text-sm text-gray-600 mt-2"><strong>Vehicle Number:</strong> {{ $ride->vehicle?->number }}</p>
                                <p class="text-sm text-gray-600 mt-2"><strong>Date:</strong> {{ \Carbon\Carbon::parse($ride->date)->format('d M Y, h:i A') }}</p>
                                <p class="text-sm text-gray-600 mt-2"><strong>Price:</strong> {{ $ride->amount }} LKR</p>
                                <p class="text-sm text-gray-600 mt-2"><strong>Pick Up Location:</strong> {{ $ride->pickup_location }}</p>
                                <p class="text-sm text-gray-600 mt-2"><strong>Pick Up date & time:</strong> {{ \Carbon\Carbon::parse($ride->pickup_time)->format('d M Y, h:i A') }}</p>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>