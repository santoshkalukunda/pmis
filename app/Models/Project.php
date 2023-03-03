<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Wildside\Userstamps\Userstamps;

class Project extends Model
{
    use HasFactory, Userstamps, HasSlug;

    protected $guarded = ['id'];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function projectType(){
        return $this->belongsTo(ProjectType::class);
    }

    // public function municipality(){
    //     return $this->belongsTo(Municipality::class);
    // }
    public function office(){
        return $this->belongsTo(Office::class);
    }
    public function budgetSource(){
        return $this->belongsTo(BudgetSource::class);
    }

    public function fiscalYear(){
        return $this->belongsTo(FiscalYear::class);
    }

    public function expenditureType(){
        return $this->belongsTo(ExpenditureType::class);
    }

}