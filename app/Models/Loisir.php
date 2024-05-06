<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Loisir
 * 
 * @property int $idA
 * @property string|null $idJeux
 * @property int $idTypeJeu
 * 
 * @property Annonce $annonce
 * @property Typejeux $typejeux
 *
 * @package App\Models
 */
class Loisir extends Model
{
	protected $table = 'loisir';
	protected $primaryKey = 'idA';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idA' => 'int',
		'idTypeJeu' => 'int'
	];

	protected $fillable = [
		'idA',
		'idJeux',
		'idTypeJeu'
	];

	public function annonce()
	{
		return $this->belongsTo(Annonce::class, 'idA');
	}

	public function typejeux()
	{
		return $this->belongsTo(Typejeux::class, 'idTypeJeu');
	}
}
