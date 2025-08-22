<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('document', 11)->after('name');
            $table->enum('role', ['admin', 'employee'])->default('employee')->after('document');
            $table->string('position')->after('role');
            $table->date('birth_date')->after('position');
            $table->foreignId('created_by')->after('birth_date')->nullable()->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'document',
                'role',
                'position',
                'birth_date',
                'created_by'
            ]);
        });
    }
};
