<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Vouloir
 * 
 * @property int $idA
 * @property string $idGoogleBooks
 * 
 * @property Lecture $lecture
 * @property Livreapi $livreapi
 *
 * @package App\Models
 */
class Vouloir extends Model
{
	protected $table = 'vouloir';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idA' => 'int'
	];

	protected $fillable = [
		'idA',
		'idGoogleBooks'
	];

	public function lecture()
	{
		return $this->belongsTo(Lecture::class, 'idA');
	}

	public function livreapi()
	{
		return $this->belongsTo(Livreapi::class, 'idGoogleBooks');
	}
}
