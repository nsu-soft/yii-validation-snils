<?php

return [
    'sourcePath' => __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'src',
    'languages' => ['ru-RU'],
    'translator' => 'SnilsValidator::t',
    'sort' => true,
    'removeUnused' => false,
    'markUnused' => true,
    'only' => ['*.php'],
    'except' => [
        '.gitignore',
        '.gitkeep',
        '/messages',
    ],
    'format' => 'php',
    'messagePath' => __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'messages',
    'overwrite' => true,
    'ignoreCategories' => [
        'yii',
        'manual',
    ],
];
