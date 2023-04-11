<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function responseResourceStructure($items = []): array
    {
        return [
            'data' => $items,
            'message'
        ];
    }
}
