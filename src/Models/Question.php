<?php

namespace Musonza\Form\Models;

use Illuminate\Database\Eloquent\Model;
use \Lookitsatravis\Listify\Listify;

class Question extends Model
{
    use Listify;

    protected $table = 'mc_questions';
    protected $fillable = [
        'title',
        'label',
        'place_holder',
        'help_text',
        'description',
        'is_required',
        'properties',
        'field_type',
        'options',
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

    public function __construct(array $attributes = array(), $exists = false)
    {
        parent::__construct($attributes, $exists);

        $this->initListify();
    }

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

    public function field()
    {
        return new $this->field_type("field_{$this->id}", $this->options);
    }
}
