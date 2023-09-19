<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CaseInvoice extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'case_invoices';

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
    protected $fillable = ['date', 'vat_number', 'currency','invoice_number', 'subject', 'description', 'senior_counsel_fees', 'junior_counsel_fees', 'case_file_id', 'signature', 'instructing_attorney_fees', 'vat_value', 'total'];

    public function caseFile(){
        return $this->belongsTo(CaseFile::class,'case_file_id');
    }
}
