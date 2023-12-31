<?php
class FormValidation
{
    public static function validateInput($inputName)
    {
        return isset($_POST[$inputName]) ? $_POST[$inputName] : '';
    }

}