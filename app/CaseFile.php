<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CaseFile extends Model
{
    use SoftDeletes;
    protected $appends = ['caseSeniorCounselIds','caseJuniorAttorneyIds', 'caseChambersManagerIds', 'caseParalegalIds','caseJuniorCounselIds', 'caseTagIds','caseKingCounselIds','caseTypeOfMatterIds'];
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'case_files';

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
    protected $fillable = ['case_number', 'flc_number', 'name_of_parties', 'judge_name', 'case_noti', 'instruction_attorney_id', 'originating', 'status', 'junior_attorney_id', 'senior_counsel_id', 'king_counsel_id', 'retainer_agreement', 'type_of_matter_id', 'case_condition','fees', 'client_id'];


    public function tags(){
        return $this->hasMany(CaseTag::class,'case_id');
    }
    public function originatingProcess(){
        return $this->hasMany(CaseOriginate::class,'case_id');
    }
    public function getcaseTagIdsAttribute(){
        return $casetags = CaseTag::where('case_id',$this->id)->pluck('id')->toArray();
    }
    public function getcaseSeniorCounselIdsAttribute(){
        return CaseSeniorCounsel::where('case_id',$this->id)->pluck('senior_counsel_id')->toArray();
    }
    public function getcaseJuniorCounselIdsAttribute(){
        return CaseJuniorCounsel::where('case_id',$this->id)->pluck('junior_counsel_id')->toArray();
    }
    public function getcaseChambersManagerIdsAttribute(){
        return CaseChambersManager::where('case_id',$this->id)->pluck('chambers_manager_id')->toArray();
    }
    public function getcaseParalegalIdsAttribute(){
        return CaseParalegal::where('case_id',$this->id)->pluck('paralegal_id')->toArray();
    }
    public function getcaseJuniorAttorneyIdsAttribute(){
        return CaseJuniorAttorney::where('case_id',$this->id)->pluck('junior_attorney_id')->toArray();
    }
    public function getcaseKingCounselIdsAttribute(){
        return CaseKingCounsel::where('case_id',$this->id)->pluck('king_counsel_id')->toArray();
    }
    public function getcaseTypeOfMatterIdsAttribute(){
        return CaseTypeOfMatter::where('case_id',$this->id)->pluck('type_of_matter_id')->toArray();
    }
    public function typeOfMatters(){
        return $this->hasMany(CaseTypeOfMatter::class,'case_id');
    }
    public function juniorAttorneies(){
        return $this->hasMany(CaseJuniorAttorney::class,'case_id');
    }
    public function kingCounsels(){
        return $this->hasMany(CaseKingCounsel::class,'case_id');
    }
    public function seniorCounsels(){
        return $this->hasMany(CaseSeniorCounsel::class,'case_id');
    }
    public function ChambersManagers(){
        return $this->hasMany(CaseChambersManager::class,'case_id');
    }
    public function JuniorCounsel(){
        return $this->hasMany(CaseJuniorCounsel::class,'case_id');
    }
    public function Paralegals(){
        return $this->hasMany(CaseParalegal::class,'case_id');
    }
    public function caseInvoices(){
        return $this->hasMany(CaseInvoice::class,'case_file_id','id');
    }
    public function caseInvoice(){
        return $this->hasOne(CaseInvoice::class,'case_file_id','id');
    }
    public function billOfCost(){
        return $this->hasOne(BillOfCost::class,'case_id','id');
    }
    public function caseOrder(){
        return $this->hasOne(Order::class,'case_file_id','id');
    }
    public function caseLetter(){
        return $this->hasOne(Letter::class,'case_file_id','id');
    }
    public function caseCheque(){
        return $this->hasOne(Cheque::class,'case_file_id','id');
    }
    public function caseAllocatur(){
        return $this->hasOne(Allocatur::class,'case_file_id','id');
    }
    public function instructionAttorney(){
        return $this->belongsTo(User::class, 'instruction_attorney_id');
    }
    public function juniorAttorney(){
        return $this->belongsTo(User::class, 'junior_attorney_id');
    }
    public function seniorCounsel(){
        return $this->belongsTo(SeniorCounsel::class, 'senior_counsel_id');
    }
    public function kingCounsel(){
        return $this->belongsTo(KingCounsel::class, 'king_counsel_id');
    }
    public function typeOfMatter(){
        return $this->belongsTo(TypeOfMatter::class, 'type_of_matter_id');
    }
    public function attorney_associate_id(){
        return $this->hasOne(User::class, 'id', 'client_id');
    }
    public function client(){
        return $this->belongsTo(User::class, 'client_id');
    }
    public function courtAttendantsNotes(){
        return $this->hasMany(CourtAttendantsNote::class, 'case_file_id');
    }
    public function courtAttendantsNote(){
        return $this->hasOne(CourtAttendantsNote::class, 'case_file_id')->orderBy('id','DESC');
    }
}
