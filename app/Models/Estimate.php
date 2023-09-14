<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Wildside\Userstamps\Userstamps;

class Estimate extends Model
{
    use HasFactory, Userstamps;

    protected $guarded = ['id'];

    public function scopeCurrentFislcalYear($query)
    {
        return $query->where('fiscal_year_id', Session::get('active_fiscal_year'));
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function fiscalYear()
    {
        return $this->belongsTo(FiscalYear::class);
    }
}
