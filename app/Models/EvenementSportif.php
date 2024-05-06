<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EvenementSportif
 * 
 * @property int $idA
 * @property string|null $adresse
 * @property string $GPS
 * @property int $idS
 * 
 * @property Annonce $annonce
 * @property Sport $sport
 *
 * @package App\Models
 */
class EvenementSportif extends Model
{
	protected $table = 'evenement_sportif';
	protected $primaryKey = 'idA';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idA' => 'int',
		'idS' => 'int'
	];

	protected $fillable = [
		'idA',
		'adresse',
		'GPS',
		'idS'
	];

	public function annonce()
	{
		return $this->belongsTo(Annonce::class, 'idA');
	}

	public function sport()
	{
		return $this->belongsTo(Sport::class, 'idS');
	}
}
