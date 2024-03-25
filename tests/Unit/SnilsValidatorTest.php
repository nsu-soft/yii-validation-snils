<?php


namespace Tests\Unit;

use app\forms\SnilsForm;
use Codeception\Test\Unit;
use nsusoft\validators\SnilsValidator;
use Tests\Support\UnitTester;
use Yii;
use yii\validators\Validator;

class SnilsValidatorTest extends Unit
{
    const CORRECT_SNILS = '72340627370';
    const INCORRECT_SNILS = '72340627371';
    const INCORRECT_SNILS_TEXT = 'abc';

    protected UnitTester $tester;

    protected function _before()
    {
    }

    public function testCorrectSnils(): void
    {
        $validator = new SnilsValidator();
        $this->assertTrue($validator->validate(self::CORRECT_SNILS));
    }

    public function testIncorrectDigitSnils(): void
    {
        $validator = new SnilsValidator();
        $this->assertFalse($validator->validate(self::INCORRECT_SNILS));
    }

    public function testIncorrectNoDigitSnils(): void
    {
        $validator = new SnilsValidator();
        $this->assertFalse($validator->validate(self::INCORRECT_SNILS_TEXT));
    }

    public function testErrorMessage(): void
    {
        $message = 'Incorrect SNILS';
        $validator = new SnilsValidator(['message' => $message]);
        $validator->validate(self::INCORRECT_SNILS, $error);
        $this->assertEquals($message, $error);
    }

    public function testI18nErrorMessage(): void
    {
        Yii::$app->language = 'ru-RU';
        $ruMessage = 'Значение "SNILS" должно быть действительным СНИЛС.';
        $attribute = 'snils';

        $model = new SnilsForm([$attribute => self::INCORRECT_SNILS]);
        $validator = Validator::createValidator(SnilsValidator::class, $model, $attribute);

        $validator->validateAttribute($model, $attribute);
        $this->assertEquals($ruMessage, $model->getFirstError($attribute));
    }
}
