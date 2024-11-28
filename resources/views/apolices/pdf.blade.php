<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apólice de Seguro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            font-size: 14px; /* Fonte do corpo do documento reduzida */
        }
        .container {
            width: 100%;
            padding: 20px;
        }
        .header, .footer {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            max-width: 120px; /* Logo um pouco menor */
            margin-bottom: 10px;
        }
        .header h1 {
            font-size: 22px; /* Tamanho do título da apólice reduzido */
            color: #8B0000; /* Cor vermelho escuro */
            margin: 0;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-size: 13px; /* Fonte das tabelas reduzida */
        }
        .table th, .table td {
            padding: 6px; /* Diminuído o espaçamento nas células */
            border: 1px solid #ddd;
            text-align: left;
        }
        .table th {
            background-color: #f2f2f2;
            color: #8B0000; /* Cor vermelho escuro para os títulos da tabela */
        }
        .footer {
            font-size: 11px; /* Rodapé com fonte menor */
        }
        h2 {
            font-size: 18px; /* Tamanho do título das seções menor */
            color: #8B0000; /* Cor vermelho escuro */
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Cabeçalho -->
        <div class="header">
            <!-- Logo com o caminho correto -->
            <img src="{{ public_path('images/hand-holding-medical-solid.png') }}" alt="Logo da Empresa">
            <h1>Apólice de Seguro</h1>
            <p><strong>Empresa:</strong> {{ $nome_empresa }}</p>
            <p><strong>Data de Geração:</strong> {{ $data_geracao }}</p>
        </div>

        <!-- Dados do Segurado -->
        <h2>Dados do Segurado</h2>
        <table class="table">
            <tr>
                <th>Nome</th>
                <td>{{ $nome_comprador }}</td>
            </tr>
            <tr>
                <th>CPF</th>
                <td>{{ $cpf_comprador }}</td> 
            </tr>
            <tr>
                <th>Endereço</th>
                <td>{{ $endereco_comprador }}</td>
            </tr>
            <tr>
                <th>Cidade</th>
                <td>{{ $cidade_comprador }}</td>
            </tr>
            <tr>
                <th>Telefone</th>
                <td>{{ $telefone_comprador }}</td>
            </tr>
        </table>

        <!-- Dados da Apólice -->
        <h2>Dados da Apólice</h2>
        <table class="table">
            <tr>
                <th>Plano</th>
                <td>{{ $nome_plano }}</td>
            </tr>
            <tr>
                <th>Preço</th>
                <td>R$ {{ $preco_plano }}</td>
            </tr>
            <tr>
                <th>Benefícios</th>
                <td>
                    <ul>
                        @foreach($beneficios as $beneficio)
                            <li>{{ $beneficio }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
            <tr>
                <th>Data de Compra</th>
                <td>{{ $data_compra }}</td>
            </tr>
            <tr>
                <th>Data de Validade</th>
                <td>{{ date('d/m/Y', strtotime($datafim)) }}</td>
            </tr>
        </table>

        <!-- Rodapé -->
        <div class="footer">
            <p>Saúde+ | Todos os direitos reservados.</p>
        </div>
    </div>
</body>
</html>
