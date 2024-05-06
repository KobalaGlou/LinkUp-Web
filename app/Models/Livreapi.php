<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Livreapi
 * 
 * @property string $idGoogleBooks
 * 
 * @property Collection|Avoir[] $avoirs
 * @property Collection|Vouloir[] $vouloirs
 *
 * @package App\Models
 */
class Livreapi extends Model
{
	protected $table = 'livreapi';
	protected $primaryKey = 'idGoogleBooks';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idGoogleBooks' => 'int'
	];

	protected $fillable = [
		'idGoogleBooks'
	];

	public function avoirs()
	{
		return $this->hasMany(Avoir::class, 'idGoogleBooks');
	}

	public function vouloirs()
	{
		return $this->hasMany(Vouloir::class, 'idGoogleBooks');
	}
}
