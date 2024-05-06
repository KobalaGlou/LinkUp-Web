<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Etudiant
 * 
 * @property int $idU
 * @property int $nbCredit
 * @property bool $moderateur
 * @property int $idClasse
 * @property int $idSection
 * @property bool $ban
 * @property bool $archive
 * 
 * @property Utilisateur $utilisateur
 * @property Classe $classe
 * @property Collection|Annonce[] $annonces
 * @property Collection|Associer[] $associers
 * @property Collection|Avoir[] $avoirs
 * @property Collection|Channel[] $channels
 * @property Collection|Interesser[] $interessers
 * @property Collection|Journalisation[] $journalisations
 * @property Collection|Message[] $messages
 *
 * @package App\Models
 */
class Etudiant extends Model
{
	protected $table = 'etudiant';
	protected $primaryKey = 'idU';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idU' => 'int',
		'nbCredit' => 'int',
		'moderateur' => 'bool',
		'idClasse' => 'int',
		'idSection' => 'int',
		'ban' => 'bool',
		'archive' => 'bool'
	];

	protected $fillable = [
		'nbCredit',
		'moderateur',
		'idClasse',
		'idSection',
		'ban',
		'archive'
	];

	public function utilisateur()
	{
		return $this->belongsTo(Utilisateur::class, 'idU');
	}

	public function classe()
	{
		return $this->belongsTo(Classe::class, 'idSection');
	}

	public function annonces()
	{
		return $this->hasMany(Annonce::class, 'idU');
	}

	public function associers()
	{
		return $this->hasMany(Associer::class, 'idU');
	}

	public function avoirs()
	{
		return $this->hasMany(Avoir::class, 'idU');
	}

	public function channels()
	{
		return $this->hasMany(Channel::class, 'idU');
	}

	public function interessers()
	{
		return $this->hasMany(Interesser::class, 'idEtudiant');
	}

	public function journalisations()
	{
		return $this->hasMany(Journalisation::class, 'idEtudiant');
	}

	public function messages()
	{
		return $this->hasMany(Message::class, 'idU');
	}
}
