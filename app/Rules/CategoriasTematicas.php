<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CategoriasTematicas implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value1, $value2
     * @return bool
     */
    public function passes($attribute, $value)
    {
if ($value < 5) {
  return $value <> $_POST["Opcion1DeCategoriaTematica"];
} else {
  return $value = 5;
}

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Las categorías deben ser diferentes';
    }
}
