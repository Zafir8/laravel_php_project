<x-app-layout>
    <div class="container mx-auto py-12">
        <h2 class="text-2xl font-bold mb-6">Admin Dashboard</h2>
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">All Subscriptions</h3>
            </div>
            <div class="border-t border-gray-200">
                @if($subscriptions->isEmpty())
                    <div class="px-4 py-5 sm:p-6">
                        <p>No subscriptions found.</p>
                    </div>
                @else
                    <ul role="list" class="divide-y divide-gray-200">
                        @foreach($subscriptions as $subscription)
                            <li>
                                <div class="px-4 py-4 sm:px-6">
                                    <div class="flex items-center justify-between">
                                        <div class="text-sm font-medium text-indigo-600 truncate">
                                            Plan: {{ $subscription->plan->name }}
                                        </div>
                                        <div class="ml-2 flex-shrink-0 flex">
                                            <p class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Active
                                            </p>
                                        </div>
                                    </div>
                                    <div class="mt-2 sm:flex sm:justify-between">
                                        <div class="sm:flex">
                                            <p class="flex items-center text-sm text-gray-500">
                                                Price: {{ $subscription->price }} LKR
                                            </p>
                                            <p class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0 sm:ml-6">
                                                Purchase Date: {{ $subscription->purchase_date->format('d M Y') }}
                                            </p>
                                            <p class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0 sm:ml-6">
                                                Renewal Date: {{ $subscription->renewal_date->format('d M Y') }}
                                            </p>
                                        </div>
                                        <div class="mt-2 sm:flex sm:justify-between">
                                            <div class="sm:flex">
                                                <p class="flex items-center text-sm text-gray-500">
                                                    User Name: {{ $subscription->user_name }}
                                                </p>
                                                <p class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0 sm:ml-6">
                                                    User Email: {{ $subscription->user_email }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
