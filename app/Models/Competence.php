<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Competence
 * 
 * @property int $idA
 * 
 * @property Annonce $annonce
 * @property Collection|Concerner[] $concerners
 *
 * @package App\Models
 */
class Competence extends Model
{
	protected $table = 'competence';
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
		return $this->belongsTo(Annonce::class, 'idA');
	}

	public function concerners()
	{
		return $this->hasMany(Concerner::class, 'idU', 'idU');
	}
}
