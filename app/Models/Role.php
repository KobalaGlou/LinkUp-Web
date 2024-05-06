<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * 
 * @property int $idR
 * @property string $libR
 * 
 * @property Collection|Associer[] $associers
 *
 * @package App\Models
 */
class Role extends Model
{
	protected $table = 'role';
	protected $primaryKey = 'idR';
	public $timestamps = false;

	protected $fillable = [
		'libR'
	];

	public function associers()
	{
		return $this->hasMany(Associer::class, 'idR');
	}
}
