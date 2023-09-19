<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CaseEventMention extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'case_event_mentions';

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
    protected $fillable = ['case_event_id', 'user_id','case_event_noti'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function caseEvent(){
        return $this->belongsTo(CaseEvent::class, 'case_event_id');
    }
    public function caseEvents(){
        return $this->hasMany(CaseEvent::class, 'id','case_event_id');
    }
}
