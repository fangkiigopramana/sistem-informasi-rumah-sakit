<?php

use App\Models\Dokter;
use App\Models\Pasien;
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
        Schema::create('data_rekam_medis', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Pasien::class,'pasien_id');
            $table->string('keluhan');
            $table->foreignIdFor(Dokter::class,'dokter_id');
            $table->string('diagnosis');
            // $table->timestamp('deleted_at');
            $table->softDeletes();
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
        Schema::dropIfExists('data_rekam_medis');
    }
};
