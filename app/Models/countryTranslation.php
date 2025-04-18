<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class countryTranslation extends Model
{
    use HasFactory;
    use Translatable;
    public $translatedAttributes = ['name'];
}
