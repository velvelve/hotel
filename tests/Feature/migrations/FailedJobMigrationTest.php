<?php

namespace Tests\Feature\migrations;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class FailedJobMigrationTest extends TestCase
{
    public function test_example(): void
    {
        // Проверяем, что таблица "failed_jobs" была создана
        $this->assertTrue(Schema::hasTable('failed_jobs'));

        // Проверяем столбцы таблицы "failed_jobs"
        $this->assertTrue(Schema::hasColumns('failed_jobs', [
            'id',
            'uuid',
            'connection',
            'queue',
            'payload',
            'exception',
            'failed_at',
        ]));
    }
}
