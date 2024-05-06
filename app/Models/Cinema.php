<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cinema
 * 
 * @property int $idA
 * @property float|null $montantAjouter
 * @property bool|null $LieuPerso
 * @property string|null $GPS
 * @property string $imdbIdFilm
 * @property string $adresse
 * 
 * @property Annonce $annonce
 *
 * @package App\Models
 */
class Cinema extends Model
{
	protected $table = 'cinema';
	protected $primaryKey = 'idA';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idA' => 'int',
		'montantAjouter' => 'float',
		'LieuPerso' => 'bool'
	];

	protected $fillable = [
		'idA',
		'montantAjouter',
		'LieuPerso',
		'GPS',
		'imdbIdFilm',
		'adresse'
	];

	public function annonce()
	{
		return $this->belongsTo(Annonce::class, 'idA');
	}
}
