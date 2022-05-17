<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_users', function (Blueprint $table) {
            $table->char('EXPENSES_NOTES_MANAGER', 1)->default('');
            $table->char('FILTRAGE_GENERAL_LISTS', 1)->default('');
            $table->string('GROUPE_GENERIQUE', 25)->default('');
            $table->char('H1', 1)->default('')->index('H1');
            $table->char('H2', 1)->default('')->index('H2');
            $table->char('H3', 1)->default('')->index('H3');
            $table->char('H4', 1)->default('')->index('H4');
            $table->char('H5', 1)->default('')->index('H5');
            $table->char('H6', 1)->default('')->index('H6');
            $table->char('H7', 1)->default('')->index('H7');
            $table->char('H8', 1)->default('')->index('H8');
            $table->char('H9', 1)->default('')->index('H9');
            $table->string('ID_SYS_USERS', 32)->default('')->primary();
            $table->char('INACTIVE', 1)->default('');
            $table->char('INTERNATIONAL_RESPONSIBLE', 1)->default('');
            $table->char('INTERNATIONAL_VIEWER', 1)->default('');
            $table->string('MATRICULE', 20)->default('');
            $table->char('NOT_ALLOWED_MODIF_SALES', 1)->default('');
            $table->double('OBJECTIF')->default(0);
            $table->double('OBJECTIF_RDV')->default(0);
            $table->string('SERVICE', 25)->default('');
            $table->char('SYS_ACCES_COMPLET', 1)->default('');
            $table->char('SYS_ACCES_CUBE', 1)->default('');
            $table->char('SYS_ACCES_PARTIEL', 1)->default('');
            $table->char('SYS_ACCES_SUPPORT', 1)->default('');
            $table->char('SYS_ACCES_VIEWER', 1)->default('');
            $table->string('SYS_ADRESSE', 36)->default('');
            $table->string('SYS_CODE_POSTAL', 9)->default('');
            $table->string('SYS_CODE_UTILISATEUR', 20)->default('')->index('SYS_CODE_UTILISATEUR');
            $table->date('SYS_DATE_CREATION')->nullable();
            $table->date('SYS_DATE_MODIFICATION')->nullable();
            $table->string('SYS_EMAIL', 80)->default('');
            $table->string('SYS_FILTRAGE', 20)->default('')->index('SYS_FILTRAGE');
            $table->string('SYS_GROUPE', 20)->default('')->index('SYS_GROUPE');
            $table->time('SYS_HEURE_CREATION')->default('00:00:00');
            $table->time('SYS_HEURE_MODIFICATION')->default('00:00:00');
            $table->string('SYS_LANGUE', 20)->default('');
            $table->string('SYS_LISTE_FILTRES', 50)->default('');
            $table->string('SYS_LOGIN', 50)->default('')->index('SYS_LOGIN');
            $table->string('SYS_MAP_ADRESSE_GEOCODEE', 80)->default('');
            $table->double('SYS_MAP_LATITUDE')->default(0);
            $table->double('SYS_MAP_LONGITUDE')->default(0);
            $table->string('SYS_MAP_QUALITE_GEOCODAGE', 15)->default('');
            $table->char('SYS_MEMORISER_REQUETE_PUBLIQUE_OK', 1)->default('');
            $table->string('SYS_MON_FILTRAGE', 2)->default('');
            $table->string('SYS_MOT_PASSE', 60)->default('');
            $table->string('SYS_MOT_PASSE_EMAIL', 60)->default('');
            $table->string('SYS_NOM_PRENOM_EMAIL', 80)->default('');
            $table->string('SYS_NOM_UTILISATEUR', 30)->default('')->index('SYS_NOM_UTILISATEUR');
            $table->string('SYS_NOM_UTILISATEUR_EMAIL', 80)->default('');
            $table->string('SYS_PAYS', 43)->default('');
            $table->longblob('SYS_PHOTO_CONTENU');
            $table->dateTime('SYS_PHOTO_DATE')->nullable()->index('SYS_PHOTO_DATE');
            $table->string('SYS_PHOTO_NOM', 50)->default('')->index('SYS_PHOTO_NOM');
            $table->double('SYS_PHOTO_TAILLE')->default(0);
            $table->string('SYS_PHOTO_TYPE', 50)->default('')->index('SYS_PHOTO_TYPE');
            $table->string('SYS_REPONDRE_A_EMAIL', 80)->default('');
            $table->char('SYS_RGPD_RESPONSABLE_SILVERTOOL', 1)->default('');
            $table->char('SYS_RGPD_RESPONSABLE_SILVERTOOL2', 1)->default('');
            $table->char('SYS_RGPD_RESPONSABLE_SILVERTOOL3', 1)->default('');
            $table->binary('SYS_SIGNATURE');
            $table->string('SYS_SYNCHRO_CODE_POSTE', 20)->default('')->index('SYS_SYNCHRO_CODE_POSTE');
            $table->dateTime('SYS_SYNCHRO_DATE_ENREG')->nullable()->index('SYS_SYNCHRO_DATE_ENREG');
            $table->string('SYS_TELEPHONE_MOBILE', 20)->default('');
            $table->string('SYS_USER_CREATION', 20)->default('');
            $table->string('SYS_USER_MODIFICATION', 20)->default('');
            $table->string('SYS_VILLE', 45)->default('');
            $table->string('USER_GENERIQUE', 20)->default('');
            $table->dateTime('USER_GENERIQUE_DATE_HEURE_MODIFICATION')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sys_users');
    }
}
