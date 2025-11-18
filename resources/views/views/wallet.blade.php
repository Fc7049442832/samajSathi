@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 mt-4">
        <h5>Wallet Balance: <span id="walletBalance" class="h3">{{ auth()->user()->balance ?? 0 }}</span> coins</h5>
        <hr>
    </div>
</div>

<div class="row text-end">
    <div class="col-md-8">
        <form action="{{ route('wallet.deposit') }}" method="POST">
            @csrf
            <input type="hidden" name="amount" value="10">
            <button type="submit">Add 10 Coins</button>
        </form>

        <form action="{{ route('wallet.withdraw') }}" method="POST">
            @csrf
            <input type="hidden" name="amount" value="5">
            <button type="submit">Withdraw 5 Coins</button>
        </form>
    </div>
</div>

<p>Your Wallet Balance: <strong>{{ auth()->user()->balance ?? 0 }}</strong> coins</p>


<div class="row mt-4">
    <div class="col-8">
        <h5>Transaction History</h5>
        <hr>
        <ul>
            @foreach(auth()->user()->transactions as $transaction)
                <li>{{ $transaction->amount }} coins ({{ $transaction->type }}) on {{ $transaction->created_at }}</li>
            @endforeach
        </ul>

    </div>
</div>




@endsection
