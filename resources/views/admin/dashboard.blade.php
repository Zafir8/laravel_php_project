<x-app-layout>
    <div class="container mx-auto py-12">
        <h2 class="text-2xl font-bold mb-6">Admin Dashboard</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
            <div class="bg-blue-500 shadow-md rounded-lg p-6 text-center text-white">
                <h3 class="text-lg font-semibold">Total Registered Users</h3>
                <p class="text-3xl font-bold">{{ $totalUsers }}</p>
            </div>
            <div class="bg-green-500 shadow-md rounded-lg p-6 text-center text-white">
                <h3 class="text-lg font-semibold">Total Subscribed Users</h3>
                <p class="text-3xl font-bold">{{ $subscribedUsers }}</p>
            </div>
        </div>

        <h3 class="text-xl font-bold mb-6">Customer Details</h3>
        <div class="overflow-x-auto">
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
    </div>
</x-app-layout>

