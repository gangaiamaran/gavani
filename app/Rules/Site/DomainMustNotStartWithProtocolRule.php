<?php

namespace App\Rules\Site;

use Illuminate\Support\Str;
use Illuminate\Contracts\Validation\Rule;

class DomainMustNotStartWithProtocolRule implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return ! Str::of($value)
                ->startsWith([
                    'http',
                    'http',
                ]);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must not start with protocol';
    }
}
