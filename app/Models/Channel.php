<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Channel
 * 
 * @property int $idC
 * @property int|null $idU
 * 
 * @property Etudiant|null $etudiant
 * @property Collection|EtreAssocier[] $etre_associers
 * @property Collection|FairePartie[] $faire_parties
 * @property Collection|Message[] $messages
 *
 * @package App\Models
 */
class Channel extends Model
{
	protected $table = 'channel';
	protected $primaryKey = 'idC';
	public $timestamps = false;

	protected $casts = [
		'idU' => 'int'
	];

	protected $fillable = [
		'idU'
	];

	public function etudiant()
	{
		return $this->belongsTo(Etudiant::class, 'idU');
	}

	public function etre_associers()
	{
		return $this->hasMany(EtreAssocier::class, 'idC');
	}

	public function faire_parties()
	{
		return $this->hasMany(FairePartie::class, 'idC');
	}

	public function messages()
	{
		return $this->hasMany(Message::class, 'idC');
	}
}
