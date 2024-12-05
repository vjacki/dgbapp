<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class movement extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'date',
        'price',
        'movementType',
        'employee_id',
        'product_id',
        'customer_id',
    ];

    protected $casts = [
        'date' => 'datetime',
    ];

    public function employee():BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function product():BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
    public function customer():BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
