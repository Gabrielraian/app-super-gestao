<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{   
    protected $table = 'fornecedores';

    protected $fillable = ['nome', 'site', 'uf', 'email'];

    public function produtos() :HasMany
    {
        return $this->hasMany('App\Item', 'fornecedor_id', 'id');
    }
}
