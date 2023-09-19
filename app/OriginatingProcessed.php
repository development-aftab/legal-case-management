<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\PdfToImage\Pdf;

class OriginatingProcessed extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'originating_processeds';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *'
     * @var array
     */
    protected $fillable = ['originate_id', 'title', 'file', 'description','form_id','date'];

    protected $appends=['pdfPageCount'];
//    public function getpdfPageCountAttribute(){
//        return $pages = preg_match_all("/\/Page\W/", file_get_contents(public_path('website').'/'.$this->file??''));
//    }
    public function getPdfPageCountAttribute()
    {
        $pdfPath = public_path('website') . '/' . ($this->file ?? '');

        if (file_exists($pdfPath)) {
            $pdf = new Pdf($pdfPath);
            return $pdf->getNumberOfPages();
        }

        return 0; // PDF not found
    }


}
