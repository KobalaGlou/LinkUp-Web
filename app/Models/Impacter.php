<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Impacter
 * 
 * @property int $idU
 * @property int $idU_1
 * @property int $idA
 * @property int $idU_2
 * @property int $idA_1
 * 
 * @property Etudiant $etudiant
 * @property Annonce $annonce
 * @property Action $action
 *
 * @package App\Models
 */
class Impacter extends Model
{
	protected $table = 'impacter';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idU' => 'int',
		'idU_1' => 'int',
		'idA' => 'int',
		'idU_2' => 'int',
		'idA_1' => 'int'
	];

	public function etudiant()
	{
		return $this->belongsTo(Etudiant::class, 'idU');
	}

	public function annonce()
	{
		return $this->belongsTo(Annonce::class, 'idU_1')
					->where('annonce.idU', '=', 'impacter.idU_1')
					->where('annonce.idA', '=', 'impacter.idA');
	}

	public function action()
	{
		return $this->belongsTo(Action::class, 'idU_2')
					->where('action.idU', '=', 'impacter.idU_2')
					->where('action.idA', '=', 'impacter.idA_1');
	}
}
