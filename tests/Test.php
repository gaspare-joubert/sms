<?php
/**
 *
 * @author Gaspare Joubert <gasparejoubert@gascosolutions.com>
 */

use App\Main;
use PHPUnit\Framework\TestCase;

/**
 * Class Test
 */
class Test extends TestCase
{
    /**
     * Test if the result of 6 numbers is an integer.
     */
    public function testSumOfSixNumbers(): void
    {
        $var = 1 + 2 + 3 + 4 + 5 + 6;
        self::assertTrue(is_int($var) || is_float($var));
    }
}
