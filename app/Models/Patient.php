<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Patient extends Authenticatable
{
    use HasFactory;
    use Translatable;
    public $translatedAttributes = ['name','Address'];
    public $fillable= ['email','password','Date_Birth','Phone','Gender','Blood_Group'];

    public function doctor()
    {
        return $this->belongsTo(Invoice::class,'doctor_id');
    }

    public function service()
    {
        return $this->belongsTo(Invoice::class,'Service_id');
    }

}
