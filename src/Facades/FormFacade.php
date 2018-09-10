<?php

namespace Musonza\Form\Facades;

use Illuminate\Support\Facades\Facade;

class FormFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     * @codeCoverageIgnore
     */
    protected static function getFacadeAccessor()
    {
        return 'form';
    }
}
