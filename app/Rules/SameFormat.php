<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class SameFormat implements ValidationRule
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
        if (pathinfo($value->getClientOriginalName(), PATHINFO_FILENAME) !== $this->template) {
            $fail("must be a valid format to the slug");
        }
    }
}
