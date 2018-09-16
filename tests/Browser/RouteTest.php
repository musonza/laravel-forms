<?php

namespace Musonza\Form\Tests\Browser;

use Laravel\Dusk\Browser;
use Musonza\Form\Tests\BrowserTestCase;

class RouteTest extends BrowserTestCase
{
    public function testCanUseDusk()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('hello')
                ->assertSee('hello world');
        });
    }
}
