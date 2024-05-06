<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Interesser
 * 
 * @property int $idEtudiant
 * @property int $idAnnonce
 * 
 * @property Annonce $annonce
 * @property Etudiant $etudiant
 *
 * @package App\Models
 */
class Interesser extends Model
{
	protected $table = 'interesser';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idEtudiant' => 'int',
		'idAnnonce' => 'int'
	];

	protected $fillable = [
		'idEtudiant',
		'idAnnonce'
	];

	public function annonce()
	{
		return $this->belongsTo(Annonce::class, 'idAnnonce');
	}

	public function etudiant()
	{
		return $this->belongsTo(Etudiant::class, 'idEtudiant');
	}
}
