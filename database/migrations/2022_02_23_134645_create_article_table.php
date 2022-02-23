<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article', function (Blueprint $table) {
            $table->string('CODE', 25)->default('')->index('CODE');
            $table->binary('DESCRIPTIF');
            $table->string('DESIGNATION', 50)->default('');
            $table->string('FAMILLE', 30)->default('');
            $table->string('ID_ARTICLE', 32)->default('')->primary();
            $table->longblob('PHOTO_PRINCIPALE_FICHIER_CONTENU');
            $table->dateTime('PHOTO_PRINCIPALE_FICHIER_DATE')->nullable()->index('PHOTO_PRINCIPALE_FICHIER_DATE');
            $table->string('PHOTO_PRINCIPALE_FICHIER_NOM', 100)->default('')->index('PHOTO_PRINCIPALE_FICHIER_NOM');
            $table->double('PHOTO_PRINCIPALE_FICHIER_TAILLE')->default(0);
            $table->string('PHOTO_PRINCIPALE_FICHIER_TYPE', 50)->default('');
            $table->longblob('PHOTO_PRINCIPALE_VIGNETTE_FICHIER_CONTENU');
            $table->dateTime('PHOTO_PRINCIPALE_VIGNETTE_FICHIER_DATE')->nullable()->index('PHOTO_PRINCIPALE_VIGNETTE_FICHIER_DATE');
            $table->string('PHOTO_PRINCIPALE_VIGNETTE_FICHIER_NOM', 100)->default('')->index('PHOTO_PRINCIPALE_VIGNETTE_FICHIER_NOM');
            $table->double('PHOTO_PRINCIPALE_VIGNETTE_FICHIER_TAILLE')->default(0);
            $table->string('PHOTO_PRINCIPALE_VIGNETTE_FICHIER_TYPE', 50)->default('');
            $table->double('PRIX_ACHAT')->default(0);
            $table->double('PRIX_VENTE')->default(0);
            $table->string('SOUS_FAMILLE', 25)->default('');
            $table->date('SYS_DATE_CREATION')->nullable();
            $table->date('SYS_DATE_MODIFICATION')->nullable();
            $table->time('SYS_HEURE_CREATION')->default('00:00:00');
            $table->time('SYS_HEURE_MODIFICATION')->default('00:00:00');
            $table->string('SYS_SYNCHRO_CODE_POSTE', 20)->default('')->index('SYS_SYNCHRO_CODE_POSTE');
            $table->dateTime('SYS_SYNCHRO_DATE_ENREG')->nullable()->index('SYS_SYNCHRO_DATE_ENREG');
            $table->string('SYS_USER_CREATION', 20)->default('');
            $table->string('SYS_USER_MODIFICATION', 20)->default('');
            $table->string('TYPE_LIAISON', 20)->default('')->index('TYPE_LIAISON');
            $table->string('UNITE_FAC', 10)->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article');
    }
}
