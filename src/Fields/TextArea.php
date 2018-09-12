<?php

namespace Musonza\Form\Fields;

class TextArea extends FormField
{
    public function render()
    {
        return "<textarea{$this->getAttributes()}></textarea>";
    }
}
