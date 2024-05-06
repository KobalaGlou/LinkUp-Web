<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Sport
 * 
 * @property int $idS
 * @property string $libS
 * 
 * @property Collection|EvenementSportif[] $evenement_sportifs
 *
 * @package App\Models
 */
class Sport extends Model
{
	protected $table = 'sport';
	protected $primaryKey = 'idS';
	public $timestamps = false;

	protected $fillable = [
		'libS'
	];

	public function evenement_sportifs()
	{
		return $this->hasMany(EvenementSportif::class, 'idS');
	}
}
