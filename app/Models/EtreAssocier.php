<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EtreAssocier
 * 
 * @property int $idU
 * @property int $idA
 * @property int $idC
 * 
 * @property Annonce $annonce
 * @property Channel $channel
 *
 * @package App\Models
 */
class EtreAssocier extends Model
{
	protected $table = 'etre_associer';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idU' => 'int',
		'idA' => 'int',
		'idC' => 'int'
	];

	public function annonce()
	{
		return $this->belongsTo(Annonce::class, 'idU')
					->where('annonce.idU', '=', 'etre_associer.idU')
					->where('annonce.idA', '=', 'etre_associer.idA');
	}

	public function channel()
	{
		return $this->belongsTo(Channel::class, 'idC');
	}
}
