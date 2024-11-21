<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plano;

class AtualizarFaixaEtariaSeeder extends Seeder
{
    public function run()
    {
        // Atualizar planos para faixa etária única
        Plano::where('tipo', 'Individual')->update([
            'faixaetaria' => '0-100', // ou qualquer faixa etária específica que você queira
        ]);
        
        Plano::where('tipo', 'Familiar')->update([
            'faixaetaria' => '0-100', // Faixa etária correspondente
        ]);
        
        Plano::where('tipo', 'MEI')->update([
            'faixaetaria' => '18-65',
        ]);
        
        Plano::where('tipo', 'Coletivo Empresarial')->update([
            'faixaetaria' => '18-65',
        ]);
        
        Plano::where('tipo', 'Coletivo por Adesão')->update([
            'faixaetaria' => '18-65',
        ]);
    }
}
