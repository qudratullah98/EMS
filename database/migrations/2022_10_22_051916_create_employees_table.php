<?php

use App\Models\city;
use App\Models\country;
use App\Models\department;
use App\Models\stat;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("last_name");
            $table->string("addrass");
            $table->foreignIdFor(country::class,"country_id")->constrained();
            $table->foreignIdFor(city::class,"city_id")->constrained();
            $table->foreignIdFor(stat::class,"stat_id")->constrained();
            $table->foreignIdFor(department::class,"department_id")->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
