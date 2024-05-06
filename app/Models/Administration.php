<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Administration
 * 
 * @property int $idU
 * 
 * @property Utilisateur $utilisateur
 * @property Collection|Posseder[] $posseders
 *
 * @package App\Models
 */
class Administration extends Model
{
	protected $table = 'administration';
	protected $primaryKey = 'idU';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idU' => 'int'
	];

	public function utilisateur()
	{
		return $this->belongsTo(Utilisateur::class, 'idU');
	}

	public function posseders()
	{
		return $this->hasMany(Posseder::class, 'idU');
	}
}
