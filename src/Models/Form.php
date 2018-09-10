<?php

namespace Musonza\Form\Models;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $table = 'mc_forms';
    protected $fillable = [
        'title',
        'description',
    ];

    /**
     * A form has many questions.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
