<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\OrderRequest;
use App\Models\Apartment;
use App\Models\Sponsorship;
use Braintree\Gateway;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    public function index(Gateway $gateway, Apartment $apartment, Sponsorship $sponsorship)
    {
        $token = $gateway->clientToken()->generate();
        return view('admin.payments', compact('apartment', 'sponsorship', 'token'));
    }

    public function transaction(OrderRequest $request, Gateway $gateway, Apartment $apartment, Sponsorship $sponsorship)
    {
        $result = $gateway->transaction()->sale([
            'amount' => $sponsorship->price,
            'paymentMethodNonce' => 'fake-valid-nonce',
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {
            return redirect()->route('admin.apartments.show', $apartment->id)->with('alert-message', 'Sponsorizzazione pagata con successo')->with('alert-type', 'success');
        } else {
            return redirect()->route('admin.apartments.show', $apartment->id)->with('alert-message', 'Sponsorizzazione fallita')->with('alert-type', 'danger');
        }
    }
}
