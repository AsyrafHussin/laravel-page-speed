<?php

namespace AsyrafHussin\LaravelPageSpeed\Test\Middleware;

use AsyrafHussin\LaravelPageSpeed\Middleware\TrimUrls;
use AsyrafHussin\LaravelPageSpeed\Test\TestCase;

class TrimUrlsTest extends TestCase
{
    protected function getMiddleware()
    {
        $this->middleware = new TrimUrls();
    }

    public function testTrimUrls()
    {
        $response = $this->middleware->handle($this->request, $this->getNext());

        $this->assertNotContains("https://", $response->getContent());
        $this->assertNotContains("http://", $response->getContent());
        $this->assertContains("//code.jquery.com/jquery-3.2.1.min.js", $response->getContent());
    }
}
