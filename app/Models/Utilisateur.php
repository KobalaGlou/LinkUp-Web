<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class Utilisateur
 * 
 * @property int $idU
 * @property string $emailU
 * @property string $passwordU
 * @property string $nomU
 * @property string $prenomU
 * 
 * @property Collection|Action[] $actions
 * @property Administration $administration
 * @property Etudiant $etudiant
 *
 * @package App\Models
 */
class Utilisateur extends Authenticatable
{
	use HasFactory, Notifiable;

	protected $table = 'utilisateur';
	protected $primaryKey = 'idU';
	public $timestamps = false;

	protected $fillable = [
		'emailU',
		'passwordU',
		'nomU',
		'prenomU'
	];

	/**
	 * Retourne le mot de passe de l'utilisateur
	 */
	public function getAuthPassword()
	{
		return $this->passwordU;
	}

	/**
	 * Retourne l'identifiant de l'utilisateur
	 */
	public function getAuthIdentifier()
	{
		return $this->emailU;
	}

	/**
	 * Retourne le nom de l'identifiant de l'utilisateur
	 */
	public function getAuthIdentifierName()
	{
		return 'emailU';
	}

	public function actions()
	{
		return $this->hasMany(Action::class, 'idU');
	}

	public function administration()
	{
		return $this->hasOne(Administration::class, 'idU');
	}

	public function etudiant()
	{
		return $this->hasOne(Etudiant::class, 'idU');
	}
}
