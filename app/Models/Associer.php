<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Associer
 * 
 * @property int $idU
 * @property int $idR
 * 
 * @property Etudiant $etudiant
 * @property Role $role
 *
 * @package App\Models
 */
class Associer extends Model
{
	protected $table = 'associer';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idU' => 'int',
		'idR' => 'int'
	];

	public function etudiant()
	{
		return $this->belongsTo(Etudiant::class, 'idU');
	}

	public function role()
	{
		return $this->belongsTo(Role::class, 'idR');
	}
}
