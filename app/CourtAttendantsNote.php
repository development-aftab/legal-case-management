<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourtAttendantsNote extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'court_attendants_notes';

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
    protected $fillable = ['case_file_id', 'category_id', 'date', 'check_out', 'check_in', 'next_court_category_id', 'next_court_date', 'attachment', 'note'];

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function nextCourtCategory(){
        return $this->belongsTo(Category::class,'next_court_category_id');
    }
    public function caseFile(){
         return $this->belongsTo(CaseFile::class, 'case_file_id');
    }
}
