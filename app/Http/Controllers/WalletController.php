<?php

namespace App\Http\Controllers;
use App\Models\Wallet;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    
    public function index()
{
    return response()->json(Wallet::with('user', 'type')->get()); // Return all wallets with user and type
}

public function show($id)
{
    $wallet = Wallet::with('user', 'type')->findOrFail($id); // Find wallet by ID with user and type
    return response()->json($wallet);
}

}
