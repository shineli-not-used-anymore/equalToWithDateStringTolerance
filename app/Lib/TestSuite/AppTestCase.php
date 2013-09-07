<?php
App::uses('CakeTestCase', 'TestSuite');
App::uses('AppConstraintsIsArrayEqual', 'Lib/TestSuite/Constraint');

/**
 * CakeTestCase class
 *
 * @package       Cake.TestSuite
 */
abstract class AppTestCase extends CakeTestCase {

    /**
     * @throws PHPUnit_Framework_AssertionFailedError
     */
    public static function assertArrayEquals($expected, $actual, $message = '', $delta = 0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false)
    {
        self::assertThat(
            $actual,
            self::isArrayEqual(
                $expected,
                $delta,
                $maxDepth,
                $canonicalize,
                $ignoreCase
            ),
            $message
        );
    }

    /**
     *
     */
    public static function isArrayEqual($expected, $delta = 0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false)
    {
        return new AppConstraintsIsArrayEqual(
            $expected,
            $delta,
            $maxDepth,
            $canonicalize,
            $ignoreCase
        );
    }
}