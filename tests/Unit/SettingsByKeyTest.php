<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Setting;
use SettingsTableSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SettingsByKeyTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();
        (new SettingsTableSeeder)->run();
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetValuByKeysMany()
    {
        $settings = Setting::getManyValueByKeys(['admin-email', 'site-contact']);

        $data = [
            'admin-email' => Setting::getValuebyKey('admin-email'),
            'site-contact' => Setting::getValuebyKey('site-contact')
        ];

        $this->assertEquals($data, $settings);
    }

    public function testGetContactDetails()
    {
        $region = 'North Carolina';

        $result = Setting::getJSONValueFromKeyField('site-contact', 'region');

        $this->assertEquals($region, $result);
    }

    public function testupdateManyByKeys()
    {
        $updatedData = [
            'admin-email' => 'newadmin@example.com',
            'site-title' => 'Brand New Site Laracast',
            'site-description' => 'Brand New Description',
        ];

        Setting::updateManyByKeys($updatedData);

        $result = Setting::getManyValueByKeys(['admin-email', 'site-title', 'site-description']);

        $this->assertEquals($updatedData, $result);
    }
}
