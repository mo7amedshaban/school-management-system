<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Classroom extends Model
{

    use HasTranslations;
    public $translatable = ['Name_Class'];


    protected $table = 'classrooms';
    public $timestamps = true;
    protected $fillable=['Name_Class','Grade_id'];


# one to many
    public function Grades()
    {
        return $this->belongsTo('App\Models\Grade', 'Grade_id');
    }
    public function section()
    {
        return $this->belongsTo('App\Models\Section', 'section_id');
    }

}
