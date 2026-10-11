<?php

namespace Tests;

use App\Services\ExamGradingService;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function tearDown(): void
    {
        ExamGradingService::clearMemoryCache();
        parent::tearDown();
    }
}
