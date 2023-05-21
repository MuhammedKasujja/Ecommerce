<?php

namespace App\Models;

use App\CPU\Helpers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attribute extends Model
{
    use HasFactory;
    public function translations()
    {
        return $this->morphMany(Translation::class, 'translationable');
    }

    public function getNameAttribute($name)
    {
        if (strpos(url()->current(), '/admin') || strpos(url()->current(), '/seller')) {
            return $name;
        }

        if (strpos(url()->current(), '/api')) {
            $translation = DB::table('translations')
                ->where(['translationable_type' => 'App\Models\Attribute', 'translationable_id' => $this->id])
                ->where(['locale' => App::getLocale()])->first();
            if (isset($translation)) {
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
