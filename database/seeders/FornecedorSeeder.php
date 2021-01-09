<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        //intanciando o objeto
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 100';
        $fornecedor->site = 'fornecedor100.com.br';
        $fornecedor->uf = 'CE';
        $fornecedor->email = 'contato@fornecedor100.com.br';
        $fornecedor->save();

        //metodo create (atenção para o fillable)
        Fornecedor::create([
            'nome'=>'Fornecedor 200',
            'site'=>'fornecedor200.com.br',
            'uf'=>'RS',
            'email'=>'contato@fornecedor200.com.br'
        ]);

        //insert
        DB::insert('insert into fornecedores (nome, site, uf, email) values (?, ?)',
        ['Fornecedor 300', 'fornecedor200.com.br', 'SP', 'contato@fornecedor300.com.br']);
    }
}
