<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;
use App\Models\Mst_agent;

class CheckAgentDupRule implements ValidationRule
{
    public function __construct(protected int $id)
    {
        // 
    }

    /**
     * Run the validation rule.
     *
     * @param  Closure(string, ?string=): PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $qAgents = Mst_agent::where('id', '<>', $this->id)
        ->where('agent_code', $value)
        ->first();
        if ($qAgents){
            $fail('Agent code already in use. Use another agent code!');
        }
    }
}
