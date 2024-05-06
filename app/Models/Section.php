<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Section
 * 
 * @property int $idS
 * @property string $libS
 * 
 * @property Collection|Classe[] $classes
 *
 * @package App\Models
 */
class Section extends Model
{
	protected $table = 'section';
	protected $primaryKey = 'idS';
	public $timestamps = false;

	protected $fillable = [
		'libS'
	];

	public function classes()
	{
		return $this->hasMany(Classe::class, 'idS');
	}
}
