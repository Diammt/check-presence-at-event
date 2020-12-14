<?php

namespace App\Utils\Traits;
use Carbon\Carbon;

trait IsoDateFormat
{
  public function getCreatedAtAttribute($value)
  {
      return Carbon::parse($value)->locale('fr_FR')->isoFormat('[le ]dddd D MMMM YYYY [à] H:mm:ss');
  }
  public function getUpdatedAtAttribute($value)
  {
      return Carbon::parse($value)->locale('fr_FR')->isoFormat('[le ]dddd D MMMM YYYY [à] H:mm:ss');
  }
}
