<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SumUpController extends Controller
{
    public function testApiKey()
    {
        $secretKey = config('services.sumup.secret_key');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $secretKey,
        ])->get('https://api.sumup.com/v0.1/me');

        if ($response->successful()) {
            return response()->json($response->json());
        }

        return response()->json([
            'status' => $response->status(),
            'body' => $response->body(),
        ], $response->status());
    }
}
