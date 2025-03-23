<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PaymentController extends Controller
{
    public function getAllPayments()
    {
        $payments = Payment::with('customer', 'order')->get();
        return response()->json($payments, Response::HTTP_OK);
    }

    public function getPayment($paymentId)
    {
        $payment = Payment::with('customer', 'order')->find($paymentId);

        if (!$payment) {
            return response()->json(['message' => 'Payment not found'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($payment, Response::HTTP_OK);
    }

    public function createPayment(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'customer_id' => 'required|exists:customers,id',
            'payment_method' => 'required|string|max:100',
            'amount' => 'required|numeric|min:0.01',
        ]);

        $payment = Payment::create([
            'order_id' => $request->order_id,
            'customer_id' => $request->customer_id,
            'payment_method' => $request->payment_method,
            'amount' => $request->amount,
            // 'payment_date' will be handled by database as current timestamp
        ]);

        return response()->json($payment, Response::HTTP_CREATED);
    }

    public function updatePayment(Request $request, $paymentId)
    {
        $payment = Payment::find($paymentId);

        if (!$payment) {
            return response()->json(['message' => 'Payment not found'], Response::HTTP_NOT_FOUND);
        }

        $request->validate([
            'payment_method' => 'nullable|string|max:100',
            'amount' => 'nullable|numeric|min:0.01',
        ]);

        // Update payment details
        $payment->update([
            'payment_method' => $request->payment_method ?? $payment->payment_method,
            'amount' => $request->amount ?? $payment->amount,
            // payment_date remains the same unless explicitly changed
        ]);

        return response()->json($payment, Response::HTTP_OK);
    }

    // Delete a payment by ID
    public function deletePayment($paymentId)
    {
        // Find the payment by ID
        $payment = Payment::find($paymentId);

        // If payment not found, return 404
        if (!$payment) {
            return response()->json(['message' => 'Payment not found'], Response::HTTP_NOT_FOUND);
        }

        // Delete the payment
        $payment->delete();

        return response()->json(['message' => 'Payment deleted successfully'], Response::HTTP_OK);
    }
}
