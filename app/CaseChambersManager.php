<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CaseChambersManager extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'case_chambers_managers';

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
    protected $fillable = ['case_id', 'chambers_manager_id'];

    public function caseChambersManager(){
        return $this->belongsTo(User::class, 'chambers_manager_id');
    }
    public function getCaseDetail(){
        return $this->belongsTo(CaseFile::class, 'case_id');
    }
}
