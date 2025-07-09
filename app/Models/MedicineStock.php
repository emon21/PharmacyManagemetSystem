<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicineStock extends Model
{
    use HasFactory;

    protected $table = 'medicine_stocks';

    protected $fillable = [
        'medicine_id',
        'batch_id',
        'expiry_date',
        'quantity',
        'mrp',
        'rate',
    ];

    # Relationships
    public function medicine()
    {
        return $this->belongsTo(Medicine::class, 'medicine_id');
    }
    
}
