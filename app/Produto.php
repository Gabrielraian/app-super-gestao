<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Produto extends Model
{
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];


    /**
     * Get the associated ProdutoDetalhe for the Produto.
     *
     * This function defines a one-to-one relationship between
     * the Produto model and the ProdutoDetalhe model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function produtoDetalhe() :HasOne
    {
        // Produto tem 1 produtoDetalhe

        // 1 registro relacionado em produto_detalhes (fk) -> produto_id

        // :HasOne Tipagem de retorno da função

        return $this->hasOne('App\ProdutoDetalhe');
    }
}
