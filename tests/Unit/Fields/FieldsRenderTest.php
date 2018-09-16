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

    public function setUp()
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
                '<textarea name="field_1" id="field_1"></textarea>',
            ],
            [
                Text::class, [],
                '<input name="field_1" id="field_1" type="text" value="">',
            ],
            [
                Password::class, [],
                '<input name="field_1" id="field_1" type="password" value="">',
            ],
            [
                Radio::class, [],
                '<input name="field_1" id="field_1" type="radio" value="">',
            ],

            [
                Select::class,
                ['male', 'female'],
                '<select name="field_1" id="field_1"><option value="0" selected="selected">male</option><option value="1">female</option></select>',
            ],
            [
                Select::class,
                ['m' => 'male', 'f' => 'female'],
                '<select name="field_1" id="field_1"><option value="m">male</option><option value="f">female</option></select>',
            ],
        ];
    }

    public function createQuestion($field, $options)
    {
        return Form::createQuestion(
            [
                'title' => 'First Name',
                'label' => 'First Name',
                'description' => 'Description',
                'field_type' => $field,
                'options' => $options,
                'form_id' => $this->form->id,
            ]
        );
    }
}
