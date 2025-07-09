<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PedidosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pedidos')->insert([
            'endereco' => "Rua PaPaPa",
            'numero' => "123",
            'cep' => "12345123",
            'estado' => "PR",
            'description' => 'ei psiu meu pc estragou aqui porra',
            'status' => 'Completo',
            'userId' => '1',
            'imagem' => 'imagens/20170213153503.jpg',
        ]);
        DB::table('pedidos')->insert([
            'endereco' => "Rua PaPaPa",
            'numero' => "123",
            'cep' => "12345123",
            'estado' => "PR",
            'description' => 'ei denovo aqui meu pc deu pau po',
            'status' => 'Completo',
            'userId' => '1',
            'imagem' => 'imagens/bah.jpg',
        ]);
        DB::table('pedidos')->insert([
            'endereco' => "Rua PaPaPa",
            'numero' => "123",
            'cep' => "12345123",
            'estado' => "PR",
            'description' => 'po dnv cara :(',
            'status' => 'Enviado',
            'userId' => '1',
            'imagem' => 'imagens/naodeuvideo.jpg',
        ]);
    }
}
