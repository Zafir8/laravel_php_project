<x-app-layout>
    <div class="container mx-auto py-12">
        <h2 class="text-2xl font-bold mb-4">Payment</h2>
        <form action="{{ route('payment.process') }}" method="POST">
            @csrf
            <input type="hidden" name="subscriber_id" value="{{ $subscriber->id }}">
            <div class="mb-4">
                <label for="card_number" class="block text-sm font-medium text-gray-700">Card Number</label>
                <input type="tel" pattern="[0-9]{13,19}" inputmode="numeric" name="card_number" id="card_number" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>
            <div class="mb-4">
                <label for="expiration_date" class="block text-sm font-medium text-gray-700">Expiration Date</label>
                <input type="month" name="expiration_date" id="expiration_date" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>
            <div class="mb-4">
                <label for="cvc" class="block text-sm font-medium text-gray-700">CVC</label>
                <input type="tel" pattern="\d{3,4}" inputmode="numeric" name="cvc" id="cvc" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                Complete Payment
            </button>
        </form>
    </div>
</x-app-layout>

