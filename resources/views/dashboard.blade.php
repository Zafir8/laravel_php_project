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

        <div>
            <h3 class="text-xl font-bold mb-4">Your Subscriptions</h3>
            @if($subscriptions->isEmpty())
                <p class="text-gray-600">You have no active subscriptions.</p>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($subscriptions as $subscription)
                        <div class="bg-white shadow-md rounded-lg p-6">
                            <h4 class="text-lg font-semibold mb-2 text-indigo-600">{{ $subscription->plan->name }}</h4>
                            <p class="text-sm text-gray-600">
                                <strong>Price:</strong> {{ $subscription->price }} LKR
                            </p>
                            <p class="text-sm text-gray-600">
                                <strong>Purchase Date:</strong> {{ $subscription->purchase_date->format('d M Y') }}
                            </p>
                            <p class="text-sm text-gray-600">
                                <strong>Renewal Date:</strong> {{ $subscription->renewal_date->format('d M Y') }}
                            </p>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
