<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Transaction extends Model
{
    protected $fillable = ['sender_wallet_id', 'receiver_wallet_id', 'amount']; // Fields that can be mass-assigned

    public function sender()
    {
        return $this->belongsTo(Wallet::class, 'sender_wallet_id'); // A transaction has a sender wallet
    }

    public function receiver()
    {
        return $this->belongsTo(Wallet::class, 'receiver_wallet_id'); // A transaction has a receiver wallet
    }
}

