<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('domain_events', function (Blueprint $table) {
            $table->string('event_id', 36)->primary();
            $table->timestamp('occurred_on', 6);
            $table->string('event_type');
            $table->string('aggregate_id');
            $table->json('payload');

            $table->index('aggregate_id');
            $table->index('occurred_on');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('domain_events');
    }
};
