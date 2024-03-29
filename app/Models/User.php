<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;
    use SoftDeletes;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    //leads
    public function leads(){
        return $this->hasMany(Lead::class, 'add_by_id','id');
    }

    //invoices
    public function invoices(){
        return $this->hasMany(Invoice::class, 'customer_id','id');
    }

    //companyPads
    public function companyPads(){
        return $this->hasMany(CompanyPad::class, 'creator_id','id');
    }

    //sms of this user
    public function allMessages(){
        return $this->hasMany(SmsHistory::class, 'sender_id','id')->orderBy('id', 'desc');
    }

    //email of this user
    public function allEmails(){
        return $this->hasMany(EmailHistory::class, 'sender_id','id')->orderBy('id', 'desc');
    }


    //proposals
    public function proposals(){
        return $this->hasMany(Proposal::class, 'customer_id','id');
    }
}
