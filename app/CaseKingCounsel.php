<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CaseKingCounsel extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'case_king_counsels';

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
    protected $fillable = ['case_id', 'king_counsel_id','case_king_status'];

    public function caseKingCounsel(){
        return $this->belongsTo(User::class, 'king_counsel_id');
    }
    public function getCaseDetail(){
        return $this->belongsTo(CaseFile::class, 'case_id');
    }
}
