<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreateTransactionResult extends Model
{
    protected $table = "create_transaction_result";

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'bank_url',
        'trazability_code',
        'transaction_cycle',
        'transaction_id',
        'session_id',
        'bank_currency',
        'bank_factor',
        'response_code',
        'response_reasonCode',
        'response_reason_text'
    ];
}
