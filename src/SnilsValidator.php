<?php


namespace nsusoft\validators;

use app\validators\assets\snils\SnilsValidationAsset;
use Yii;
use yii\helpers\Json;
use yii\validators\Validator;

class SnilsValidator extends Validator
{
    /**
     * @inheritDoc
     */
    public function init()
    {
        parent::init();

        if (null === $this->message) {
            $this->message = Yii::t('app', '"{attribute}" must be a valid SNILS.');
        }
    }

    /**
     * @inheritDoc
     */
    public function validateAttribute($model, $attribute): void
    {
        $snils = (string)$model->$attribute;

        if (!preg_match('/^\d{11}$/', $snils)) {
            $this->addError($model, $attribute, $this->message);
            return;
        }

        $sum = 0;

        for ($i = 0; $i < 9; $i++) {
            $sum += substr($snils, $i, 1) * (9 - $i);
        }

        $checkSum = $sum % 101 % 100;

        if ($checkSum === (int)substr($snils, -2)) {
            return;
        }

        $this->addError($model, $attribute, $this->message);
    }

    /**
     * @inheritdoc
     */
    public function clientValidateAttribute($model, $attribute, $view): string
    {
        SnilsValidationAsset::register($view);
        $options = $this->getClientOptions($model, $attribute);

        return 'yii.validation.snils(value, messages, ' . Json::htmlEncode($options) . ');';
    }

    /**
     * @inheritDoc
     */
    public function getClientOptions($model, $attribute): array
    {
        $label = $model->getAttributeLabel($attribute);

        $options = [
            'message' => $this->formatMessage($this->message, ['attribute' => $label]),
        ];

        if ($this->skipOnEmpty) {
            $options['skipOnEmpty'] = 1;
        }

        return $options;
    }
}