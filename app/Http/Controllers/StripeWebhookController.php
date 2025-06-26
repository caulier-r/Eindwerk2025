<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Stripe\Webhook;

class StripeWebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        $payload = $request->getContent();
        $sigHeader = $request->header('stripe-signature');
        $endpointSecret = env('STRIPE_WEBHOOK_SECRET'); // We voegen dit later toe

        try {
            $event = Webhook::constructEvent($payload, $sigHeader, $endpointSecret);
        } catch (\Exception $e) {
            return response('Webhook signature verification failed.', 400);
        }

        // Handle successful payment
        if ($event['type'] === 'checkout.session.completed') {
            $session = $event['data']['object'];
            $orderId = $session['metadata']['order_id'];

            // Update order status
            $order = Order::find($orderId);
            if ($order) {
                $order->update(['status' => 'paid']);

                // Clear user's cart after successful payment
                CartItem::where('user_id', $order->client_id)->delete();
            }
        }

        return response('Webhook handled', 200);
    }
}
