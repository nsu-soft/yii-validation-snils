<?php

namespace app\forms;

use nsusoft\validators\SnilsValidator;
use yii\base\Model;

class SnilsForm extends Model
{
    /**
     * @var string|null
     */
    public ?string $snils = null;

    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            [['snils'], SnilsValidator::class],
        ];
    }

    /**
     * @return bool
     */
    public function save(): bool
    {
        if (!$this->validate()) {
            return false;
        }

        return true;
    }
}