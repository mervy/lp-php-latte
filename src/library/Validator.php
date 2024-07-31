<?php

namespace LPWithLatte\library;

class Validator
{
    private $errors = [];

    /**
     * Sanitizes an array of input data to prevent XSS attacks.
     *
     * This function takes an array of input data and sanitizes it using the
     * `FILTER_SANITIZE_SPECIAL_CHARS` filter. This filter replaces special
     * characters with their HTML entities, which helps prevent XSS attacks.
     *
     * @param array $data The input data to be sanitized.
     * @return array The sanitized input data.
     */
    public function sanitize($data)
    {
        // Use the FILTER_SANITIZE_SPECIAL_CHARS filter to sanitize the input data
        return filter_var_array($data, FILTER_SANITIZE_SPECIAL_CHARS);
    }

    /**
     * Validates the input data against the specified rules.
     *
     * This function checks each field in the input data against the specified
     * rules and adds any validation errors to the internal errors array.
     *
     * @param array $data The input data to be validated.
     * @param array $rules The validation rules for each field.
     * @return bool Returns true if the input data passes all validation rules,
     *              false otherwise.
     */
    public function validate($data, $rules)
    {
        // Loop through each field in the input data
        foreach ($rules as $field => $rule) {
            // Get the value of the field from the input data
            $value = $data[$field] ?? '';

            // Check if the field is required and empty
            if ($rule === "required" && empty($value)) {
                // Add an error message to the internal errors array
                $this->errors[$field] =  "O campo {$field} é obrigatório";
            } 
            // Check if the field is an email and not valid
            elseif ($rule === 'email' && !filter_var($value, FILTER_SANITIZE_EMAIL)) {
                // Add an error message to the internal errors array
                $this->errors[$field] = "Digite um e-mail válido";
            }
        }
        
        // Return true if there are no errors, false otherwise
        return empty($this->errors);
    }


    /**
     * Returns an array of validation errors.
     *
     * This function returns the internal errors array, which contains
     * validation error messages for each field that failed validation.
     *
     * @return array An array of validation error messages.
     */
    public function getErrors()
    {
        // Return the internal errors array
        return $this->errors;
    }
}