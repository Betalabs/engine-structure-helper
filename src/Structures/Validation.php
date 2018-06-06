<?php

namespace Betalabs\StructureHelper\Structures;

use Betalabs\StructureHelper\TranslatorFactory;
use Illuminate\Validation\ValidationRuleParser;
use Illuminate\Validation\Validator;

class Validation extends Validator
{
    /**
     * Validation constructor.
     *
     * @param string $path
     * @param string $locale
     */
    public function __construct(string $path, string $locale)
    {
        parent::__construct(TranslatorFactory::create($path, $locale), [], []);
    }

    /**
     * Return error messages from all fields
     *
     * @param \Betalabs\StructureHelper\Structures\Component\Rule[] $fieldsRules
     *
     * @return array
     */
    public function allMessages(array $fieldsRules)
    {
        $validation = [];
        foreach ($fieldsRules as $rule) {
            $validation[$rule->getField()] = $this->fieldMessages(
                $rule->getField(),
                $rule->getRules()
            );
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