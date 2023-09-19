<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CaseEvent extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'case_events';

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
    protected $fillable = ['name', 'description', 'date','time','location'];

    // public function user(){
    //     return $this->belongsTo(User::class, 'user_id');
    // }



    public function caseEventMentions(){
        return $this->hasMany(CaseEventMention::class,'case_event_id');
    }

}
