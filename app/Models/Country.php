<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    /** @use HasFactory<\Database\Factories\CountryFactory> */
    use HasFactory;

    protected $fillable = ['name'];
    public function getTranslatedNameAttribute()
    {
        $locale = app()->getLocale(); // Get the current language
        $names = json_decode($this->name, true);
        return $names[$locale] ?? $names['en']; // Fallback to English if translation is missing
    }
}
