<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function showForm()
    {
        return view('payment');
    }

    public function processPayment(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'cardholder_name' => 'required|string',
            'card_number' => 'required|numeric',
            'expiry_date' => 'required|string',
            'cvv' => 'required|numeric',
        ]);

        $secretKey = config('services.sumup.secret_key');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $secretKey,
        ])->post('https://api.sumup.com/v0.1/payments', [
            'amount' => $request->input('amount'),
            'currency' => 'PEN', // Cambia a la moneda que utilices
            'pay_to_email' => 'edalvat09@gmail.com',
            'card' => [
                'number' => $request->input('card_number'),
                'expiry_month' => substr($request->input('expiry_date'), 0, 2),
                'expiry_year' => substr($request->input('expiry_date'), 3, 2),
                'cvv' => $request->input('cvv'),
                'holder' => $request->input('cardholder_name'),
            ],
        ]);

        if ($response->successful()) {
            return back()->with('success', 'Pago realizado con éxito.');
        }

        return back()->with('error', 'Hubo un problema con el pago. Inténtalo nuevamente.');
    }
    
}
