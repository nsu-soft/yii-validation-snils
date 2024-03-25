<?php

namespace app\forms;

use nsusoft\validators\SnilsValidator;
use Yii;
use yii\base\Model;

class SnilsForm extends Model
{
    /**
     * @var string|null
     */
    public ?string $snils = null;

    /**
     * @inheritDoc
     */
    public function rules(): array
    {
        return [
            [['snils'], SnilsValidator::class],
        ];
    }

    /**
     * @inheritDoc
     */
    public function attributeLabels(): array
    {
        return [
            'snils' => Yii::t('app', "SNILS"),
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