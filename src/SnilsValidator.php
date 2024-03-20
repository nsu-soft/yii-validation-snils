<?php

namespace nsusoft\validators;

use nsusoft\validators\assets\SnilsValidationAsset;
use Yii;
use yii\helpers\Json;
use yii\validators\Validator;

class SnilsValidator extends Validator
{
    /**
     * @inheritDoc
     */
    public function init(): void
    {
        parent::init();
        $this->registerTranslations();

        if (null === $this->message) {
            $this->message = SnilsValidator::t('main', '"{attribute}" must be a valid SNILS.');
        }
    }

    /**
     * @return void
     */
    public function registerTranslations(): void
    {
        Yii::$app->i18n->translations['validators/snils/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en-US',
            'basePath' => __dir__ . '/messages',
            'fileMap' => [
                'validators/snils/main' => 'main.php',
            ],
        ];
    }

    /**
     * @see Yii::t()
     * @param string $category
     * @param string $message
     * @param array $params
     * @param string|null $language
     * @return string
     */
    public static function t(string $category, string $message, array $params = [], ?string $language = null): string
    {
        return Yii::t("validators/snils/{$category}", $message, $params, $language);
    }

    /**
     * @inheritDoc
     */
    public function validateValue($value): ?array
    {
        if (!preg_match('/^\d{11}$/', $value)) {
            return [$this->message, []];
        }

        if ($this->calculateCheckSum($value) !== (int)substr($value, -2)) {
            return [$this->message, []];
        }

        return null;
    }

    /**
     * @param string $snils
     * @return int
     */
    private function calculateCheckSum(string $snils): int
    {
        $sum = 0;

        for ($i = 0; $i < 9; $i++) {
            $sum += substr($snils, $i, 1) * (9 - $i);
        }

        return $sum % 101 % 100;
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