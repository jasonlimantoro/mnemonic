<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Setting;
use SettingsTableSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SettingsByKeyTest extends TestCase
{
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();
        (new SettingsTableSeeder)->run();
    }

    public function testGetValuByKeysMany()
    {
        $settings = Setting::getManyValueByKeys(['site-info', 'some-setting']);

        $data = [
            'site-info' => Setting::getValuebyKey('site-info'),
            'some-setting' => Setting::getValuebyKey('some-setting')
        ];

        $this->assertEquals($data, $settings);
    }

    public function testGetContactDetails()
    {
        $keyword = 'awesome';

        $result = Setting::getJSONValueFromKeyField('site-info', 'keywords');

        $this->assertEquals($keyword, $result);
    }

    public function testupdateManyByKeys()
    {
		$site = (object) [
			'admin-email' => 'new email',
			'title' => 'new title',
			'description' => 'new description'
		];
		$someSettings = (object) [
			'some-new-key' => 'some-new-value',
			'last-new-key' => 'last-new-value'
		];
        $updatedData = [
            'site-info' => $site,
            'some-setting' => $someSettings,
        ];

        Setting::updateManyByKeys($updatedData);

		$result = Setting::getManyValueByKeys(['site-info', 'some-setting']);
		
		$this->assertEquals($site, $result['site-info']);
		$this->assertEquals($someSettings, $result['some-setting']);

    }
}
