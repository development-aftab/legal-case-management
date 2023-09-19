<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CaseOriginate extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'case_originates';

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
    protected $fillable = ['case_id', 'originate_id'];

    public function orignatingProcesseds(){
        return $this->hasMany(OriginatingProcessed::class,'originate_id','id');
    }

    public function process(){
        return $this->belongsTo(Originate::class, 'originate_id');
    }
    public function getCaseDetail(){
        return $this->belongsTo(CaseFile::class, 'case_id');
    }
    
}
