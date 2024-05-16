<x-app-layout>
    <div class="container mx-auto py-12">
        <div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-3xl font-bold mb-6 text-center">Checkout</h2>
            <div class="mb-6 text-center">
                <p class="text-lg text-gray-700">You have selected the <span class="font-semibold">{{ $plan->name }}</span> plan.</p>
                <p class="text-lg text-gray-700">The total cost is <span class="font-semibold">{{ $plan->price }} LKR</span>.</p>
            </div>
            <form action="{{ route('payment.process', ['plan' => $plan->id]) }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label for="card_number" class="block text-sm font-medium text-gray-700">Card Number</label>
                    <input type="text" name="card_number" id="card_number" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label for="expiration_date" class="block text-sm font-medium text-gray-700">Expiration Date</label>
                        <input type="text" name="expiration_date" id="expiration_date" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="MM/YY">
                    </div>
                    <div>
                        <label for="cvc" class="block text-sm font-medium text-gray-700">CVC</label>
                        <input type="text" name="cvc" id="cvc" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Complete Payment</button>
                </div>
                <div class="mt-6 text-center text-sm text-gray-600">
                    <p><i class="fas fa-lock"></i> Your payment is secure and encrypted.</p>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
