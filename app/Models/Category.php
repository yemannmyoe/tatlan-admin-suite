<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['english_name', 'myanmar_name', 'category_image'];

    protected $table = "categories";

    public function article()
    {
        return $this->belongsTo(Category::class);
    }
}
