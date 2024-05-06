<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Typeannonce
 * 
 * @property int $idT
 * @property string $libT
 * 
 * @property Collection|Annonce[] $annonces
 *
 * @package App\Models
 */
class Typeannonce extends Model
{
	protected $table = 'typeannonce';
	protected $primaryKey = 'idT';
	public $timestamps = false;

	protected $fillable = [
		'libT'
	];

	public function annonces()
	{
		return $this->hasMany(Annonce::class, 'idT');
	}
}
