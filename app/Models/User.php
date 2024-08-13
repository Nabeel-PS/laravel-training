<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'dateofbirth','status'
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
  public function address(){
    return $this->hasone(UserAddress::class,'user_id','id');
  }


  public function orders(){
    return $this->hasMany(order::class,'user_id','id');
  }
    public function getDateOfBirthFormatedAttribute(){ //dateofbirth_formated
    return date('d-m-Y', strtotime($this->dateofbirth)); 
    }
    public function scopeActive($query){
        return $query->where('status', 1);
    }
    public function getStatusTextAttribute(){
    if ($this->status == 1) return 'Active';
    else return 'Inactive';
    }
    protected $appends = ['date_of_birth_formated','status_text'];
}
