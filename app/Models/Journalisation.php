<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Journalisation
 * 
 * @property int $idUtilisateur
 * @property string $Description
 * @property int $idTypeAction
 * @property int|null $idEtudiant
 * @property int|null $idAnnonce
 * @property Carbon $created_at
 * @property int $idMotif
 * 
 * @property Annonce|null $annonce
 * @property Etudiant|null $etudiant
 * @property Utilisateur $utilisateur
 * @property Action $action
 * @property MotifAction $motif_action
 *
 * @package App\Models
 */
class Journalisation extends Model
{
	protected $table = 'journalisation';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idUtilisateur' => 'int',
		'idTypeAction' => 'int',
		'idEtudiant' => 'int',
		'idAnnonce' => 'int',
		'idMotif' => 'int'
	];

	protected $fillable = [
		'Description',
		'idTypeAction',
		'idEtudiant',
		'idAnnonce',
		'idMotif',
		'idUtilisateur'

	];

	public function annonce()
	{
		return $this->belongsTo(Annonce::class, 'idAnnonce');
	}

	public function etudiant()
	{
		return $this->belongsTo(Etudiant::class, 'idEtudiant');
	}

	public function utilisateur()
	{
		return $this->belongsTo(Utilisateur::class, 'idUtilisateur');
	}

	public function action()
	{
		return $this->belongsTo(Action::class, 'idTypeAction');
	}

	public function motif_action()
	{
		return $this->belongsTo(MotifAction::class, 'idMotif');
	}
}
