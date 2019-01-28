<?php

namespace Musonza\Form\Models;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $table = 'mc_submissions';
    protected $fillable = [
        'ip_address',
        'form_id',
        'response',
        'is_complete',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'response' => 'array',
        'is_complete' => 'boolean',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    /**
     * Submission has answers.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
