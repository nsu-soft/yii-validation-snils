<?php

namespace Tests\Unit\fixtures;

use ArrayAccess;
use Countable;
use IteratorAggregate;
use yii\base\ArrayAccessTrait;
use yii\base\InvalidConfigException;
use yii\test\FileFixtureTrait;
use yii\test\Fixture;

class SnilsFixture extends Fixture implements IteratorAggregate, ArrayAccess, Countable
{
    use ArrayAccessTrait;
    use FileFixtureTrait;

    /**
     * @var array
     */
    public array $data = [];

    /**
     * @return void
     * @throws InvalidConfigException
     */
    public function load(): void
    {
        $this->data = $this->loadData(__dir__ . '/data/snils.php');
    }
}