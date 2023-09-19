<?php

namespace Tests\Feature;

use Tests\TestCase;

class LegacyTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

    }

    /**
     * A basic feature test example.
     */
    public function test_that_biz_search_works(): void
    {
        $response = $this->get('/biz_search/CHOP');
        $response->assertStatus(200);
    }
}
