<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Typeevenement
 * 
 * @property int $idU
 * @property int $idA
 * @property int $idT
 * @property string $lbT
 * 
 * @property EvenementSportif $evenement_sportif
 *
 * @package App\Models
 */
class Typeevenement extends Model
{
	protected $table = 'typeevenement';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idU' => 'int',
		'idA' => 'int',
		'idT' => 'int'
	];

	protected $fillable = [
		'lbT'
	];

	public function evenement_sportif()
	{
		return $this->belongsTo(EvenementSportif::class, 'idU')
					->where('evenement_sportif.idU', '=', 'typeevenement.idU')
					->where('evenement_sportif.idA', '=', 'typeevenement.idA');
	}
}
