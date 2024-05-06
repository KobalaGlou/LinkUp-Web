<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Action
 * 
 * @property int $idU
 * @property int $idA
 * @property string $libA
 * @property bool $actionAdmin
 * 
 * @property Utilisateur $utilisateur
 * @property Collection|Impacter[] $impacters
 *
 * @package App\Models
 */
class Action extends Model
{
	protected $table = 'action';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idU' => 'int',
		'idA' => 'int',
		'actionAdmin' => 'bool'
	];

	protected $fillable = [
		'libA',
		'actionAdmin'
	];

	public function utilisateur()
	{
		return $this->belongsTo(Utilisateur::class, 'idU');
	}

	public function impacters()
	{
		return $this->hasMany(Impacter::class, 'idU_2');
	}
}
