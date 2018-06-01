<?php

namespace Betalabs\StructureHelper\Structures;

use Illuminate\Contracts\Translation\Translator;
use Illuminate\Validation\ValidationRuleParser;
use Illuminate\Validation\Validator;

class Validation extends Validator
{
    /**
     * Validation constructor.
     */
    public function __construct()
    {
        parent::__construct(resolve(Translator::class), [], []);
    }

    /**
     * Return error messages from all fields
     *
     * @param array $fieldsRules
     *
     * @return array
     */
    public function allMessages($fieldsRules)
    {
        $validation = [];

        foreach ($fieldsRules as $field => $rules) {
            $validation[$field] = $this->fieldMessages($field, $rules);
        }

        return $validation;
    }

    /**
     * Return error message from specific field
     *
     * @param string $field
     * @param array $rules
     *
     * @return mixed
     */
    protected function fieldMessages($field, $rules)
    {
        $validation = [];
        $rules = is_array($rules) ? $rules : explode('|', $rules);

        foreach ($rules as $rule) {
            $validation[(string)$rule] = $this->makeMessage($field, $rule);
        }

        return $validation;
    }

    /**
     * Build string message based on field and rule
     *
     * @param $field
     * @param $rule
     *
     * @return string
     */
    private function makeMessage($field, $rule)
    {
        [$ruleName, $parameters] = ValidationRuleParser::parse($rule);

        return $this->makeReplacements(
            $this->getMessage($field, $ruleName),
            $field,
            $ruleName,
            $parameters
        );
    }

}