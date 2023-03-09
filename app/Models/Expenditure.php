<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Expenditure extends Model
{
    use HasFactory, Userstamps;

    protected $guarded = ['id'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function fiscalYear(){
        return $this->belongsTo(FiscalYear::class);
    }
    
    public function expenditureType(){
        return $this->belongsTo(ExpenditureType::class);
    }
}
