<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    # Table Name
    protected $table = 'medicines';

    protected $fillable = [
        'name',
        'packing',
        'genericName',
        'supplierName', 
    ];

    
}
