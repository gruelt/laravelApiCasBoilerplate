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
        Schema::create('vlans', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Vlan Name , by usage');
            $table->integer('vlanid')->unique()->comment('Vlan number');
            $table->string('cidr')->comment('Network Cidr address');
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->foreignId('location_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vlans');
    }
};
