<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Annee
 * 
 * @property int $libAnnee
 * 
 * @property Collection|Appartenir[] $appartenirs
 *
 * @package App\Models
 */
class Annee extends Model
{
	protected $table = 'annee';
	protected $primaryKey = 'libAnnee';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'libAnnee' => 'int'
	];

	public function appartenirs()
	{
		return $this->hasMany(Appartenir::class, 'libAnnee');
	}
}
