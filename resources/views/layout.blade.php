<?php
    // Calcular a idade
    $dataNascimento = '2003-03-14';
    $hoje = new DateTime();
    $nascimento = new DateTime($dataNascimento);
    $idade = $hoje->diff($nascimento)->y;
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currículo - Diogo Leonardo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ asset('storage/foto_perfil.png') }}" alt="Diogo Leonardo" width="150">
            <div class="info">
                <div class="row" style="justify-content: space-between">
                    <div class="col-md-auto">
                        <h1>Diogo Leonardo</h1>
                        <div class="additional-info">
                            <p><strong>Português, <?= $idade ?> anos </strong></p>
                        </div>
                    </div>
                    <div class="col-md-auto pt-2">
                        <i class="fa-solid fa-file-invoice mr-1"></i><a href="{{ asset('storage/Curriculo.pdf') }}" target="blank" class="link"> Currículum Vitae</a>
                    </div>
                </div>
                <div class="d-none d-md-block contact-info">
                    <div><i class="fas fa-home"></i>Leiria, Portugal</div>
                    <div><i class="fas fa-envelope"></i> <a href="mailto:dalexandre02@gmail.com" class="link">Dalexandre02@gmail.com</a></div>
                    <div><i class="fas fa-phone"></i><a href="tel:+351961157763" class="link">(+351) 961157763</a></div>
                    <div><i class="fab fa-linkedin"></i> <a href="https://www.linkedin.com/in/diogoleonardo/" target="blank" class="link">LinkedIn</a></div>
                </div>
            </div>
        </div>
        <div class="d-block d-md-none contact-info">
            <div><i class="fas fa-home"></i>Leiria, Portugal</div>
            <div><i class="fas fa-envelope"></i> <a href="mailto:dalexandre02@gmail.com" class="link">Dalexandre02@gmail.com</a></div>
            <div><i class="fas fa-phone"></i><a href="tel:+351961157763" class="link">(+351) 961157763</a></div>
            <div><i class="fab fa-linkedin"></i> <a href="https://www.linkedin.com/in/diogoleonardo/" target="blank" class="link">LinkedIn</a></div>
        </div>
        <div class="section">
            <h2><i class="fa-solid fa-address-card" style="margin-right: 10px;font-size: 24px;"></i> <strong> SOBRE MIM </strong></h2>
            <p>
                Tenho, desde muito novo, um grande gosto pela informática e enorme entusiasmo pelo mundo digital, do qual quero fazer parte não só no lazer mas também no trabalho. Acabo de concluir a minha licenciatura em Engenharia Informática no Instituto Politécnico de Leiria e agora procuro aplicar os meus conhecimentos também no setor profissional. Aprendi e melhorei as minhas competências em desenvolvimento de aplicações web, móveis e nativas, incluindo os frameworks mais utilizados, arquitetura e gestão de bases de dados, técnicas de Inteligência Artificial tais como Machine Learning, análise e transformação de dados, configuração de servidores e software, ferramentas como git, figma entre muitas outras. Adquiri também competências de forma autónoma em automação de tarefas e processos, web scraping, edição de imagem e vídeo, programação de jogos em Unity e Wordpress. As minhas linguagens de programação favoritas são Python, JavaScript, PHP, Java e C#.
            </p>
        </div>
        <br><br>
        <!-- load projects -->
        @yield('projetos')
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</body>
</html>
