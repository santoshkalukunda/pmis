<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class ActiveFiscalYear extends Model
{
    use HasFactory, Userstamps;

    protected $guarded = ['id'];

    
    public function fiscalYear()
    {
        return $this->belongsTo(FiscalYear::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
