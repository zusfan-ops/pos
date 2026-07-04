<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>{{ config('app.name', 'POS UMKM') }} - Receipt #{{ $transaction->invoice_no }}</title>
    @vite(['resources/css/app.css'])
    <style>
        @media print {
            body { background: white !important; }
            .no-print { display: none !important; }
            .receipt-card { box-shadow: none !important; border: none !important; }
        }
        @media (max-width: 480px) {
            .receipt-card { border-radius: 0; margin: 0; max-width: 100%; }
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-100 print:bg-white">
    <div class="min-h-screen flex flex-col items-center py-4 sm:py-8 px-2">
        <button onclick="window.print()" class="no-print mb-4 bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-3 px-6 rounded-xl shadow-sm touch-btn">
            Print Receipt
        </button>

        <div class="receipt-card bg-white shadow-lg rounded-2xl w-full max-w-sm mx-auto p-6 sm:p-8">
            <div class="text-center border-b-2 border-dashed border-gray-200 pb-4 mb-4">
                <h1 class="text-xl font-bold text-gray-900">{{ config('app.name', 'POS UMKM') }}</h1>
                <p class="text-xs text-gray-500 mt-1">Invoice #{{ $transaction->invoice_no }}</p>
            </div>

            <div class="text-xs text-gray-600 space-y-1 mb-4">
                <div class="flex justify-between">
                    <span>Date</span>
                    <span class="font-medium">{{ $transaction->created_at->format('d M Y, H:i') }}</span>
                </div>
                <div class="flex justify-between">
                    <span>Cashier</span>
                    <span class="font-medium">{{ $transaction->user->name ?? 'N/A' }}</span>
                </div>
                @if($transaction->customer)
                <div class="flex justify-between">
                    <span>Customer</span>
                    <span class="font-medium">{{ $transaction->customer->name }}</span>
                </div>
                @endif
            </div>

            <table class="w-full text-xs mb-4">
                <thead>
                    <tr class="border-b border-gray-200">
                        <th class="text-left py-2 font-semibold text-gray-700">Item</th>
                        <th class="text-center py-2 font-semibold text-gray-700">Qty</th>
                        <th class="text-right py-2 font-semibold text-gray-700">Price</th>
                        <th class="text-right py-2 font-semibold text-gray-700">Subtotal</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($transaction->items as $item)
                    <tr>
                        <td class="py-2 text-gray-800">{{ $item->product->name ?? 'N/A' }}</td>
                        <td class="py-2 text-center text-gray-600">{{ $item->quantity }}</td>
                        <td class="py-2 text-right text-gray-600">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                        <td class="py-2 text-right font-medium text-gray-800">Rp {{ number_format($item->quantity * $item->price, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="border-t-2 border-dashed border-gray-200 pt-4 space-y-1 text-sm">
                <div class="flex justify-between text-gray-600">
                    <span>Total</span>
                    <span class="font-bold text-gray-900">Rp {{ number_format($transaction->total, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between text-gray-600">
                    <span>Payment</span>
                    <span class="font-medium">Rp {{ number_format($transaction->payment_amount ?? 0, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between text-gray-600">
                    <span>Change</span>
                    <span class="font-medium">Rp {{ number_format($transaction->change ?? 0, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between text-gray-600 pt-1">
                    <span>Payment Method</span>
                    <span class="font-medium capitalize">{{ $transaction->payment_method ?? 'Cash' }}</span>
                </div>
            </div>

            <div class="text-center mt-6 text-xs text-gray-400">
                <p>Thank you for your purchase!</p>
            </div>
        </div>
    </div>
</body>
</html>
