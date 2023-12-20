<?php
class FormValidation
{
    public function validateInput($inputName)
    {
        return isset($_POST[$inputName]) ? $_POST[$inputName] : '';
    }
}