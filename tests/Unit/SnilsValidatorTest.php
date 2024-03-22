<?php


namespace Tests\Unit;

use Codeception\Test\Unit;
use nsusoft\validators\SnilsValidator;
use Tests\Support\UnitTester;
use Tests\Unit\fixtures\SnilsFixture;

class SnilsValidatorTest extends Unit
{
    protected UnitTester $tester;

    protected function _before()
    {
    }

    public function _fixtures(): array
    {
        return ['snils' => SnilsFixture::class];
}

    public function testValidationSuccess(UnitTester $I): void
    {
        $validator = new SnilsValidator();
        $snils = $I->grabFixture('snils', 'correctSnils');
        $this->assertTrue($validator->validate($snils['value']));
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
