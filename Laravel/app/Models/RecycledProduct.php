<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecycledProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'description',
        'quantity',
        'price',
        'sales_center_id',
        'category_id',         // Add category_id to fillable
        'recycled_content_id',  // Add recycled_content_id to fillable  
    ];

    public function salesCenter()
    {
        return $this->belongsTo(SalesCenter::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function RecycledContent()
    {
        return $this->belongsTo(RecycledContent::class);
    }
}
