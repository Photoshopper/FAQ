<?php

namespace Modules\Faq\Entities;

use Illuminate\Database\Eloquent\Model;

class QuestionTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['question', 'answer'];
    protected $table = 'faq__question_translations';
}
