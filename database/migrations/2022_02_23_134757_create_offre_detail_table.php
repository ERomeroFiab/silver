<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffreDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offre_detail', function (Blueprint $table) {
            $table->string('CODE_ARTICLE', 20)->default('');
            $table->binary('DESC_ARTICLE');
            $table->string('ID_OFFRE_DETAIL', 32)->default('')->primary();
            $table->longblob('IMAGE_GM_FICHIER_CONTENU');
            $table->dateTime('IMAGE_GM_FICHIER_DATE')->nullable()->index('IMAGE_GM_FICHIER_DATE');
            $table->string('IMAGE_GM_FICHIER_NOM', 100)->default('')->index('IMAGE_GM_FICHIER_NOM');
            $table->double('IMAGE_GM_FICHIER_TAILLE')->default(0);
            $table->string('IMAGE_GM_FICHIER_TYPE', 50)->default('');
            $table->string('LIBELLE_ARTICLE', 50)->default('');
            $table->string('PID_ARTICLE', 32)->default('')->index('PID_ARTICLE');
            $table->string('PID_OFFRE_ENTETE', 32)->default('')->index('PID_OFFRE_ENTETE');
            $table->double('PRIX_NET')->default(0);
            $table->double('PRIX_TOTAL')->default(0);
            $table->double('PRIX_UNITAIRE')->default(0);
            $table->double('QUANTITE')->default(0);
            $table->double('REMISE')->default(0);
            $table->double('SOUS_TOTAL')->default(0);
            $table->string('SOUS_TOTAL_TEXTE', 45)->default('');
            $table->string('SYS_CONTEXTE', 32)->default('');
            $table->date('SYS_DATE_CREATION')->nullable();
            $table->date('SYS_DATE_MODIFICATION')->nullable();
            $table->time('SYS_HEURE_CREATION')->default('00:00:00');
            $table->time('SYS_HEURE_MODIFICATION')->default('00:00:00');
            $table->string('SYS_LIEN_CONTEXTE_MAITRE', 32)->default('')->index('SYS_LIEN_CONTEXTE_MAITRE');
            $table->double('SYS_NO_LIGNE')->default(0);
            $table->string('SYS_SYNCHRO_CODE_POSTE', 20)->default('')->index('SYS_SYNCHRO_CODE_POSTE');
            $table->dateTime('SYS_SYNCHRO_DATE_ENREG')->nullable()->index('SYS_SYNCHRO_DATE_ENREG');
            $table->string('SYS_USER_CREATION', 20)->default('');
            $table->string('SYS_USER_MODIFICATION', 20)->default('');
            $table->binary('TEXTE_LIBRE');
            $table->string('TITRE', 80)->default('');
            $table->string('TYPE_LIAISON', 20)->default('')->index('TYPE_LIAISON');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offre_detail');
    }
}
