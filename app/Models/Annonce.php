<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Annonce
 * 
 * @property int $idU
 * @property int $idA
 * @property string $titreA
 * @property int $nbPersMax
 * @property string $descrA
 * @property int $idT
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $date
 * @property string $image
 * @property bool $cache
 * 
 * @property Typeannonce $typeannonce
 * @property Etudiant $etudiant
 * @property Cinema $cinema
 * @property Competence $competence
 * @property Covoiturage $covoiturage
 * @property Collection|EtreAssocier[] $etre_associers
 * @property EvenementSportif $evenement_sportif
 * @property Collection|Interesser[] $interessers
 * @property Collection|Journalisation[] $journalisations
 * @property Lecture $lecture
 * @property Loisir $loisir
 *
 * @package App\Models
 */
class Annonce extends Model
{
	protected $table = 'annonce';
	protected $primaryKey = 'idA';

	protected $casts = [
		'idU' => 'int',
		'nbPersMax' => 'int',
		'idT' => 'int',
		'date' => 'datetime',
		'cache' => 'bool'
	];

	protected $fillable = [
		'idU',
		'titreA',
		'nbPersMax',
		'descrA',
		'idT',
		'date',
		'image',
		'cache'
	];

	public function typeannonce()
	{
		return $this->belongsTo(Typeannonce::class, 'idT');
	}

	public function etudiant()
	{
		return $this->belongsTo(Etudiant::class, 'idU');
	}

	public function cinema()
	{
		return $this->hasOne(Cinema::class, 'idA');
	}

	public function competence()
	{
		return $this->hasOne(Competence::class, 'idA');
	}

	public function covoiturage()
	{
		return $this->hasOne(Covoiturage::class, 'idA');
	}

	public function etre_associers()
	{
		return $this->hasMany(EtreAssocier::class, 'idA');
	}

	public function evenement_sportif()
	{
		return $this->hasOne(EvenementSportif::class, 'idA');
	}

	public function interessers()
	{
		return $this->hasMany(Interesser::class, 'idAnnonce');
	}

	public function journalisations()
	{
		return $this->hasMany(Journalisation::class, 'idAnnonce');
	}

	public function lecture()
	{
		return $this->hasOne(Lecture::class, 'idA');
	}

	public function loisir()
	{
		return $this->hasOne(Loisir::class, 'idA');
	}
}
