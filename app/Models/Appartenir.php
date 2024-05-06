<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Appartenir
 * 
 * @property int $idU
 * @property int $libAnnee
 * @property int $idS
 * @property int $idC
 * 
 * @property Etudiant $etudiant
 * @property Annee $annee
 * @property Classe $classe
 *
 * @package App\Models
 */
class Appartenir extends Model
{
	protected $table = 'appartenir';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idU' => 'int',
		'libAnnee' => 'int',
		'idS' => 'int',
		'idC' => 'int'
	];

	protected $fillable = [
		'idS',
		'idC'
	];

	public function etudiant()
	{
		return $this->belongsTo(Etudiant::class, 'idU');
	}

	public function annee()
	{
		return $this->belongsTo(Annee::class, 'libAnnee');
	}

	public function classe()
	{
		return $this->belongsTo(Classe::class, 'idS')
					->where('classe.idS', '=', 'appartenir.idS')
					->where('classe.idC', '=', 'appartenir.idC');
	}
}
