<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class ProjectType extends Model
{
    use HasFactory, Userstamps;

    protected $guarded = ['id'];
}
