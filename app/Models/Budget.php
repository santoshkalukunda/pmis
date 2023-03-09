<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Budget extends Model
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
    
    public function budgetSource(){
        return $this->belongsTo(BudgetSource::class);
    }

    public function fiscalYear(){
        return $this->belongsTo(FiscalYear::class);
    }
}
