<?php

namespace Http\Forms;
use Core\Validator;
use Core\Form;

class CreateNoteForm extends Form
{
    protected function validateAttributes(): void
    {
        if(! Validator::string($this->attributes["body"],1,1000)){
            $this->errors["body"] = "A body of no more than 1.000 characters is required.";
        }
    }
}