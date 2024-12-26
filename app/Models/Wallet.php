<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Wallet extends Model
{
    protected $fillable = ['user_id', 'wallet_type_id', 'balance']; // Fields that can be mass-assigned

    public function user()
    {
        return $this->belongsTo(User::class); // A wallet belongs to a user
    }

    public function type()
    {
        return $this->belongsTo(WalletType::class, 'wallet_type_id'); // A wallet belongs to a wallet type
    }
}

