<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{config("app.name")}} - Resetar Senha</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #F3F4F6;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #FFFFFF;
            border: 1px solid #E5E7EB;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #1E3A8A;
            color: #FFFFFF;
            text-align: center;
            padding: 20px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            letter-spacing: 1px;
        }
        .content {
            padding: 20px;
            text-align: left;
            color: #1E293B;
        }
        .content p {
            line-height: 1.6;
            margin-bottom: 15px;
        }
        .button-container {
            text-align: center;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>Redefinir Senha</h1>
        </div>
        <div class="content">
            <div class="button-container">
                <a href="{{route("password.reset", [$token])}}" class="button">Redefinir Minha Senha</a>
            </div>
            <p>Este link é válido por 1 hora. Caso não tenha solicitado esta redefinição, ignore este e-mail ou entre em contato conosco para garantir a segurança da sua conta.</p>
        </div>
    </div>
</body>
</html>