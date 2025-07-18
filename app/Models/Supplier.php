<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_name',
        'supplier_email',
        'supplier_phone',
        'supplier_address',
    ];

    # Relationship with Purchase
    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
    
}
