<?php

namespace Musonza\Form\Tests\Browser\Pages;

use Laravel\Dusk\Browser;

class Forms extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/forms';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param Browser $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser->assertTitleContains('Forms')
            ->assertSee('Forms')
            ->assertSee('Create Form');
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            //
        ];
    }
}
