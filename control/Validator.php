<?php

class Validator
{
    public $validated;

    public function __construct()
    {
        $this->validated = true;
        $_SESSION['validate_errors'] = [];
    }

    public function validate($input, array $data)
    {
        $errors = [];

        foreach ($data as $key => $value) {
            
            $rules = explode('|', $value);
            
            foreach ($rules as $rule) {
                
                switch ($rule) {
                    
                    case 'required':
                        if (trim($input[$key]) == '') {
                            $errors[] = "Поле {$key} обязательно для заполнения";
                        }
                        break;
                    
                    case 'login':
                        $pattern = '#^[a-zA-Z0-9_]{3,20}$#';
                        if (preg_match($pattern, $input[$key]) != 1) {
                            $errors[] = "Поле {$key} не соответствует формату login (латинские буквы, цифры и символ подчеркивания) от 3 до 20 символов";
                        }
                        break;

                    case 'email':
                        $pattern = '#^\w+[\w\.]*@[\w\.]+\.\w+$#';
                        if (preg_match($pattern, strtolower($input[$key])) != 1) {
                            $errors[] = "Поле {$key} не соответствует формату электронной почты";
                        }
                        break;

                    case 'only_digits':
                        $pattern = '#^[0-9]*$#';
                        if (preg_match($pattern, $input[$key]) != 1) {
                            $errors[] = "Поле {$key} не соответствует формату только цифры";
                        }
                        break;
                }

            }
        }
        if (count($errors) > 0) {$this->validated = false;}

        $_SESSION['validate_errors'] = $errors;
    }
}