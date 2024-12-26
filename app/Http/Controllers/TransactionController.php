<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; // For handling HTTP requests
use App\Models\Wallet; // For accessing the Wallet model
use DB; 


class TransactionController extends Controller
{
    
    
    
    public function transfer(Request $request)
    {
        $validated = $request->validate([
            'sender_wallet_id' => 'required|exists:wallets,id',
            'receiver_wallet_id' => 'required|exists:wallets,id|different:sender_wallet_id',
            'amount' => 'required|numeric|min:0.01',
        ]);

        $sender = Wallet::findOrFail($validated['sender_wallet_id']);
        $receiver = Wallet::findOrFail($validated['receiver_wallet_id']);
        $amount = $validated['amount'];

        if ($sender->balance < $amount) {
            return response()->json(['error' => 'Insufficient balance'], 400);
        }

        \DB::transaction(function () use ($sender, $receiver, $amount) {
            $sender->balance -= $amount;
            $sender->save();

            $receiver->balance += $amount;
            $receiver->save();
        });

        return response()->json(['message' => 'Transfer successful']);
    }
}
