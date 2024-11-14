<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo(a) à Saúde+</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="bg-gray-100">

    <!-- Container principal -->
    <div class="min-h-screen flex flex-col justify-center items-center" style="background-color: rgb(204 251 241);">

        <div class="mb-6">
            <i class="fa-solid fa-hand-holding-medical text-8xl" style="font-size: 130px; color: rgb(220 38 38);"></i>
        </div>

        <!-- Mensagem de boas-vindas -->
        <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-lg text-center">
            <h1 class="text-4xl font-bold text-lime-600 mb-4">Bem-vindo(a) à Saúde+</h1>
            <p class="text-lg text-gray-600 mb-6">Oferecemos os melhores planos de saúde para você e sua família.</p>

            <!-- Botões de Login e Registro -->
            <div class="space-x-4">
                <a href="{{ route('login') }}"
                    class="bg-green-500 text-white py-2 px-4 rounded-lg shadow hover:bg-green-600 transition duration-300">
                    Fazer Login
                </a>
                <a href="{{ route('register') }}"
                    class="bg-blue-500 text-white py-2 px-4 rounded-lg shadow hover:bg-blue-600 transition duration-300">
                    Registrar-se
                </a>
            </div>
        </div>
    </div>

</body>

</html>
