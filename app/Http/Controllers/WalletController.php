<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Bavix\Wallet\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class WalletController extends Controller
{
    
    public function deposit(Request $request)
    {
        // Validate the request
        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);
    
        $user = Auth::user();
    
        // Ensure user has a wallet
        if (!$user->wallet) {
            return response()->json(['message' => 'Wallet not found'], 404);
        }
    
        // Use transaction for data integrity
        DB::beginTransaction();
        try {
            $user->wallet->increment('balance', $request->amount);
            DB::commit();
    
            return response()->json([
                'message' => 'Coins added successfully',
                'balance' => $user->wallet->balance
            ]);
    
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Deposit failed', 'error' => $e->getMessage()], 500);
        }
    }
    
    

    public function withdraw(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        $user = Auth::user();

        if ($user->balance < $request->amount) {
            return response()->json(['message' => 'Insufficient balance'], 400);
        }

        $user->withdraw($request->amount);

        return response()->json(['message' => 'Coins deducted successfully', 'balance' => $user->balance]);
    }

    public function transactions()
    {
        $transactions = Auth::user()->transactions()->latest()->get();
        return response()->json($transactions);
    }
}
