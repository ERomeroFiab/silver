<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\ViewController::class, 'home']);
Route::get('/listado', [App\Http\Controllers\ViewController::class, 'listado']);
Route::get('/pruebas/{table_name}', [App\Http\Controllers\ViewController::class, 'pruebas'])->name('pruebas');


// VISTAS
Route::get('/tablas/listado', [App\Http\Controllers\ViewController::class, 'listado'])->name('listado');
Route::get('/tablas/vista-buscar', [App\Http\Controllers\ViewController::class, 'vista_buscar'])->name('vista_buscar');
Route::post('/tablas/buscar', [App\Http\Controllers\ViewController::class, 'buscar'])->name('buscar');
Route::get('/tablas/vista/{table_name}', [App\Http\Controllers\ViewController::class, 'vistas'])->name('vistas');


// MODELS
Route::get('/models/action/show', [App\Http\Controllers\ActionController::class, 'show'])->name('action.show');
Route::get('/models/action_intervenants_fiabilis/show', [App\Http\Controllers\ActionIntervenantsFiabilisController::class, 'show'])->name('action_intervenants_fiabilis.show');
Route::get('/models/affaire/show', [App\Http\Controllers\AffaireController::class, 'show'])->name('affaire.show');
Route::get('/models/affaire_conditions_financieres/show', [App\Http\Controllers\AffaireConditionsFinanciereController::class, 'show'])->name('affaire_conditions_financieres.show');
Route::get('/models/affaire_objections/show', [App\Http\Controllers\AffaireObjectionController::class, 'show'])->name('affaire_objections.show');
Route::get('/models/article/show', [App\Http\Controllers\ArticleController::class, 'show'])->name('article.show');
Route::get('/models/contact/show', [App\Http\Controllers\ContactController::class, 'show'])->name('contact.show');
Route::get('/models/contrat/show', [App\Http\Controllers\ContratController::class, 'show'])->name('contrat.show');
Route::get('/models/contrat_detail_produit/show', [App\Http\Controllers\ContratDetailProduitController::class, 'show'])->name('contrat_detail_produit.show');
Route::get('/models/contrat_partiel_condition_fiancieres/show', [App\Http\Controllers\ContratPartielConditionFianciereController::class, 'show'])->name('contrat_partiel_condition_fiancieres.show');
Route::get('/models/documents/show', [App\Http\Controllers\DocumentController::class, 'show'])->name('documents.show');
Route::get('/models/historique_maj_affaire/show', [App\Http\Controllers\HistoriqueMajAffaireController::class, 'show'])->name('historique_maj_affaire.show');
Route::get('/models/identification/show', [App\Http\Controllers\IdentificationController::class, 'show'])->name('identification.show');
Route::get('/models/identification_note/show', [App\Http\Controllers\IdentificationNoteController::class, 'show'])->name('identification_note.show');
Route::get('/models/invoice/show', [App\Http\Controllers\InvoiceController::class, 'show'])->name('invoice.show');
Route::get('/models/invoice_ligne/show', [App\Http\Controllers\InvoiceLigneController::class, 'show'])->name('invoice_ligne.show');
Route::get('/models/journal_deleted/show', [App\Http\Controllers\JournalDeletedController::class, 'show'])->name('journal_deleted.show');
Route::get('/models/mission/show', [App\Http\Controllers\MissionController::class, 'show'])->name('mission.show');
Route::get('/models/mission_motive/show', [App\Http\Controllers\MissionMotiveController::class, 'show'])->name('mission_motive.show');
Route::get('/models/mission_motive_eco/show', [App\Http\Controllers\MissionMotiveEcoController::class, 'show'])->name('mission_motive_eco.show');
Route::get('/models/mission_motive_historique_maj/show', [App\Http\Controllers\MissionMotiveHistoriqueMajController::class, 'show'])->name('mission_motive_historique_maj.show');
Route::get('/models/mission_team/show', [App\Http\Controllers\MissionTeamController::class, 'show'])->name('mission_team.show');
Route::get('/models/settings/show', [App\Http\Controllers\SettingController::class, 'show'])->name('settings.show');
Route::get('/models/societe_famille/show', [App\Http\Controllers\SocieteFamilleController::class, 'show'])->name('societe_famille.show');


// AJAX
Route::get('/tablas/datatable/get_tabla_action', [App\Http\Controllers\DatatableController::class, 'get_tabla_action'])->name('get_tabla_action');
Route::get('/tablas/datatable/get_tabla_action_intervenants_fiabilis', [App\Http\Controllers\DatatableController::class, 'get_tabla_action_intervenants_fiabilis'])->name('get_tabla_action_intervenants_fiabilis');
Route::get('/tablas/datatable/get_tabla_affaire', [App\Http\Controllers\DatatableController::class, 'get_tabla_affaire'])->name('get_tabla_affaire');
Route::get('/tablas/datatable/get_tabla_identification', [App\Http\Controllers\DatatableController::class, 'get_tabla_identification'])->name('get_tabla_identification');
Route::get('/tablas/datatable/get_tabla_contrat', [App\Http\Controllers\DatatableController::class, 'get_tabla_contrat'])->name('get_tabla_contrat');
Route::get('/tablas/datatable/get_tabla_documents', [App\Http\Controllers\DatatableController::class, 'get_tabla_documents'])->name('get_tabla_documents');
Route::get('/tablas/datatable/get_tabla_contact', [App\Http\Controllers\DatatableController::class, 'get_tabla_contact'])->name('get_tabla_contact');
Route::get('/tablas/datatable/get_tabla_contrat_detail_produit', [App\Http\Controllers\DatatableController::class, 'get_tabla_contrat_detail_produit'])->name('get_tabla_contrat_detail_produit');
Route::get('/tablas/datatable/get_tabla_identification_note', [App\Http\Controllers\DatatableController::class, 'get_tabla_identification_note'])->name('get_tabla_identification_note');
Route::get('/tablas/datatable/get_tabla_invoice', [App\Http\Controllers\DatatableController::class, 'get_tabla_invoice'])->name('get_tabla_invoice');
Route::get('/tablas/datatable/get_tabla_mission', [App\Http\Controllers\DatatableController::class, 'get_tabla_mission'])->name('get_tabla_mission');
Route::get('/tablas/datatable/get_tabla_mission_team', [App\Http\Controllers\DatatableController::class, 'get_tabla_mission_team'])->name('get_tabla_mission_team');
Route::get('/tablas/datatable/get_tabla_societe_famille', [App\Http\Controllers\DatatableController::class, 'get_tabla_societe_famille'])->name('get_tabla_societe_famille');
Route::get('/tablas/datatable/get_tabla_mission_motive', [App\Http\Controllers\DatatableController::class, 'get_tabla_mission_motive'])->name('get_tabla_mission_motive');
Route::get('/tablas/datatable/get_tabla_mission_motive_historique_maj', [App\Http\Controllers\DatatableController::class, 'get_tabla_mission_motive_historique_maj'])->name('get_tabla_mission_motive_historique_maj');
Route::get('/tablas/datatable/get_tabla_contrat_partiel_condition_fiancieres', [App\Http\Controllers\DatatableController::class, 'get_tabla_contrat_partiel_condition_fiancieres'])->name('get_tabla_contrat_partiel_condition_fiancieres');
Route::get('/tablas/datatable/get_tabla_affaire_conditions_financieres', [App\Http\Controllers\DatatableController::class, 'get_tabla_affaire_conditions_financieres'])->name('get_tabla_affaire_conditions_financieres');
Route::get('/tablas/datatable/get_tabla_affaire_objections', [App\Http\Controllers\DatatableController::class, 'get_tabla_affaire_objections'])->name('get_tabla_affaire_objections');
Route::get('/tablas/datatable/get_tabla_historique_maj_affaire', [App\Http\Controllers\DatatableController::class, 'get_tabla_historique_maj_affaire'])->name('get_tabla_historique_maj_affaire');
Route::get('/tablas/datatable/get_tabla_mission_motive_eco', [App\Http\Controllers\DatatableController::class, 'get_tabla_mission_motive_eco'])->name('get_tabla_mission_motive_eco');
Route::get('/tablas/datatable/get_tabla_article', [App\Http\Controllers\DatatableController::class, 'get_tabla_article'])->name('get_tabla_article');
Route::get('/tablas/datatable/get_tabla_aide_action_categorie', [App\Http\Controllers\DatatableController::class, 'get_tabla_aide_action_categorie'])->name('get_tabla_aide_action_categorie');
Route::get('/tablas/datatable/get_tabla_aide_action_objet', [App\Http\Controllers\DatatableController::class, 'get_tabla_aide_action_objet'])->name('get_tabla_aide_action_objet');
Route::get('/tablas/datatable/get_tabla_aide_mission_motif', [App\Http\Controllers\DatatableController::class, 'get_tabla_aide_mission_motif'])->name('get_tabla_aide_mission_motif');
Route::get('/tablas/datatable/get_tabla_aide_mission_step', [App\Http\Controllers\DatatableController::class, 'get_tabla_aide_mission_step'])->name('get_tabla_aide_mission_step');
Route::get('/tablas/datatable/get_tabla_invoice_ligne', [App\Http\Controllers\DatatableController::class, 'get_tabla_invoice_ligne'])->name('get_tabla_invoice_ligne');
Route::get('/tablas/datatable/get_tabla_journal_deleted', [App\Http\Controllers\DatatableController::class, 'get_tabla_journal_deleted'])->name('get_tabla_journal_deleted');
Route::get('/tablas/datatable/get_tabla_settings', [App\Http\Controllers\DatatableController::class, 'get_tabla_settings'])->name('get_tabla_settings');
Route::get('/tablas/datatable/get_tabla_aide_action_origine', [App\Http\Controllers\DatatableController::class, 'get_tabla_aide_action_origine'])->name('get_tabla_aide_action_origine');
Route::get('/tablas/datatable/get_tabla_aide_action_resultat', [App\Http\Controllers\DatatableController::class, 'get_tabla_aide_action_resultat'])->name('get_tabla_aide_action_resultat');
Route::get('/tablas/datatable/get_tabla_aide_affaire_objections', [App\Http\Controllers\DatatableController::class, 'get_tabla_aide_affaire_objections'])->name('get_tabla_aide_affaire_objections');
Route::get('/tablas/datatable/get_tabla_aide_affaire_perte', [App\Http\Controllers\DatatableController::class, 'get_tabla_aide_affaire_perte'])->name('get_tabla_aide_affaire_perte');
Route::get('/tablas/datatable/get_tabla_aide_affaire_phase', [App\Http\Controllers\DatatableController::class, 'get_tabla_aide_affaire_phase'])->name('get_tabla_aide_affaire_phase');
Route::get('/tablas/datatable/get_tabla_aide_affaire_statut', [App\Http\Controllers\DatatableController::class, 'get_tabla_aide_affaire_statut'])->name('get_tabla_aide_affaire_statut');
Route::get('/tablas/datatable/get_tabla_aide_affaire_year', [App\Http\Controllers\DatatableController::class, 'get_tabla_aide_affaire_year'])->name('get_tabla_aide_affaire_year');
Route::get('/tablas/datatable/get_tabla_aide_article_famille', [App\Http\Controllers\DatatableController::class, 'get_tabla_aide_article_famille'])->name('get_tabla_aide_article_famille');
Route::get('/tablas/datatable/get_tabla_aide_article_provider', [App\Http\Controllers\DatatableController::class, 'get_tabla_aide_article_provider'])->name('get_tabla_aide_article_provider');
Route::get('/tablas/datatable/get_tabla_aide_contact_civilite', [App\Http\Controllers\DatatableController::class, 'get_tabla_aide_contact_civilite'])->name('get_tabla_aide_contact_civilite');
Route::get('/tablas/datatable/get_tabla_aide_contact_fonction', [App\Http\Controllers\DatatableController::class, 'get_tabla_aide_contact_fonction'])->name('get_tabla_aide_contact_fonction');
Route::get('/tablas/datatable/get_tabla_aide_contact_language', [App\Http\Controllers\DatatableController::class, 'get_tabla_aide_contact_language'])->name('get_tabla_aide_contact_language');
Route::get('/tablas/datatable/get_tabla_aide_contact_service', [App\Http\Controllers\DatatableController::class, 'get_tabla_aide_contact_service'])->name('get_tabla_aide_contact_service');
Route::get('/tablas/datatable/get_tabla_aide_contrat_entity', [App\Http\Controllers\DatatableController::class, 'get_tabla_aide_contrat_entity'])->name('get_tabla_aide_contrat_entity');
Route::get('/tablas/datatable/get_tabla_aide_contrat_mode_signature', [App\Http\Controllers\DatatableController::class, 'get_tabla_aide_contrat_mode_signature'])->name('get_tabla_aide_contrat_mode_signature');
Route::get('/tablas/datatable/get_tabla_aide_contrat_statut', [App\Http\Controllers\DatatableController::class, 'get_tabla_aide_contrat_statut'])->name('get_tabla_aide_contrat_statut');
Route::get('/tablas/datatable/get_tabla_aide_contrat_type', [App\Http\Controllers\DatatableController::class, 'get_tabla_aide_contrat_type'])->name('get_tabla_aide_contrat_type');
Route::get('/tablas/datatable/get_tabla_aide_contrat_type_reconduction', [App\Http\Controllers\DatatableController::class, 'get_tabla_aide_contrat_type_reconduction'])->name('get_tabla_aide_contrat_type_reconduction');
Route::get('/tablas/datatable/get_tabla_aide_events_qualification', [App\Http\Controllers\DatatableController::class, 'get_tabla_aide_events_qualification'])->name('get_tabla_aide_events_qualification');
Route::get('/tablas/datatable/get_tabla_aide_events_status', [App\Http\Controllers\DatatableController::class, 'get_tabla_aide_events_status'])->name('get_tabla_aide_events_status');
Route::get('/tablas/datatable/get_tabla_aide_famille_indicators', [App\Http\Controllers\DatatableController::class, 'get_tabla_aide_famille_indicators'])->name('get_tabla_aide_famille_indicators');
Route::get('/tablas/datatable/get_tabla_aide_international_responsible', [App\Http\Controllers\DatatableController::class, 'get_tabla_aide_international_responsible'])->name('get_tabla_aide_international_responsible');
Route::get('/tablas/datatable/get_tabla_aide_international_sector', [App\Http\Controllers\DatatableController::class, 'get_tabla_aide_international_sector'])->name('get_tabla_aide_international_sector');
Route::get('/tablas/datatable/get_tabla_aide_mission_sous_motif1', [App\Http\Controllers\DatatableController::class, 'get_tabla_aide_mission_sous_motif1'])->name('get_tabla_aide_mission_sous_motif1');
Route::get('/tablas/datatable/get_tabla_aide_mission_sous_motif2', [App\Http\Controllers\DatatableController::class, 'get_tabla_aide_mission_sous_motif2'])->name('get_tabla_aide_mission_sous_motif2');
Route::get('/tablas/datatable/get_tabla_aide_offre_condition', [App\Http\Controllers\DatatableController::class, 'get_tabla_aide_offre_condition'])->name('get_tabla_aide_offre_condition');
Route::get('/tablas/datatable/get_tabla_aide_renumeration_type', [App\Http\Controllers\DatatableController::class, 'get_tabla_aide_renumeration_type'])->name('get_tabla_aide_renumeration_type');
Route::get('/tablas/datatable/get_tabla_aide_societe_ca', [App\Http\Controllers\DatatableController::class, 'get_tabla_aide_societe_ca'])->name('get_tabla_aide_societe_ca');
Route::get('/tablas/datatable/get_tabla_aide_societe_commune', [App\Http\Controllers\DatatableController::class, 'get_tabla_aide_societe_commune'])->name('get_tabla_aide_societe_commune');
Route::get('/tablas/datatable/get_tabla_aide_societe_company_classification', [App\Http\Controllers\DatatableController::class, 'get_tabla_aide_societe_company_classification'])->name('get_tabla_aide_societe_company_classification');
Route::get('/tablas/datatable/get_tabla_aide_societe_effectif', [App\Http\Controllers\DatatableController::class, 'get_tabla_aide_societe_effectif'])->name('get_tabla_aide_societe_effectif');
Route::get('/tablas/datatable/get_tabla_aide_societe_forme_juridique', [App\Http\Controllers\DatatableController::class, 'get_tabla_aide_societe_forme_juridique'])->name('get_tabla_aide_societe_forme_juridique');
Route::get('/tablas/datatable/get_tabla_aide_societe_naf', [App\Http\Controllers\DatatableController::class, 'get_tabla_aide_societe_naf'])->name('get_tabla_aide_societe_naf');
Route::get('/tablas/datatable/get_tabla_aide_societe_origine', [App\Http\Controllers\DatatableController::class, 'get_tabla_aide_societe_origine'])->name('get_tabla_aide_societe_origine');
Route::get('/tablas/datatable/get_tabla_aide_societe_payroll_outsourcer_type', [App\Http\Controllers\DatatableController::class, 'get_tabla_aide_societe_payroll_outsourcer_type'])->name('get_tabla_aide_societe_payroll_outsourcer_type');
Route::get('/tablas/datatable/get_tabla_aide_societe_pays', [App\Http\Controllers\DatatableController::class, 'get_tabla_aide_societe_pays'])->name('get_tabla_aide_societe_pays');
Route::get('/tablas/datatable/get_tabla_aide_societe_secteur_geo', [App\Http\Controllers\DatatableController::class, 'get_tabla_aide_societe_secteur_geo'])->name('get_tabla_aide_societe_secteur_geo');
Route::get('/tablas/datatable/get_tabla_aide_societe_segment', [App\Http\Controllers\DatatableController::class, 'get_tabla_aide_societe_segment'])->name('get_tabla_aide_societe_segment');
Route::get('/tablas/datatable/get_tabla_aide_societe_situation_juridique', [App\Http\Controllers\DatatableController::class, 'get_tabla_aide_societe_situation_juridique'])->name('get_tabla_aide_societe_situation_juridique');
Route::get('/tablas/datatable/get_tabla_aide_societe_sub_sector_geo', [App\Http\Controllers\DatatableController::class, 'get_tabla_aide_societe_sub_sector_geo'])->name('get_tabla_aide_societe_sub_sector_geo');
Route::get('/tablas/datatable/get_tabla_aide_societe_type', [App\Http\Controllers\DatatableController::class, 'get_tabla_aide_societe_type'])->name('get_tabla_aide_societe_type');
Route::get('/tablas/datatable/get_tabla_aide_societe_typeadr', [App\Http\Controllers\DatatableController::class, 'get_tabla_aide_societe_typeadr'])->name('get_tabla_aide_societe_typeadr');
