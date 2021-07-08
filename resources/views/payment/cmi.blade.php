
@extends('layouts.app')

@section('content')

    <h1>Payment form CMI</h1>
    
    <form method="post" action="{{route('payment.proccess')}}">
        @csrf
        @honeypot
        <label for="amount">Amount</label>
        <input type="text" name="amount" class="input-control" placeholder="put amount here 10.65" value="10.60"> DHS<br/>
        <label for="Command">Command</label>
        <input type="text" name="cmd" value="155cmd">
        <button type="submit">Buy</button>
    </form>
@endsection