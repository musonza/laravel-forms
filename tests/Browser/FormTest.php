<?php

namespace Musonza\Form\Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Musonza\Form\Tests\BrowserTestCase;
use Musonza\Form\Tests\Browser\Pages\Forms;

class FormTest extends BrowserTestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    public function testCreateForm()
    {
        $this->withoutExceptionHandling();

        $this->browse(function (Browser $browser) {
            $browser->visit(new Forms());

            // ->assertSee('200');
        });
    }
}
