<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Setting;
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
		$settings = Setting::getValueByManyKeys(['site-info', 'site-social']);

        $data = [
            'site-info' => Setting::getValuebyKey('site-info'),
            'site-social' => Setting::getValuebyKey('site-social')
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

        Setting::updateManyValuesByKeys($updatedData);

		$result = Setting::getValueByManyKeys(['site-info', 'some-setting']);
		
		$this->assertEquals($site, $result['site-info']);
		$this->assertEquals($someSettings, $result['some-setting']);

    }
}
