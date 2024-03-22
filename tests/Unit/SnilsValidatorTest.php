<?php


namespace Tests\Unit;

use Codeception\Test\Unit;
use nsusoft\validators\SnilsValidator;
use Tests\Support\UnitTester;

class SnilsValidatorTest extends Unit
{
    protected UnitTester $tester;

    protected function _before()
    {
    }

    public function testValidationSuccess(): void
    {
        $validator = new SnilsValidator();
        $this->assertTrue($validator->validate('72340627370'));
    }

    public function testValidationError(): void
    {
        $validator = new SnilsValidator();
        $this->assertFalse($validator->validate('72340627371'));
    }

    public function testSpecifyingErrorMessage(): void
    {
        $message = 'Incorrect SNILS';
        $validator = new SnilsValidator(['message' => $message]);
        $validator->validate('72340627371', $error);
        $this->assertEquals($message, $error);
    }
}
