<?php

namespace Musonza\Form\Services;

use Musonza\Form\Models\Form;

class FormService
{
    public function __construct(Form $form)
    {
        $this->form = $form;
    }

    public function create(array $data)
    {
        return $this->form->create($data);
    }

    public function getById($id)
    {
        return $this->form->findOrFail($id);
    }
}
