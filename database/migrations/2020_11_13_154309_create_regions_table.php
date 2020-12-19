<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regions', function (Blueprint $table) {
            $table->id();
            $table->string('region', 100);
            $table->timestamps();
            $table->unique(['area_id', 'region']);
            $table->foreignId('area_id')->constrained('areas')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('regions');
        Schema::table('regions', function (Blueprint $table) {
            $table->dropIfExists('regions');
            $table->dropForeign(['area_id',]);
        });
    }
}
