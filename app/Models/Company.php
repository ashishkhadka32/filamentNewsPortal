<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
   protected $casts = [
    "phone" => "array",
   ];
    public function company_contacts(): HasMany
    {
        return $this->hasMany(companyContact::class);
    }

}
