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
        // Update existing rows to ensure they comply with the new constraint
        DB::table('payments')->whereNotIn('payment_method', ['cash', 'bank_transfer', 'qris'])
            ->update(['payment_method' => 'cash']); // or any default value

        // Drop the existing constraint
        DB::statement('ALTER TABLE payments DROP CONSTRAINT IF EXISTS payment_method_check');

        // Alter the column to add the new value
        DB::statement("ALTER TABLE payments ALTER COLUMN payment_method TYPE VARCHAR(255) USING payment_method::VARCHAR");
        DB::statement("ALTER TABLE payments ADD CONSTRAINT payment_method_check CHECK (payment_method IN ('cash', 'bank_transfer', 'qris'))");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the existing constraint
        DB::statement('ALTER TABLE payments DROP CONSTRAINT IF EXISTS payment_method_check');

        // Revert the column to the original values
        DB::statement("ALTER TABLE payments ALTER COLUMN payment_method TYPE VARCHAR(255) USING payment_method::VARCHAR");
        DB::statement("ALTER TABLE payments ADD CONSTRAINT payment_method_check CHECK (payment_method IN ('cash', 'bank_transfer'))");
    }
};