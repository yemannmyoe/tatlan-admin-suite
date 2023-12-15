<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

  public $table = 'articles';

  protected $dates = ['deleted_at'];

  public $fillable = [
    'title',
    'youtube_url',
    'vimeo_url',
    'category',
    'type',
    'image',
    'description',
    'published_date'
  ];

  protected $casts =[
    'id' => 'integer',
    'title' => 'string',
    'youtube_url' => 'string',
    'vimeo_url' => 'string',
    'category' => 'string',
    'type' => 'string',
    'image' => 'string',
    'description' => 'string',
    'published_date' => 'date'
  ];

  public function category()
  {
      return $this->hasMany(Category::class);
  }
}
