<x-app-layout>
    <div class="container mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-3xl font-bold mb-6 text-center text-indigo-600">Dashboard</h2>

            @if (Auth::user()->role === \App\Enums\Role::Admin)
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div class="p-6 bg-indigo-100 rounded-lg shadow-md text-center">
                        <h3 class="text-2xl font-bold text-indigo-700">Total Registered Users</h3>
                        <p class="text-4xl font-semibold text-indigo-900 mt-4">{{ $totalUsers }}</p>
                    </div>
                    <div class="p-6 bg-green-100 rounded-lg shadow-md text-center">
                        <h3 class="text-2xl font-bold text-green-700">Subscribed Users</h3>
                        <p class="text-4xl font-semibold text-green-900 mt-4">{{ $subscribedUsers }}</p>
                    </div>
                </div>

                <div class="bg-white shadow-md rounded-lg p-6">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">Customer Details</h3>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Plan</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Purchase Date</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Renewal Date</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($subscriptions as $subscription)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $subscription->user->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $subscription->user->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $subscription->plan->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ \Carbon\Carbon::parse($subscription->purchase_date)->format('d M Y') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ \Carbon\Carbon::parse($subscription->renewal_date)->format('d M Y') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @else
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
                                    <h4 class="text-xl font-semibold text-green-700">Ride to {{ $ride->location }}</h4>
                                    <p class="text-sm text-gray-600 mt-2"><strong>Vehicle:</strong> {{ $ride->vehicle->name }}</p>
                                    <p class="text-sm text-gray-600 mt-2"><strong>Date:</strong> {{ \Carbon\Carbon::parse($ride->date)->format('d M Y, h:i A') }}</p>
                                    <p class="text-sm text-gray-600 mt-2"><strong>Price:</strong> {{ $ride->price }} LKR</p>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endif
        </div>
    </div>
</x-app-layout>

