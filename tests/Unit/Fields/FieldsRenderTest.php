<?php

namespace Musonza\Form\Tests\Unit;

use Form;
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
    public function testFieldRender($field, $expected)
    {
        $question = $this->createQuestion($field);

        $this->assertEquals($expected, $question->field()->render());
    }

    public function fieldsDataProvider()
    {
        return [
            [TextArea::class, '<textarea name="field_1" id="field_1"></textarea>'],
            [Text::class, '<input type="text" name="field_1" id="field_1">'],
        ];
    }

    public function createQuestion($field)
    {
        return Form::createQuestion(
            [
                'title' => 'First Name',
                'label' => 'First Name',
                'description' => 'Description',
                'field_type' => $field,
                'form_id' => $this->form->id,
            ]
        );
    }
}
