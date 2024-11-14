<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Adicionando a importação

class PlanosSeeder extends Seeder
{
    public function run()
    {
        DB::table('planos')->insert([
            [
                'nome' => 'Individual Básico',
                'tipo' => 'individual',
                'cobertura' => 'Consultas médicas, exames de rotina, urgências, emergências, serviços de atendimento domiciliar e exames laboratoriais básicos.',
                'faixaetaria' => '18-45 anos',
                'preco' => 150.00,
            ],
            [
                'nome' => 'Individual Completo',
                'tipo' => 'individual',
                'cobertura' => 'Consultas médicas, exames preventivos, urgências, internação, cirurgias, consultas com especialistas, serviços de atendimento domiciliar, e exames de alta complexidade.',
                'faixaetaria' => '18-60 anos',
                'preco' => 300.00,
            ],
            [
                'nome' => 'Familiar Básico',
                'tipo' => 'familiar',
                'cobertura' => 'Consultas médicas, exames de rotina, urgências, emergências para até 3 dependentes, atendimento odontológico básico e vacinação.',
                'faixaetaria' => '0-50 anos',
                'preco' => 350.00,
            ],
            [
                'nome' => 'Familiar Completo',
                'tipo' => 'familiar',
                'cobertura' => 'Consultas médicas, exames de rotina e preventivos, urgências, internação, cirurgias, consultas com especialistas, exames de alta complexidade e cobertura odontológica completa para até 3 dependentes.',
                'faixaetaria' => '0-60 anos',
                'preco' => 600.00,
            ],
            [
                'nome' => 'MEI',
                'tipo' => 'mei',
                'cobertura' => 'Consultas médicas gerais, exames básicos, urgências, emergências, atendimentos ambulatoriais e benefícios de saúde mental para o titular do plano.',
                'faixaetaria' => '18-45 anos',
                'preco' => 120.00,
            ],
            [
                'nome' => 'Coletivo Empresarial',
                'tipo' => 'coletivo empresarial',
                'cobertura' => 'Consultas médicas, exames preventivos, urgências, internação, cirurgias, serviços de telemedicina, consultas com especialistas, exames de imagem e acesso a programas de saúde corporativa para empresas com mais de 10 funcionários.',
                'faixaetaria' => '18-60 anos',
                'preco' => 200.00,
            ],
            [
                'nome' => 'Coletivo por Adesão',
                'tipo' => 'coletivo por adesao',
                'cobertura' => 'Consultas médicas, exames preventivos, urgências, internação, cirurgias, cobertura odontológica, atendimento domiciliar, exames de alta complexidade e benefícios de saúde mental para grupos de adesão (ex: sindicatos, associações).',
                'faixaetaria' => '0-60 anos',
                'preco' => 250.00,
            ]
        ]);
    }

}
