<?php

// database/seeders/CoberturasSeeder.php

namespace Database\Seeders;

use App\Models\Plano;
use Illuminate\Database\Seeder;

class CoberturasSeeder extends Seeder
{
    public function run()
    {
        // Plano Individual Completo
        $planoIndividualCompleto = Plano::where('nome', 'Individual Completo')->first();
        if ($planoIndividualCompleto) {
            $planoIndividualCompleto->update([
                'cobertura' => json_encode([
                    'Consultas médicas ilimitadas',
                    'Exames laboratoriais ilimitados',
                    'Internação hospitalar em enfermaria',
                    'Cirurgias e procedimentos médicos',
                    'Atendimento 24h em emergências',
                    'Medicamentos durante internação',
                    'Atendimento domiciliar para urgências',
                    'Acompanhamento nutricional',
                    'Psicoterapia e apoio psicológico',
                    'Assistência médica domiciliar',
                    'Atendimento especializado para idosos',
                    'Consultas com especialistas (dermatologista, cardiologista, etc.)',
                    'Atendimento odontológico (em rede credenciada)',
                    'Procedimentos estéticos cobertos',
                    'Atendimento psicológico para dependentes químicos',
                    'Cirurgia bariátrica (cobertura parcial ou integral)',
                ]),
            ]);
        }

        // Plano Individual Básico
        $planoIndividualBasico = Plano::where('nome', 'Individual Básico')->first();
        if ($planoIndividualBasico) {
            $planoIndividualBasico->update([
                'cobertura' => json_encode([
                    'Consultas médicas limitadas',
                    'Exames laboratoriais básicos',
                    'Internação hospitalar em enfermaria',
                    'Atendimento de emergência 24h',
                    'Medicamentos durante internação',
                    'Consultas com médicos especialistas limitadas',
                    'Exames de urgência com cobertura parcial',
                    'Descontos em farmácias parceiras',
                    'Telemedicina (consultas à distância)',
                    'Consultas pediátricas para filhos até 12 anos',
                    'Acompanhamento em casos de doenças crônicas',
                ]),
            ]);
        }

        // Plano Familiar Completo
        $planoFamiliarCompleto = Plano::where('nome', 'Familiar Completo')->first();
        if ($planoFamiliarCompleto) {
            $planoFamiliarCompleto->update([
                'cobertura' => json_encode([
                    'Consultas médicas ilimitadas para toda a família',
                    'Exames laboratoriais ilimitados para todos',
                    'Internação hospitalar em enfermaria e UTI',
                    'Cirurgias e procedimentos médicos completos',
                    'Atendimento 24h em emergências para toda a família',
                    'Medicamentos durante internação',
                    'Atendimento domiciliar e consultas',
                    'Acompanhamento de saúde para gestantes e mães',
                    'Cobertura para recém-nascidos',
                    'Exames periódicos preventivos para a família',
                    'Consultoria em saúde preventiva',
                    'Descontos em academias e programas de bem-estar',
                    'Terapias alternativas (acupuntura, quiropraxia, etc.)',
                    'Medicamentos com preços especiais em farmácias conveniadas',
                    'Sessões de fisioterapia para toda a família',
                    'Atendimento especializado em doenças respiratórias',
                ]),
            ]);
        }

        // Plano Familiar Básico
        $planoFamiliarBasico = Plano::where('nome', 'Familiar Básico')->first();
        if ($planoFamiliarBasico) {
            $planoFamiliarBasico->update([
                'cobertura' => json_encode([
                    'Consultas médicas para toda a família',
                    'Exames laboratoriais básicos para todos',
                    'Internação hospitalar em enfermaria',
                    'Atendimento de emergência 24h',
                    'Medicamentos durante internação',
                    'Acompanhamento nutricional para membros da família',
                    'Atendimento domiciliar emergencial',
                    'Exames de rotina para adultos',
                    'Consultas pediátricas limitadas',
                    'Cirurgias de urgência para membros da família',
                    'Atendimento odontológico com limitações',
                    'Medicamentos a preços subsidiados',
                ]),
            ]);
        }

        // Plano MEI (Microempreendedor Individual)
        $planoMEI = Plano::where('nome', 'MEI')->first();
        if ($planoMEI) {
            $planoMEI->update([
                'cobertura' => json_encode([
                    'Assistência médica para o microempreendedor',
                    'Consultas de emergência para microempresário',
                    'Descontos em serviços de saúde para funcionários',
                    'Acesso à rede de hospitais conveniados',
                    'Atendimento médico para doenças ocupacionais',
                    'Cobertura para acidentes de trabalho',
                    'Orientação jurídica para pequenos empreendedores',
                ]),
            ]);
        }

        // Plano Coletivo Empresarial
        $planoColetivoEmpresarial = Plano::where('nome', 'Coletivo Empresarial')->first();
        if ($planoColetivoEmpresarial) {
            $planoColetivoEmpresarial->update([
                'cobertura' => json_encode([
                    'Consultas médicas para todos os funcionários da empresa',
                    'Programas de saúde ocupacional',
                    'Acompanhamento psicológico para funcionários',
                    'Medicamentos a preços reduzidos para funcionários',
                    'Terapias preventivas para funcionários',
                    'Consultas médicas especializadas para a empresa',
                    'Assistência odontológica para funcionários',
                    'Acompanhamento de estresse e burnout para equipes',
                    'Testes de saúde periódicos',
                ]),
            ]);
        }

        // Plano Coletivo por Adesão
        $planoColetivoAdesao = Plano::where('nome', 'Coletivo por Adesão')->first();
        if ($planoColetivoAdesao) {
            $planoColetivoAdesao->update([
                'cobertura' => json_encode([
                    'Consultas médicas gerais para grupos de adesão',
                    'Atendimento odontológico por adesão coletiva',
                    'Consultas com especialistas em saúde',
                    'Descontos em medicamentos e tratamentos',
                    'Exames laboratoriais a preços acessíveis',
                    'Acompanhamento nutricional por adesão',
                    'Programas de vacinação para grupos de adesão',
                    'Atendimento emergencial a qualquer hora',
                    'Psicoterapia por adesão para grupos',
                ]),
            ]);
        }
    }
}
