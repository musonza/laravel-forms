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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function submission()
    {
        return $this->belongsTo(Submission::class);
    }
}
