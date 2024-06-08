<x-app-layout>
    <div class="container mx-auto py-12 px-4 sm:px-6 lg:px-8">
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

        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-3xl font-bold mb-6 text-center text-indigo-600">Student Dashboard</h2>
            <div class="bg-white shadow-md rounded-lg p-6">
                <h3 class="text-2xl font-bold text-gray-900 mb-6">Your Subscriptions</h3>
                @if($subscriptions->isEmpty())
                    <p class="text-gray-700">You have no active subscriptions.</p>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach($subscriptions as $subscription)
                            <div class="bg-indigo-100 p-6 rounded-lg shadow-md">
                                <h4 class="text-xl font-semibold text-indigo-700">{{ $subscription->plan->name }}</h4>
                                <p class="text-sm text-gray-600 mt-2"><strong>Price:</strong> {{ $subscription->price }} LKR</p>
                                <p class="text-sm text-gray-600 mt-2"><strong>Purchase Date:</strong> {{ \Carbon\Carbon::parse($subscription->purchase_date)->format('d M Y') }}</p>
                                <p class="text-sm text-gray-600 mt-2"><strong>Renewal Date:</strong> {{ \Carbon\Carbon::parse($subscription->renewal_date)->format('d M Y') }}</p>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="bg-white shadow-md rounded-lg p-6 mt-6">
                <h3 class="text-2xl font-bold text-gray-900 mb-6">Upcoming Rides</h3>
                @if($upcomingRides->isEmpty())
                    <p class="text-gray-700">You have no upcoming rides.</p>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach($upcomingRides as $ride)
                            <div class="bg-green-100 p-6 rounded-lg shadow-md">
                                <h4 class="text-xl font-semibold text-green-700">Your Driver: {{ $ride->driver?->name }}</h4>
                                <h4 class="text-xl font-semibold text-green-700">Ride to {{ $ride->location }}</h4>
                                <p class="text-sm text-gray-600 mt-2"><strong>Vehicle:</strong> {{ $ride->vehicleCategory->name }}</p>
                                <p class="text-sm text-gray-600 mt-2"><strong>Vehicle Number:</strong> {{ $ride->vehicle?->number }}</p>
                                <p class="text-sm text-gray-600 mt-2"><strong>Date:</strong> {{ \Carbon\Carbon::parse($ride->date)->format('d M Y, h:i A') }}</p>
                                <p class="text-sm text-gray-600 mt-2"><strong>Price:</strong> {{ $ride->amount }} LKR</p>
                                <p class="text-sm text-gray-600 mt-2"><strong>Pick Up Location:</strong> {{ $ride->pickup_location }}</p>
                                <p class="text-sm text-gray-600 mt-2"><strong>Pick Up date & time:</strong> {{ \Carbon\Carbon::parse($ride->pickup_time)->format('d M Y, h:i A') }}</p>
                                <form action="{{ route('student.cancel.ride', $ride->id) }}" method="POST" class="mt-4">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                        Cancel Ride
                                    </button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
