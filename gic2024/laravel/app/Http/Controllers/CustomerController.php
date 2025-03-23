<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

public function getAllCustomers()
{
    $customers = Customer::select('id', 'name', 'email', 'address', 'phone')->get();
    return response()->json($customers);
}


public function getCustomer($customerId)
{
    $customer = Customer::select('id', 'name', 'email', 'address', 'phone')->find($customerId);

    if (!$customer) {
        return response()->json(['message' => 'Customer not found'], 404);
    }

    return response()->json($customer);
}


    // Create a new customer
    public function createCustomer(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100|unique:customers,email',
            'address' => 'required|string|max:100',
            'phone' => 'required|string|max:100',
        ]);

        $customer = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        return response()->json($customer, 201); // Return created customer with 201 status code
    }

    public function updateCustomer(Request $request, $customerId)
    {
        $customer = Customer::find($customerId);

        if (!$customer) {
            return response()->json(['message' => 'Customer not found'], 404);
        }

        $request->validate([
            'name' => 'nullable|string|max:100',
            'email' => 'nullable|email|max:100|unique:customers,email,' . $customer->id,
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        $customer->update([
            'name' => $request->filled('name') ? $request->name : $customer->name,
            'email' => $request->filled('email') ? $request->email : $customer->email,
            'address' => $request->filled('address') ? $request->address : $customer->address,
            'phone' => $request->filled('phone') ? $request->phone : $customer->phone,
        ]);

        return response()->json($customer);
    }

    // Delete a customer
    public function deleteCustomer($customerId)
    {
        $customer = Customer::find($customerId);

        if (!$customer) {
            return response()->json(['message' => 'Customer not found'], 404);
        }

        $customer->delete();

        return response()->json(['message' => 'Customer deleted successfully']);
    }
}
