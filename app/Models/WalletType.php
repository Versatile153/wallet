<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletType extends Model
{
    protected $fillable = ['name', 'min_balance', 'interest_rate']; // Fields that can be mass-assigned

    public function wallets()
    {
        return $this->hasMany(Wallet::class); // A wallet type can have many wallets
    }
}

