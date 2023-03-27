<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'office_id',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function activeFiscalYear(){
        return $this->hasOne(ActiveFiscalYear::class,'created_by');
    }
    
    public function project(){
        return $this->hasMany(Project::class,'created_by');
    }
    
    public function financial(){
        return $this->hasMany(Financial::class,'created_by');
    }

    public function acheivement(){
        return $this->hasMany(Acheivement::class,'created_by');
    }

    public function photo(){
        return $this->hasMany(Photo::class,'created_by');
    }

    public function budget(){
        return $this->hasMany(Budget::class,'created_by');
    }

    public function expenditure(){
        return $this->hasMany(Expenditure::class,'created_by');
    }

    public function office(){
        return $this->belongsTo(Office::class, 'office_id');
    }
    
    public function indicator(){
        return $this->hasMany(Indicator::class,'created_by');
    }
}

