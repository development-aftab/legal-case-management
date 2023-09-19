<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CaseTypeOfMatter extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'case_type_of_matters';

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
    protected $fillable = ['case_id', 'type_of_matter_id'];

    public function caseTypeOfMatters(){
        return $this->belongsTo(TypeOfMatter::class, 'type_of_matter_id');
    }
    public function getCaseDetail(){
        return $this->belongsTo(CaseFile::class, 'case_id');
    }
}
