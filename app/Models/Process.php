<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Process
 *
 * @property $id
 * @property $nombre
 * @property $descripcion
 * @property $fecha_inicio
 * @property $fecha_fin
 * @property $created_at
 * @property $updated_at
 *
 * @property Deliverable[] $deliverables
 * @property Phase $phase
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Process extends Model
{
    
    static $rules = [
		'nombre' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','descripcion','fecha_inicio','fecha_fin'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function deliverables()
    {
        return $this->hasMany('App\Models\Deliverable', 'process_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function phase()
    {
        return $this->hasOne('App\Models\Phase', 'process_id', 'id');
    }
    

}
