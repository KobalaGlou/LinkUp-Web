<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Covoiturage
 * 
 * @property int $idA
 * @property bool $voiturePersonnel
 * @property string $GPS
 * @property string|null $adresse
 * 
 * @property Annonce $annonce
 *
 * @package App\Models
 */
class Covoiturage extends Model
{
	protected $table = 'covoiturage';
	protected $primaryKey = 'idA';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idA' => 'int',
		'voiturePersonnel' => 'bool'
	];

	protected $fillable = [
		'idA',
		'voiturePersonnel',
		'GPS',
		'adresse'
	];

	public function annonce()
	{
		return $this->belongsTo(Annonce::class, 'idA');
	}
}
