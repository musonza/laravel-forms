<?php

namespace Musonza\Form\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'mc_questions';
    protected $fillable = [
        'title',
        'label',
        'placeholder',
        'help_text',
        'description',
        'is_required',
        'properties',
        'field_type',
        'options',
        'default_value',
        'columns_count',
        'form_id',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_required' => 'boolean',
        'properties' => 'array',
        'options' => 'array',
    ];

    protected $attributes = [
        'options' => '{}',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function addValidations($validations)
    {
        $this->validations = $validations;
        $this->save();
        return $this;
    }

    /**
     * Get prefilled value for the field.
     *
     * @return mixed
     */
    public function getValueAttribute()
    {
        return "";
    }

    public function field()
    {
        return new $this->field_type($this, $this->options);
    }
}
