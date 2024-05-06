<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Avoir
 * 
 * @property int $idU
 * @property string $idGoogleBooks
 * 
 * @property Etudiant $etudiant
 * @property Livreapi $livreapi
 *
 * @package App\Models
 */
class Avoir extends Model
{
	protected $table = 'avoir';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idU' => 'int'
	];

	public function etudiant()
	{
		return $this->belongsTo(Etudiant::class, 'idU');
	}

	public function livreapi()
	{
		return $this->belongsTo(Livreapi::class, 'idGoogleBooks');
	}
}
