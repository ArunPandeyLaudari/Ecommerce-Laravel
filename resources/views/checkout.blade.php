@extends('layouts.master')

@section('content')
    <form action="https://rc-epay.esewa.com.np/api/epay/main/v2/form" method="POST">
        <input type="text" id="amount" name="amount" value="{{ $cart->total }}" required>
        <input type="text" id="tax_amount" name="tax_amount" value ="{{ $cart->tax }}" required>
        <input type="text" id="total_amount" name="total_amount" value="{{ $cart->tax + $cart->total }}" required>
        <input type="text" id="transaction_uuid" name="transaction_uuid"required>
        <input type="text" id="product_code" name="product_code" value ="EPAYTEST" required>
        <input type="text" id="product_service_charge" name="product_service_charge" value="0" required>
        <input type="text" id="product_delivery_charge" name="product_delivery_charge" value="0" required>
        <input type="text" id="success_url" name="success_url" value="https://esewa.com.np" required>
        <input type="text" id="failure_url" name="failure_url" value="https://google.com" required>
        <input type="text" id="signed_field_names" name="signed_field_names"
            value="total_amount,transaction_uuid,product_code" required>
        <input type="text" id="signature" name="signature" required>
        <input value="Submit" type="submit">
    </form>

    {{-- Yo ta garnai parxa esewa halna --}}
    @php
        $transaction_uuid = auth()->id() . '-' . time();
        $totalamount = $cart->total + $cart->tax;
        $product_code = 'EPAYTEST';
        $datastring =
            'total_amount=' .
            $totalamount .
            ',transaction_uuid=' .
            $transaction_uuid .
            ',product_code=' .
            $product_code;
        $secret = '8gBm/:&EnhH.1/q';
        $signature = hash_hmac('sha256', $datastring, $secret, true);
        $signature = base64_encode($signature);
    @endphp

    <script>
        document.getElementById('transaction_uuid').value = '{{ $transaction_uuid }}';
        document.getElementById('signature').value = ('{{ $signature }}');
    </script>
@endsection
