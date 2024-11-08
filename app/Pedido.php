<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pedido extends Model
{
    public function produtos() :BelongsToMany
    {
        // return $this->belongsToMany('App\Produto', 'pedidos_produtos');

        return $this->belongsToMany('App\Item', 'pedidos_produtos', 'pedido_id', 'produto_id')
            ->withPivot('id', 'created_at', 'updated_at');

        /*
            1 - Modelo do Relacionamento NxN em relação o Modelo que estamos implementando
            2 - É a tabela auxiliar que armazena os registros de relacionamento
            3 - Representa o nome da FK da tabela mapeada pelo modelo na tabela de relacionamento
            4 - Representa o nome da FK da tabela mapeada pelo model utilizado no relacionamento que estamos implementando
        */

    }
}
