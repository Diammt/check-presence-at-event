<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Signup extends Model
{
    //
    protected $fillable = [
        "fullname",
        "email",
        "phone",
        "company",
        "paystatut",
        "ticked_id",
        "tchrono"
    ];

    public function signup_status_summit()
    {
        return $this->hasOne("App\Models\SignupStatutSummit", "signup_id");
    }
}
