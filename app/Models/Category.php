<?php

namespace App\Models;

use App\CPU\Helpers;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    protected $casts = [
        'parent_id' => 'integer',
        'position' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function translations()
    {
        return $this->morphMany('App\Models\Translation', 'translationable');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function childes()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function getNameAttribute($name)
    {
        if (strpos(url()->current(), '/admin') || strpos(url()->current(), '/seller')) {
            return $name;
        }

        if (strpos(url()->current(), '/api')) {
            $translation = DB::table('translations')
                ->where(['translationable_type' => 'App\Models\Category', 'translationable_id' => $this->id])
                ->where(['locale' => App::getLocale()])->first();
            if (isset($translation)){
                return $translation->value;
            }
            return $name;
        }

        return $this->translations[0]->value ?? $name;
    }

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('translate', function (Builder $builder) {
            $builder->with(['translations' => function ($query) {
                return $query->where('locale', Helpers::default_lang());
            }]);
        });
    }
}
