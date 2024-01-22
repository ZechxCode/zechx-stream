<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    protected $fillable = [
        'package_id',
        'user_id',
        'amount',
        'transaction_code',
        'status',
    ];

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id', 'id'); // foreign key , primarykey

    }

    public function user()
    {
        return $this->belongsTo(User::class); //syarat cara pendek harus sama seperti ('model_id','id')
    }
}
