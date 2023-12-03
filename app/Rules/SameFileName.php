<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class SameFileName implements ValidationRule
{
    protected $template;

    public function __construct(string $template){
        $this->template = $template;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($value->getClientOriginalName() !== $this->template) {
            $fail("file name must be: $this->template");
        }
    }
}
