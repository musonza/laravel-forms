<?php

namespace Musonza\Form\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'mc_answers';
    protected $fillable = [
        'value',
        'submission_id',
    ];

    protected $with = [
        'question',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question()
    {
        return $this->belongsTo(Question::class)->orderBy('position');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function submission()
    {
        return $this->belongsTo(Submission::class);
    }
}
