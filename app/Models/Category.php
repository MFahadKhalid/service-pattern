<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['name', 'parent_id', 'status', 'blade_template', 'slug'];

    public function getStatusAttribute($value)
    {
        return $value == 1 ? 'Active' : 'in-active';
    }

    public function setBladeTemplateAttribute($value)
    {
        $this->attributes['blade_template'] = Str::slug($value);
    }

    public function parent_category()
    {
        return $this->hasOne(Category::class, 'id', 'parent_id');
    }

}
