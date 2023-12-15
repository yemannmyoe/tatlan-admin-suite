<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    public $table = 'sub_categories';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'category',
        'english_name',
        'myanmar_name',
        'subcategory_image',
        'published_date'
      ];

      protected $casts =[
        'id' => 'integer',
        'category' => 'string',
        'english_name' => 'string',
        'myanmar_name' => 'string',
        'subcategory_image' => 'string',
        'published_date' => 'date'
        
      ];

      public function category()
      {
          return $this->hasMany(Category::class);
      }
}
