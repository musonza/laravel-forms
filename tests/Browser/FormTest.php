<?php

namespace Musonza\Form\Tests\Browser;

use Form;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Musonza\Form\Tests\BrowserTestCase;
use Musonza\Form\Tests\Browser\Pages\Forms;

class FormTest extends BrowserTestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();
        Form::create(['title' => 'Contact Form1']);
    }

    public function testCreateViewUpdateDeleteForm()
    {
        // $this->withoutExceptionHandling();

        $this->browse(function (Browser $browser) {
            $browser->visit(new Forms())

            // Create a Form
                ->press('Create Form')
                ->assertSee('New Form')
                ->type('title', 'My Form')
                ->type('description', 'This is my description')
                ->press('Save')
                ->assertSee('created')

            // View a Form
                ->clickLink('View')
                ->assertSee('Form Details')

            // Update a Form
                ->visit(new Forms())
                ->clickLink('Edit')
                ->assertSee('Edit Form')
                ->type('title', 'My Updated Form')
                ->type('description', 'This is my updated description')
                ->press('Save')
                ->assertSee('updated')

            // Delete a Form
                ->clickLink('Delete')
                ->acceptDialog();
        });
    }
}
