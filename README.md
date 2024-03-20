# Yii2 SNILS validation

The russian insurance number of the individual personal account (SNILS) validation for Yii2 framework.

## Installation

If you don't have Composer, you may install it by following instructions at [getcomposer.org](https://getcomposer.org/doc/00-intro.md).

Then you can install this library using the following command:

```bash
composer require nsu-soft/yii-validation-snils
```

## Usage

Validate SNILS:

```php
<?php

namespace app\forms;

use nsusoft\validators\SnilsValidator;
use yii\base\Model;

class SnilsForm extends Model
{
    public string $snils;
    
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
     * @return bool
     */
    public function save(): bool
    {
        if (!$this->validate()) {
            return false;
        }
        
        // other form logic
        
        return true; 
    }
}
```