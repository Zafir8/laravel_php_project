<x-app-layout>
    <div class="container mx-auto py-12">
        <h2 class="text-2xl font-bold mb-6">Admin Dashboard</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
            <div class="bg-blue-500 shadow-md rounded-lg p-6 text-center text-white">
                <h3 class="text-lg font-semibold">Total Registered Users</h3>
                <p class="text-3xl font-bold">{{ $totalUsers }}</p>
            </div>
            <div class="bg-green-500 shadow-md rounded-lg p-6 text-center text-white">
                <h3 class="text-lg font-semibold">Total Subscribed Users</h3>
                <p class="text-3xl font-bold">{{ $subscribedUsers }}</p>
            </div>
            <div class="bg-red-500 shadow-md rounded-lg p-6 text-center text-white">
                <h3 class="text-lg font-semibold">Total Rides</h3>
                <p class="text-3xl font-bold">{{ $totalRides }}</p>
            </div>
            <div class="bg-yellow-500 shadow-md rounded-lg p-6 text-center text-white">
                <h3 class="text-lg font-semibold">Canceled Rides</h3>
                <p class="text-3xl font-bold">{{ $canceledRides }}</p>
            </div>
        </div>

        <div class="mb-12">
            <canvas id="ridesChart" width="400" height="200"></canvas>
        </div>

        <div class="mb-12">
            <canvas id="revenueChart" width="400" height="200"></canvas>
        </div>

        <h3 class="text-xl font-bold mb-6">Customer Details</h3>
        <div class="overflow-x-auto mb-12">
            <table class="min-w-full bg-white shadow-md rounded-lg">
                <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="py-3 px-4">Name</th>
                    <th class="py-3 px-4">Email</th>
                    <th class="py-3 px-4">Plan</th>
                    <th class="py-3 px-4">Price</th>
                    <th class="py-3 px-4">Purchase Date</th>
                    <th class="py-3 px-4">Renewal Date</th>
                </tr>
                </thead>
                <tbody>
                @foreach($subscriptions as $subscription)
                    <tr class="bg-gray-50 border-b hover:bg-gray-100">
                        <td class="py-3 px-4">{{ $subscription->user_name }}</td>
                        <td class="py-3 px-4">{{ $subscription->user_email }}</td>
                        <td class="py-3 px-4">{{ $subscription->plan->name }}</td>
                        <td class="py-3 px-4">{{ $subscription->price }} LKR</td>
                        <td class="py-3 px-4">{{ $subscription->purchase_date->format('d M Y') }}</td>
                        <td class="py-3 px-4">{{ $subscription->renewal_date->format('d M Y') }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <h3 class="text-xl font-bold mb-6">Ride Details</h3>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg">
                <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="py-3 px-4">Driver Name</th>
                    <th class="py-3 px-4">Vehicle Number</th>
                    <th class="py-3 px-4">User Name</th>
                    <th class="py-3 px-4">Location</th>
                    <th class="py-3 px-4">Amount</th>
                    <th class="py-3 px-4">Pickup Location</th>
                    <th class="py-3 px-4">Pickup Time</th>
                    <th class="py-3 px-4">Date</th>
                    <th class="py-3 px-4">Status</th> <!-- Add this column for status -->
                </tr>
                </thead>
                <tbody>
                @foreach($rides as $ride)
                    <tr class="bg-gray-50 border-b hover:bg-gray-100">
                        <td class="py-3 px-4">{{ $ride->driver?->name }}</td>
                        <td class="py-3 px-4">{{ $ride->vehicle?->number }}</td>
                        <td class="py-3 px-4">{{ $ride->user?->name }}</td>
                        <td class="py-3 px-4">{{ $ride->location }}</td>
                        <td class="py-3 px-4">{{ $ride->amount }} LKR</td>
                        <td class="py-3 px-4">{{ $ride->pickup_location }}</td>
                        <td class="py-3 px-4">{{ \Carbon\Carbon::parse($ride->pickup_time)->format('d M Y, h:i A') }}</td>
                        <td class="py-3 px-4">{{ \Carbon\Carbon::parse($ride->created_at)->format('d M Y, h:i A') }}</td>
                        <td class="py-3 px-4">{{ ucfirst($ride->status) }}</td> <!-- Display status here -->
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var ctxRides = document.getElementById('ridesChart').getContext('2d');
            var ctxRevenue = document.getElementById('revenueChart').getContext('2d');

            const rideMonths = @json($rideMonths);
            const rideCounts = @json(array_values($rideCounts));
            const revenueMonths = @json($revenueMonths);
            const revenueData = @json(array_values($revenueData));

            console.log("Ride Months:", rideMonths);
            console.log("Ride Counts:", rideCounts);
            console.log("Revenue Months:", revenueMonths);
            console.log("Revenue Data:", revenueData);

            var ridesChart = new Chart(ctxRides, {
                type: 'bar',
                data: {
                    labels: rideMonths,
                    datasets: [{
                        label: 'Number of Rides',
                        data: rideCounts,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            var revenueChart = new Chart(ctxRevenue, {
                type: 'bar',
                data: {
                    labels: revenueMonths,
                    datasets: [{
                        label: 'Revenue (LKR)',
                        data: revenueData,
                        backgroundColor: 'rgba(153, 102, 255, 0.2)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>

</x-app-layout>
