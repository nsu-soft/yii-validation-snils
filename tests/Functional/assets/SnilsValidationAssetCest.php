<?php


namespace Tests\Functional\assets;

use Tests\Support\FunctionalTester;

class SnilsValidationAssetCest
{
    public function _before(FunctionalTester $I): void
    {
    }

    // tests
    public function assetIsRegistered(FunctionalTester $I): void
    {
        $I->amOnPage('test/index');
        $I->seeInSource('snils.validation.js');
    }
}
