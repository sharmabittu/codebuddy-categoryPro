<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug','parent_id','description'];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id')->orderBy('name');
    }

    public function childrenRecursive()
    {
        return $this->children()->with('childrenRecursive');
    }

    protected static function booted()
    {
        static::saving(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name) . '-' . uniqid();
            }
        });
    }
}
