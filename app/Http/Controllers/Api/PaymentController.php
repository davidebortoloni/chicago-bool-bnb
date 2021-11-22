<?php

namespace App\Http\Controllers\Api;

use Braintree\Gateway;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function token(Request $request, Gateway $gateway)
    {
        $token = $gateway->clientToken()->generate();
        return response()->json([
            'token' => $token
        ]);
    }
}
