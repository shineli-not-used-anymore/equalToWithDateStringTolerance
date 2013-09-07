<?php
App::uses('AppComparatorScalar', 'Lib/TestSuite/Comparator');

class AppConstraintsIsArrayEqual extends PHPUnit_Framework_Constraint_IsEqual {

    public function __construct($value, $delta = 0, $maxDepth = 10, $canonicalize = FALSE, $ignoreCase = FALSE)
    {
        parent::__construct($value, $delta, $maxDepth, $canonicalize, $ignoreCase);

        if (!is_array($value)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'array');
        }
        PHPUnit_Framework_ComparatorFactory::getDefaultInstance()->register(
            new AppComparatorScalar()
        );
    }
}