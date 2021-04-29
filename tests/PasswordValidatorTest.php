<?php
/**
 *
 * @author Gaspare Joubert <gasparejoubert@gascosolutions.com>
 */

require ('C:\Users\gaspa\PhpstormProjects\sms\PasswordValidator.php');

use App\PasswordValidator;
use PHPUnit\Framework\TestCase;

class PasswordValidatorTest extends TestCase
{
    /**
     * Must return true:
     * <p>if string length is > 8
     * <p>and contains at least one upper case
     */
    public function testTrueIfGreaterThanAndUppercase(): void
    {
        $stringToTest = '123456789FF';
        $testString = new PasswordValidator();
        $testString = $testString->validateStringAsPassword($stringToTest);
        self::assertTrue($testString);
    }

    /**
     * Must return an error message:
     * <p>if string length is less or equal to 8
     * <p>and contains no upper case
     */
    public function testErrorMessage(): void
    {
        $stringToTest = '12345678';
        $testString = new PasswordValidator();
        $testString = $testString->validateStringAsPassword($stringToTest);
        self::assertEquals(PasswordValidator::ERROR_MESSAGE, $testString);
    }

    /**
     * Must return true:
     * <p>if the string contains at least one upper case.
     */
    public function testTrueWhenUpperCaseInString(): void
    {
        $stringToTest = 'MytestS12';
        $testString = new PasswordValidator();
        $testString = $testString->isPartUppercase($stringToTest);
        self::assertTrue($testString);
    }

    /**
     * Must return false:
     * <p>if the string does not contain at least one upper case.
     */
    public function testFalseWhenNoUpperCaseInString(): void
    {
        $stringToTest = 'mytests12';
        $testString = new PasswordValidator();
        $testString = $testString->isPartUppercase($stringToTest);
        self::assertFalse($testString);
    }
}
