<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Ville
 * 
 * @property int $idV
 * @property int $cpV
 * @property string $libV
 * @property int $idU
 * @property int $idA
 * @property int $idU_1
 * @property int $idA_1
 * @property int $idU_2
 * @property int $idA_2
 * 
 * @property EvenementSportif $evenement_sportif
 * @property Cinema $cinema
 * @property Covoiturage $covoiturage
 *
 * @package App\Models
 */
class Ville extends Model
{
	protected $table = 'ville';
	protected $primaryKey = 'idV';
	public $timestamps = false;

	protected $casts = [
		'cpV' => 'int',
		'idU' => 'int',
		'idA' => 'int',
		'idU_1' => 'int',
		'idA_1' => 'int',
		'idU_2' => 'int',
		'idA_2' => 'int'
	];

	protected $fillable = [
		'cpV',
		'libV',
		'idU',
		'idA',
		'idU_1',
		'idA_1',
		'idU_2',
		'idA_2'
	];

	public function evenement_sportif()
	{
		return $this->belongsTo(EvenementSportif::class, 'idU')
					->where('evenement_sportif.idU', '=', 'ville.idU')
					->where('evenement_sportif.idA', '=', 'ville.idA');
	}

	public function cinema()
	{
		return $this->belongsTo(Cinema::class, 'idU_1')
					->where('cinema.idU', '=', 'ville.idU_1')
					->where('cinema.idA', '=', 'ville.idA_1');
	}

	public function covoiturage()
	{
		return $this->belongsTo(Covoiturage::class, 'idU_2')
					->where('covoiturage.idU', '=', 'ville.idU_2')
					->where('covoiturage.idA', '=', 'ville.idA_2');
	}
}
