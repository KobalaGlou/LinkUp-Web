<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MotifAction
 * 
 * @property int $idMotif
 * @property string $nomMotif
 * @property int $idTypeAction
 * 
 * @property TypeAction $type_action
 * @property Collection|Journalisation[] $journalisations
 *
 * @package App\Models
 */
class MotifAction extends Model
{
	protected $table = 'motif_action';
	protected $primaryKey = 'idMotif';
	public $timestamps = false;

	protected $casts = [
		'idTypeAction' => 'int'
	];

	protected $fillable = [
		'nomMotif',
		'idTypeAction'
	];

	public function type_action()
	{
		return $this->belongsTo(TypeAction::class, 'idTypeAction');
	}

	public function journalisations()
	{
		return $this->hasMany(Journalisation::class, 'idMotif');
	}
}
