<html>

<head>
    <meta charset="utf-8" />
    <title> Simulador de Juros Compostos </title>
    <link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
    <link type="text/css" rel="stylesheet" href="css/estilos.css" />
    <link type="text/css" rel="stylesheet" href="css/formulario01.css" />
</head>

<body>
    <div id="cabecalho">
        <div id="opcoesCabecalho">
            <div id="logo">
                <img class="imgLogo" src="imagens/logo.png">
            </div>
            <div id="melhores">
                Os Melhores
                <p class="textoPequeno">Créditos e mais ></p>
            </div>
            <div id="guiasCompletos">
                Guias Completos
                <p class="textoPequeno">Financias e mais ></p>
            </div>
            <div id="ferramentas">
                Ferramentas
                <p class="textoPequeno">Compare e simule ></p>
            </div>
        </div>

        <div id="lupa">
            <img class="imgLupa" src="imagens/lupa.png">
        </div>
        <div id="barra">
            ➤ Iniciar sessão
        </div>
    </div>

    <div class="container">
        <h3 class="titulo mt-5 mb-5">Simulador de Juros Compostos</h3>
        <form id="formulario" action="exemplo01.php" method="get">
            <div class="row form-group mb-5">
                <div class="col-md-6">
                    <label for="valorInicial">Valor inicial</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">R$</span>
                        </div>
                        <input class="form-control" id="valorInicial" name="valorInicial" value="" type="text" placeholder="0,00">
                    </div>
                    <div class="error-message-valorInicial"></div>
                </div>
                <div class="col-md-6">
                    <label for="valorMensal">Valor Mensal</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">R$</span>
                        </div>
                        <input class="form-control" id="valorMensal" name="valorMensal" value="" type="text" placeholder="0,00">
                    </div>
                    <div class="error-message-valorMensal"></div>
                </div>
            </div>

            <div class="row form-group mt-4">
                <div class="col-md-6">
                    <label for="taxaJuros">Taxa de juros</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">%</span>
                        </div>
                        <input class="form-control" id="taxaJuros" name="taxaJuros" value="" type="text" placeholder="0,00">
                        <div class="input-group-addon">
                            <select class="form-control select" id="selectControl1" name="opcaoTaxaJuros">
                                <option value="anual">Anual</option>
                                <option value="mensal">Mensal</option>
                            </select>
                        </div>
                    </div>
                    <div class="error-message-taxaJuros"></div>
                </div>
                <div class="col-md-6">
                    <label for="periodo">Período em</label>
                    <div class="input-group">
                        <input class="form-control" id="periodo" name="periodo" value="" type="number" placeholder="0">
                        <div class="input-group-addon">
                            <select class="form-control select" id="selectControl2" name="opcaoPeriodo">
                                <option value="anos">Anos</option>
                                <option value="meses">Meses</option>
                            </select>
                        </div>
                    </div>
                    <div class="error-message-periodo"></div>
                </div>
            </div>

            <div class="row form-group mt-5">
                <div class="col-md-10">
                    <button type="submit" class="btn float-right botaoCalcular">CALCULAR</button>
                </div>
                <div class="col-md-2">
                    <button type="reset" class="btn botaoLimpar">LIMPAR</button>
                </div>
            </div>
        </form>

    </div>


    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script src="jQuery/jquery-3.6.4.js"></script>
    <script type="text/javascript" src="js/jquery.mask.js"></script>
    <script type="text/javascript" src="jQuery/jquery.maskMoney.min.js"></script>
    <script type="text/javascript" src="js/jquery.validate.js"></script>
    <script type="text/javascript" src="js/additional-methods.js"></script>
    <script type="text/javascript" src="js/localization/messages_pt_BR.js"></script>
    <script type="text/javascript" src="js/formulario01.js"></script>

</body>

</html>

<script>
    $("#formulario").validate({
        rules: {
            valorInicial: {
                required: true,
            },
            valorMensal: {
                required: true,
            },
            taxaJuros: {
                required: true,
            },
            periodo: {
                required: true,
                min: 1,
            },
        },
        messages: {
            valorInicial: {
                required: "Este campo deve ser preenchido!",

            },
            valorMensal: {
                required: "Este campo deve ser preenchido!",
            },
            taxaJuros: {
                required: "Este campo deve ser preenchido!",
            },
            periodo: {
                required: "Este campo deve ser preenchido!",
                min: "Digite um valor positivo!",
            },
        },
        errorPlacement: function(error, element) {
            error.appendTo(element.closest(".form-group").find(".error-message-" + element.attr("name")));
        },
    });

    $(document).ready(function() {
        $('#valorInicial').maskMoney({
            showSymbol: true,
            symbol: "R$",
            decimal: ",",
            thousands: "."
        });
        $('#valorMensal').maskMoney({
            showSymbol: true,
            symbol: "R$",
            decimal: ",",
            thousands: "."
        });
        $('#taxaJuros').maskMoney({
            showSymbol: true,
            symbol: "R$",
            decimal: ",",
            thousands: "."
        });
    });
</script>