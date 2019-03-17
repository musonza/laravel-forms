<?php

namespace Musonza\Form\Tests\Unit;

use Form;
use Musonza\Form\Fields\Password;
use Musonza\Form\Fields\Radio;
use Musonza\Form\Fields\Select;
use Musonza\Form\Fields\Text;
use Musonza\Form\Fields\TextArea;
use Musonza\Form\Tests\TestCase;

class FieldsRenderTest extends TestCase
{
    protected $form;
    protected $question;

    public function setUp(): void
    {
        parent::setUp();
        $this->form = Form::create(['title' => 'Contact Form']);
    }

    /**
     * @dataProvider fieldsDataProvider
     */
    public function testFieldRender($field, $options, $expected)
    {
        $question = $this->createQuestion($field, $options);

        $this->assertEquals($expected, $question->field()->render());
    }

    public function fieldsDataProvider()
    {
        return [
            [
                TextArea::class, [],
                '<textarea name="field_1" id="field_1" class="form-control"></textarea>',
            ],
            [
                Text::class, [],
                '<input name="field_1" id="field_1" class="form-control" type="text" value="">',
            ],
            [
                Password::class, [],
                '<input name="field_1" id="field_1" class="form-control" type="password" value="">',
            ],
            [
                Radio::class,
                ['male'],
                '<input type="radio"  name="field_1" id="field_1" class="" value="0"> male<br>',
            ],

            [
                Select::class,
                ['male', 'female'],
                '<select name="field_1" id="field_1" class="form-control"><option value="0" selected="selected">male</option><option value="1">female</option></select>',
            ],
            [
                Select::class,
                ['m' => 'male', 'f' => 'female'],
                '<select name="field_1" id="field_1" class="form-control"><option value="m">male</option><option value="f">female</option></select>',
            ],
        ];
    }

    public function createQuestion($field, $options)
    {
        return Form::createQuestion(
            [
                'label' => 'First Name',
                'description' => 'Description',
                'field_type' => $field,
                'options' => $options,
                'form_id' => $this->form->id,
            ]
        );
    }
}
