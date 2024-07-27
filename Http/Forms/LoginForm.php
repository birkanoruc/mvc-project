<?php

namespace Http\Forms;
use Core\Validator;
use Core\Form;

class LoginForm extends Form
{
    protected function validateAttributes(): void
    {
        if(! Validator::email($this->attributes["email"])){
            $this->errors["email"] = "Please provide a valid email address.";
        }
        if(! Validator::string($this->attributes["password"])){
            $this->errors["password"] = "Please provide a valid password.";
        }
    }
}