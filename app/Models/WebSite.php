<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebSite extends Model
{
    use HasFactory;

    public $fillable= ['name','email','phone','notes','doctor_id','section_id','type','appointment'];


    public function doctor()
    {
        return $this->belongsTo(Doctor::class,'doctor_id');
    }
    public function section()
    {
        return $this->belongsTo(Section::class,'section_id');
    }

}
