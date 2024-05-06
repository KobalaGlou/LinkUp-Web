<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Typejeux
 * 
 * @property int $idU
 * @property int $idA
 * @property int $idT
 * @property string $libT
 * 
 * @property Loisir $loisir
 *
 * @package App\Models
 */
class Typejeux extends Model
{
	protected $table = 'typejeux';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idU' => 'int',
		'idA' => 'int',
		'idT' => 'int'
	];

	protected $fillable = [
		'libT'
	];

	public function loisir()
	{
		return $this->belongsTo(Loisir::class, 'idU')
					->where('loisir.idU', '=', 'typejeux.idU')
					->where('loisir.idA', '=', 'typejeux.idA');
	}
}
