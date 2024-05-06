<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Concerner
 * 
 * @property int $idA
 * @property int $idM
 * 
 * @property Competence $competence
 * @property Matiere $matiere
 *
 * @package App\Models
 */
class Concerner extends Model
{
	protected $table = 'concerner';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idA' => 'int',
		'idM' => 'int'
	];

	protected $fillable = [
		'idA',
		'idM'
	];

	public function competence()
	{
		return $this->belongsTo(Competence::class, 'idA');
	}

	public function matiere()
	{
		return $this->belongsTo(Matiere::class, 'idM');
	}
}
