<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Signup extends Model
{
    //
    protected $fillable = [
        "ID",
        "Fullname",
        "Email",
        "Phone",
        "Company",
        "_paystatus",
        "TickedID",
    ];

    protected $table = '_signup';
    protected $primaryKey = 'ID';

    public function signup_status_summit()
    {
        return $this->hasOne("App\Models\SignupStatutSummit", "signup_id");
    }
}
