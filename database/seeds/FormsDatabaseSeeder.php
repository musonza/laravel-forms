<?php

use Illuminate\Database\Seeder;
use Musonza\Form\Fields\Text;
use Musonza\Form\Fields\TextArea;
use Musonza\Form\Models\Form;
use Musonza\Form\Models\Question;

class FormsDatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $fieldTypes = ['text', 'textarea', 'checkbox', 'radio', 'select'];
        $props = [];
        $props['choices'] = [
            [
                'label' => 'Choice1',
                'recode' => 1,
            ],
            [
                'label' => 'Choice2',
                'description' => 'This is a test description',
                'attachment' => [
                    "type" => "image",
                    "href" => "http://example.com/img",
                ],
            ],
            ['label' => 'Choice3', 'recode' => 3],
        ];

        factory(Form::class, 55)->create()->each(function ($form) use ($props) {
            $form->questions()->save(factory(Question::class)->make([
                'form_id' => $form->id,
                'field_type' => Text::class,
            ]));
            $form->questions()->save(factory(Question::class)->make([
                'form_id' => $form->id,
                'field_type' => TextArea::class,
            ]));
            $form->questions()->save(factory(Question::class)->make([
                'form_id' => $form->id,
                'field_type' => Text::class,
                'properties' => $props,
            ]));
            $form->questions()->save(factory(Question::class)->make([
                'form_id' => $form->id,
                'field_type' => Text::class,
                'properties' => $props,
            ]));
            $form->questions()->save(factory(Question::class)->make([
                'form_id' => $form->id,
                'field_type' => Text::class,
                'properties' => $props,
            ]));
        });
    }
}
