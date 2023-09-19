<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use App\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    use SoftDeletes;
    protected $appends = ['clientPaymentMethodsIds'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'bar_number', 'contact', 'resume', 'certificate', 'document','payment_method_id', 'attorney_associate_id', 'signature', 'noti_status', 'firm_id', 'client_attitude_id','delete_status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function profile(){
        return $this->hasOne(Profile::class);
    }

    public function permissionsList(){
        $roles = $this->roles;
        $permissions = [];
        foreach ($roles as $role){
            $permissions[] = $role->permissions()->pluck('name')->implode(',');
        }
       return collect($permissions);
    }

    public function permissions(){
        $permissions = [];
        $role = $this->roles->first();
        $permissions = $role->permissions()->get();
        return $permissions;
    }

    public function isAdmin(){
       $is_admin =$this->roles()->where('name','admin')->first();
       if($is_admin != null){
           $is_admin = true;
       }else{
           $is_admin = false;
       }
       return $is_admin;
    }

    public function paymentMethod(){
        return $this->belongsTo(PaymentMethod::class,'payment_method_id');
    }
    public function firm(){
        return $this->belongsTo(Firm::class,'firm_id');
    }
    public function clientAttitude(){
        return $this->belongsTo(ClientAttitude::class,'client_attitude_id');
    }
    public function attorneyOrAssociate(){
        return $this->belongsTo(User::class,'attorney_associate_id');
    }
    public function clientCase(){
        return $this->hasMany(CaseFile::class,'client_id','id');
    }
    public function clientPaymentMethods(){
        return $this->hasMany(ClientPaymentMethod::class,'client_id','id');
    }
    public function getclientPaymentMethodsIdsAttribute(){
        return ClientPaymentMethod::where('client_id',$this->id)->pluck('payment_method_id')->toArray();
    }
    public function clients(){
        return $this->hasOne(CaseFile::class,'client_id');
    }
    public function expertise(){
        return $this->hasMany(Expertise::class,'user_id');
    }
    public function assigned_clients(){
        return $this->hasMany(User::class,'attorney_associate_id');
    }

}
