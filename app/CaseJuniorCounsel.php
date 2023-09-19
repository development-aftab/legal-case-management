<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CaseJuniorCounsel extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'case_junior_counsels';

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
    protected $fillable = ['junior_counsel_id', 'case_id','case_junior_status'];

    public function caseJuniorCounsel(){
        return $this->belongsTo(User::class, 'junior_counsel_id');
    }
    public function getCaseDetail(){
        return $this->belongsTo(CaseFile::class, 'case_id');
    }
}
