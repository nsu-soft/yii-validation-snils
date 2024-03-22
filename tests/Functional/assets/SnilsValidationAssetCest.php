<?php


namespace Tests\Functional\assets;

use Tests\Support\FunctionalTester;

class SnilsValidationAssetCest
{
    public function _before(FunctionalTester $I): void
    {
    }

    public function assetIsRegistered(FunctionalTester $I): void
    {
        $I->amOnPage('index-test.php?r=test/index');
        $I->seeInSource('snils.validation.js');
    }
}
