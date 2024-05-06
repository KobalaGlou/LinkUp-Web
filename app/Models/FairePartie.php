<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class FairePartie
 * 
 * @property int $idU
 * @property int $idC
 * 
 * @property Etudiant $etudiant
 * @property Channel $channel
 *
 * @package App\Models
 */
class FairePartie extends Model
{
	protected $table = 'faire_partie';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idU' => 'int',
		'idC' => 'int'
	];

	public function etudiant()
	{
		return $this->belongsTo(Etudiant::class, 'idU');
	}

	public function channel()
	{
		return $this->belongsTo(Channel::class, 'idC');
	}
}
