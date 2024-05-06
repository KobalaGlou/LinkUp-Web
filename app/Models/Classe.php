<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Classe
 * 
 * @property int $idS
 * @property int $idC
 * @property string $libC
 * 
 * @property Section $section
 * @property Collection|Etudiant[] $etudiants
 *
 * @package App\Models
 */
class Classe extends Model
{
	protected $table = 'classe';
	protected $primaryKey = 'idS';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idS' => 'int',
		'idC' => 'int'
	];

	protected $fillable = [
		'libC'
	];

	public function section()
	{
		return $this->belongsTo(Section::class, 'idS');
	}

	public function etudiants()
	{
		return $this->hasMany(Etudiant::class, 'idSection');
	}
}
