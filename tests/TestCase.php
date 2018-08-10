<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Make ajax POST request
     * @param string $uri
     * @param array $data
     * @return \Illuminate\Foundation\Testing\TestResponse
     */
    protected function ajaxPost($uri, array $data = [])
    {
        return $this->post($uri, $data, ['HTTP_X-Requested-With' => 'XMLHttpRequest']);
    }

    /**
     * Make ajax GET request
     *
     * @param string $uri
     * @return \Illuminate\Foundation\Testing\TestResponse
     */
    protected function ajaxGet($uri)
    {
        return $this->get($uri, ['HTTP_X-Requested-With' => 'XMLHttpRequest']);
    }
}
