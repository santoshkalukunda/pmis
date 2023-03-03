<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class ExpenditureType extends Model
{
    use HasFactory, Userstamps;

    protected $guarded = ['id'];

    public function project(){
        return $this->hasMany(Project::class,'expenditure_type_id');
    }
}
