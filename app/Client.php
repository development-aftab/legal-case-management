<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'clients';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'address', 'contact', 'next_of_kin', 'salary', 'marital_status', 'id_number', 'payment_method_id', 'attorney_associate_id', 'condition', 'firm_id', 'firm_description', 'client_attitude_id', 'client_attitude_description'];

    
}
