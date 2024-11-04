<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Item extends Model
{
    protected $table = 'produtos';
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id', 'fornecedor_id'];
    
    public function itemDetalhe() :HasOne
    {
        // Produto tem 1 produtoDetalhe

        // 1 registro relacionado em produto_detalhes (fk) -> produto_id

        // :HasOne Tipagem de retorno da função

        return $this->hasOne('App\ItemDetalhe', 'produto_id', 'id');
    }

    public function fornecedor() :BelongsTo
    {
        return $this->belongsTo('App\Fornecedor');
    }

    public function pedidos() :BelongsToMany
    {
        return $this->belongsToMany('App\Pedido', 'pedidos_produtos', 'produto_id', 'pedido_id');
    }
}
