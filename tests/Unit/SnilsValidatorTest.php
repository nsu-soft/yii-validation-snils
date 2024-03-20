<?php


namespace Tests\Unit;

use Codeception\Test\Unit;
use nsusoft\validators\SnilsValidator;
use Tests\Support\UnitTester;

class SnilsValidatorTest extends Unit
{
    protected UnitTester $tester;

    protected ?SnilsValidator $validator;

    protected function _before()
    {
        $this->validator = new SnilsValidator();
    }

    public function testValidationSuccess()
    {
        $this->assertTrue($this->validator->validate('72340627370'));
    }

    public function testValidationError()
    {
        $this->assertFalse($this->validator->validate('72340627371'));
    }
}
