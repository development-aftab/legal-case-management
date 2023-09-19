<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Accounting extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'accountings';

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
    protected $fillable = ['payment_method_id', 'payment_date', 'paid_ammount', 'noti_status', 'balance_ammount', 'total_ammount', 'upload_receipt', 'case_file_id','table_id','description'];

    public function casefile(){
        return $this->belongsTo(CaseFile::class,'case_file_id');
    }
    public function paymentMethod(){
        return $this->belongsTo(PaymentMethod::class,'payment_method_id');
    }
}
