<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function ingredients(){
        return $this->hasMany(Ingredient::class);
    }

    public function scopeSearch($query, $search){
        return $query->where('name', 'LIKE', "%$search%");
    }

    public function scopeVisible($query){
        return $query->where('is_hidden', false);
    }

    public function scopeForCategories($query, $categories){
       if (count($categories) === 0){
           return $query;
       }

       return $query->whereHas('category', function ($q) use ($categories){
            $q->whereIn('id',$categories);
        });
    }
}
