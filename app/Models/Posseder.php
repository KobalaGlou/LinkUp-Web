<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Posseder
 * 
 * @property int $idU
 * @property int $idD
 * 
 * @property Administration $administration
 * @property Droit $droit
 *
 * @package App\Models
 */
class Posseder extends Model
{
	protected $table = 'posseder';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idU' => 'int',
		'idD' => 'int'
	];

	public function administration()
	{
		return $this->belongsTo(Administration::class, 'idU');
	}

	public function droit()
	{
		return $this->belongsTo(Droit::class, 'idD');
	}
}
