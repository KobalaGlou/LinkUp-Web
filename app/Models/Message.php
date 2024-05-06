<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Message
 * 
 * @property int $idC
 * @property int $idU
 * @property int $id
 * @property string|null $lib
 * 
 * @property Channel $channel
 * @property Etudiant $etudiant
 *
 * @package App\Models
 */
class Message extends Model
{
	protected $table = 'message';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idC' => 'int',
		'idU' => 'int',
		'id' => 'int'
	];

	protected $fillable = [
		'lib'
	];

	public function channel()
	{
		return $this->belongsTo(Channel::class, 'idC');
	}

	public function etudiant()
	{
		return $this->belongsTo(Etudiant::class, 'idU');
	}
}
