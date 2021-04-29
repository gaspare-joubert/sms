<?php
/**
 *
 * @author Gaspare Joubert <gasparejoubert@gascosolutions.com>
 */

declare(strict_types=1);

namespace App;

use JetBrains\PhpStorm\Pure;

/**
 * Class PasswordValidator
 */
class PasswordValidator
{
    public const ERROR_MESSAGE = 'Validation failed: length is <= 8 and has no upper case.';

    /**
     * Validate string as password
     *
     * @param string $stringToValidate
     * @return bool|string
     */
    #[Pure] public function validateStringAsPassword(string $stringToValidate): bool|string
    {
        return $this->validationRules($stringToValidate);
    }

    /**
     * Apply validation rules to string
     *
     * @param string $stringToValidate
     * @return bool|string
     */
    #[Pure] private function validationRules(string $stringToValidate): bool|string
    {
        $outputErrorMessage = '';
        if (strlen($stringToValidate) > 8 && $this->isPartUppercase($stringToValidate)) {
            return true;
        } elseif (strlen($stringToValidate) <= 8 && !($this->isPartUppercase($stringToValidate))) {
            $outputErrorMessage = self::ERROR_MESSAGE;

            return $outputErrorMessage;
        } else {
            return false;
        }
    }

    /**
     * Check for at least one uppercase in string
     *
     * @param $string
     * @return bool
     */
    public function isPartUppercase(string $string): bool
    {
        if (preg_match("/[A-Z]/", $string)) {
            return true;
        }

        return false;
    }
}
