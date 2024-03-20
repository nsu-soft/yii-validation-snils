<?php

namespace nsusoft\validators\assets;

use yii\validators\ValidationAsset;
use yii\web\AssetBundle;

class SnilsValidationAsset extends AssetBundle
{
    public $sourcePath = __dir__ . '/source';

    public $js = [
        'js/snils.validation.js',
    ];

    public $depends = [
        ValidationAsset::class,
    ];
}