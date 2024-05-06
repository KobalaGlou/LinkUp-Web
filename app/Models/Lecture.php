<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Lecture
 * 
 * @property int $idA
 * 
 * @property Annonce $annonce
 * @property Collection|Vouloir[] $vouloirs
 *
 * @package App\Models
 */
class Lecture extends Model
{
	protected $table = 'lecture';
	protected $primaryKey = 'idA';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idA' => 'int'
	];

	protected $fillable = [
		'idA'
	];

	public function annonce()
	{
		return $this->belongsTo(Annonce::class, 'idA', 'idA');
	}

	public function vouloirs()
	{
		return $this->hasMany(Vouloir::class, 'idA');
	}
}
