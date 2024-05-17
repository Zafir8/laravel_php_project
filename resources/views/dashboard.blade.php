<x-app-layout>
    <div class="container mx-auto py-12">
        <h2 class="text-2xl font-bold mb-6">Dashboard</h2>
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1 1 0 11-1.414-1.414L10 8.586 7.066 11.12a1 1 0 11-1.414-1.414l3-3a1 1 0 011.414 0l3 3a 1 1 0 010 1.414l-3 3a1 1 0 01-1.414 0L7.12 10.86l2.535 2.536a1 1 0 001.414 0l3.278 3.278z"/></svg>
                </span>
            </div>
        @endif

        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Your Subscriptions</h3>
            </div>
            <div class="border-t border-gray-200">
                @if($subscriptions->isEmpty())
                    <div class="px-4 py-5 sm:p-6">
                        <p>You have no active subscriptions.</p>
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
