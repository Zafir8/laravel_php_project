<x-app-layout>
    <div class="container mx-auto py-12">
        <div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-3xl font-bold mb-6 text-center">Checkout</h2>
            <div class="mb-6 text-center">
                <p class="text-lg text-gray-700">You have selected the <span class="font-semibold">{{ $plan->name }}</span> plan.</p>
                <p class="text-lg text-gray-700">The total cost is <span class="font-semibold">{{ $plan->price }} LKR</span>.</p>
            </div>
            <form id="payment-form" action="{{ route('payment.process', ['plan' => $plan->id]) }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label for="payment_method" class="block text-sm font-medium text-gray-700">Payment Method</label>
                    <select id="payment_method" name="payment_method" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        <option value="card">Card</option>
                        <option value="paypal">PayPal</option>
                    </select>
                </div>
                <div id="card-details">
                    <div>
                        <label for="card_number" class="block text-sm font-medium text-gray-700">Card Number</label>
                        <input type="text" name="card_number" id="card_number" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        <p id="card_number_error" class="text-red-500 text-xs mt-1"></p>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label for="expiration_date" class="block text-sm font-medium text-gray-700">Expiration Date</label>
                            <input type="text" name="expiration_date" id="expiration_date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="MM/YY">
                            <p id="expiration_date_error" class="text-red-500 text-xs mt-1"></p>
                        </div>
                        <div>
                            <label for="cvc" class="block text-sm font-medium text-gray-700">CVC</label>
                            <input type="text" name="cvc" id="cvc" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            <p id="cvc_error" class="text-red-500 text-xs mt-1"></p>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Complete Payment</button>
                </div>
                <div class="mt-6 text-center text-sm text-gray-600">
                    <p><i class="fas fa-lock"></i> Your payment is secure and encrypted.</p>
                </div>
            </form>
            <div class="text-center mt-6">
                <form action="{{ route('paypal.createOrder', ['plan' => $plan->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">Proceed with PayPal</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('payment_method').addEventListener('change', function () {
            if (this.value === 'paypal') {
                document.getElementById('card-details').style.display = 'none';
            } else {
                document.getElementById('card-details').style.display = 'block';
            }
        });

        document.getElementById('payment-form').addEventListener('submit', function(event) {
            let isValid = true;

            // Validate Card Number
            const cardNumber = document.getElementById('card_number').value;
            const cardNumberError = document.getElementById('card_number_error');
            if (!/^\d{16}$/.test(cardNumber)) {
                cardNumberError.textContent = 'Please enter a valid 16-digit card number.';
                isValid = false;
            } else {
                cardNumberError.textContent = '';
            }

            // Validate Expiration Date
            const expirationDate = document.getElementById('expiration_date').value;
            const expirationDateError = document.getElementById('expiration_date_error');
            if (!/^\d{2}\/\d{2}$/.test(expirationDate)) {
                expirationDateError.textContent = 'Please enter a valid expiration date in MM/YY format.';
                isValid = false;
            } else {
                expirationDateError.textContent = '';
            }

            // Validate CVC
            const cvc = document.getElementById('cvc').value;
            const cvcError = document.getElementById('cvc_error');
            if (!/^\d{3,4}$/.test(cvc)) {
                cvcError.textContent = 'Please enter a valid 3 or 4-digit CVC.';
                isValid = false;
            } else {
                cvcError.textContent = '';
            }

            if (!isValid) {
                event.preventDefault();
            }
        });
    </script>
</x-app-layout>
