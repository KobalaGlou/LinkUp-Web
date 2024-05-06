<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Droit
 * 
 * @property int $idD
 * @property string $libDroit
 * 
 * @property Collection|Posseder[] $posseders
 *
 * @package App\Models
 */
class Droit extends Model
{
	protected $table = 'droit';
	protected $primaryKey = 'idD';
	public $timestamps = false;

	protected $fillable = [
		'libDroit'
	];

	public function posseders()
	{
		return $this->hasMany(Posseder::class, 'idD');
	}
}
