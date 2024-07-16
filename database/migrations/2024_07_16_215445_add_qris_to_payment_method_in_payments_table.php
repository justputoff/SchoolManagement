<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Drop the existing constraint if it exists
        DB::statement('ALTER TABLE payments DROP CONSTRAINT IF EXISTS payment_method_check');

        // Alter the column to change its type to VARCHAR
        DB::statement("ALTER TABLE payments ALTER COLUMN payment_method TYPE VARCHAR(255) USING payment_method::VARCHAR");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert the column to its original ENUM type
        DB::statement("ALTER TABLE payments ALTER COLUMN payment_method TYPE ENUM('cash', 'bank_transfer') USING payment_method::ENUM");
    }
};