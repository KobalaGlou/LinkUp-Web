<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Matiere
 * 
 * @property int $idM
 * @property string $libM
 * 
 * @property Collection|Concerner[] $concerners
 *
 * @package App\Models
 */
class Matiere extends Model
{
	protected $table = 'matiere';
	protected $primaryKey = 'idM';
	public $timestamps = false;

	protected $fillable = [
		'libM'
	];

	public function concerners()
	{
		return $this->hasMany(Concerner::class, 'idM');
	}
}
