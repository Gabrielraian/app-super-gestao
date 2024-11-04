<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AlterProdutosRelacionamentosFornecedores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produtos', function(Blueprint $table) {

            $fornecedorId = DB::table('fornecedores')->insertGetId([
                'nome' => 'Forncedor Padrão SG',
                'site' => 'fornecedorpadrao.com.br',
                'uf' => 'SP',
                'email' => 'contato@fornecedorpadraosg.com.br',
            ]);

            $table->unsignedBigInteger('fornecedor_id')->default($fornecedorId)->after('id');
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos', function(Blueprint $table) {
            $table->dropForeign('produtos_fornecedor_id_foreign');
            $table->dropColumn('fornecedor_id');
        });
    }
}
