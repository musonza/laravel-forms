<?php

namespace Musonza\Form\Models;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $table = 'mc_forms';
    protected $fillable = [
        'title',
        'description',
        'status',
    ];

    protected $with = [
        'submissions',
    ];

    /**
     * A form has many questions.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions()
    {
        return $this->hasMany(Question::class)->orderBy('position');
    }

    /**
     * A form has many submissions.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }

    public function addSubmission($submission)
    {
        return $this->submissions()->create($submission);
    }
}
