<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MigrationTest extends TestCase
{
    public function test_count_migration(): void
    {
        $this->assertDatabaseCount('migrations', 17);
    }
}
