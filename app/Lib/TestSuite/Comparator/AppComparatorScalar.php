<?php
class AppComparatorScalar extends PHPUnit_Framework_Comparator_Scalar
{
    public function assertEquals($expected, $actual, $delta = 0, $canonicalize = FALSE, $ignoreCase = FALSE)
    {
        $expectedDate = date_parse($expected);
        $actualDate = date_parse($actual);

        if (!$expectedDate['error_count'] && !$actualDate['error_count']) {

            if (abs(strtotime($expected) - strtotime($actual)) > $delta) {
                $message = 'Failed asserting that %s matches expected %s'
                    . ($delta ? ' within ' . $delta . __n('second', 'seconds', $delta) : '') . '.';

                throw new PHPUnit_Framework_ComparisonFailure(
                    $expected,
                    $actual,
                    '',
                    '',
                    FALSE,
                    sprintf(
                        $message,
                        PHPUnit_Util_Type::export($actual),
                        PHPUnit_Util_Type::export($expected)
                    )
                );
            }
        } else {
            parent::assertEquals($expected, $actual, $delta, $canonicalize, $ignoreCase);
        }

    }
}