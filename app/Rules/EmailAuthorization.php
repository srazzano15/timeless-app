<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;



class EmailAuthorization implements Rule
{
    public $email;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct($email = null)
    {
        $this->email = $email;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  string  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (!$this->email) {
            return true;
        }
        if (str_contains($value, $this->email)) {
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'You\'re not authorized to use this application';
    }
}
