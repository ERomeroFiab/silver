<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles_photos', function (Blueprint $table) {
            $table->string('ID_ARTICLES_PHOTOS', 32)->default('')->primary();
            $table->longblob('PHOTO_FICHIER_CONTENU');
            $table->dateTime('PHOTO_FICHIER_DATE')->nullable()->index('PHOTO_FICHIER_DATE');
            $table->string('PHOTO_FICHIER_NOM', 100)->default('')->index('PHOTO_FICHIER_NOM');
            $table->double('PHOTO_FICHIER_TAILLE')->default(0);
            $table->string('PHOTO_FICHIER_TYPE', 50)->default('');
            $table->string('PID_ARTICLE', 32)->default('')->index('PID_ARTICLE');
            $table->date('SYS_DATE_CREATION')->nullable()->index('SYS_DATE_CREATION');
            $table->date('SYS_DATE_MODIFICATION')->nullable()->index('SYS_DATE_MODIFICATION');
            $table->time('SYS_HEURE_CREATION')->default('00:00:00')->index('SYS_HEURE_CREATION');
            $table->time('SYS_HEURE_MODIFICATION')->default('00:00:00')->index('SYS_HEURE_MODIFICATION');
            $table->string('SYS_SYNCHRO_CODE_POSTE', 20)->default('')->index('SYS_SYNCHRO_CODE_POSTE');
            $table->dateTime('SYS_SYNCHRO_DATE_ENREG')->nullable()->index('SYS_SYNCHRO_DATE_ENREG');
            $table->string('SYS_USER_CREATION', 20)->default('')->index('SYS_USER_CREATION');
            $table->string('SYS_USER_MODIFICATION', 20)->default('')->index('SYS_USER_MODIFICATION');
            $table->longblob('VIGNETTE_FICHIER_CONTENU');
            $table->dateTime('VIGNETTE_FICHIER_DATE')->nullable()->index('VIGNETTE_FICHIER_DATE');
            $table->string('VIGNETTE_FICHIER_NOM', 100)->default('')->index('VIGNETTE_FICHIER_NOM');
            $table->double('VIGNETTE_FICHIER_TAILLE')->default(0);
            $table->string('VIGNETTE_FICHIER_TYPE', 50)->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles_photos');
    }
}
