<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'package_id',
        'contract_number',
        'webpage',
        'approval',
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
