<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecycledContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'percentage',         // Percentage of recycled content
        'content_description' // Description of the recycled content
    ];

    // Define the relationship with RecycledProduct
}
