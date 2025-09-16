<?php

namespace App\Modules\Appeals\Models;

use App\Core\Models\BaseModel;

class AppealPayment extends BaseModel
{
    protected $fillable = [
        'appeal_id',
        'amount',
        'payment_method',
        'transaction_id',
        'payment_status',
        'payment_data',
        'paid_at'
    ];

    public function appeal()
    {
        return $this->belongsTo(Appeal::class);
    }
}
