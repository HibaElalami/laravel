<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CV extends Model
{
    use HasFactory;
    protected $table="c_v_s";

    public function candidat(){
        return $this->belongsTo(Candidat::class);
    }
    public function work_experiences(){
        return $this->hasMany(work_experience::class);
    }
    public function education_details(){
        return $this->hasMany(Education_detail::class);
    }
    public function languages(){
        return $this->hasMany(Language::class);
    }
    public function expertise(){
        return $this->hasMany(Expertise::class);
    }
    protected $fillable=[
        "nom",
        "email",
        "phone",
        "catagorie",
        "adress",
        "photo",
        "profile",
        "candidat_id",
    ];
    
}
