<html>

<head>
    <meta charset="utf-8" />
    <title> Meu Cálculo </title>
    <link type="text/css" rel="stylesheet" href="css/bootstrap.css" />
    <link type="text/css" rel="stylesheet" href="css/estilos.css" />
    <link type="text/css" rel="stylesheet" href="css/exemplo01.css" />
</head>

<body>
    <div id="cabecalho">
        <div id="opcoesCabecalho">
            <div id="logo">
                <img class="imgLogo" src="imagens/logo.png">
            </div>
            <div id="melhores">
                Os Melhores
                <p class="textoPequeno">Céditos e mais ></p>
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
        <br>
        <?
        $valorInicial = $_GET['valorInicial'];
        $valorMensal = $_GET['valorMensal'];
        $taxaJuros = $_GET['taxaJuros'];
        $opcaoTaxaJuros = $_GET['opcaoTaxaJuros'];
        $periodo = $_GET['periodo'];
        $opcaoPeriodo = $_GET['opcaoPeriodo'];

        $totalInvestido = floatval(str_replace(",", ".", str_replace(".", "", $valorInicial)));
        $totalJuros = 0;
        $juros = 0;
        $totalAcumulado = $totalInvestido;

        $aplicacaoTaxaJuros =  $opcaoTaxaJuros == "mensal" ? floatval(str_replace(",", ".", str_replace(".", "", $taxaJuros))) : floatval(str_replace(",", ".", str_replace(".", "", $taxaJuros))) / 12;
        $tempo =  $opcaoPeriodo == "meses" ? $periodo : $periodo * 12;
        ?>
        <a id="linkVoltar" href="formulario01.php">🠔 Fazer outro cálculo</a>
        <h4 class="titulo mt-4 mb-4">Meu cálculo</h4>
        <form id="formulario" action="exemplo01.php" method="get">
            <div class="row form-group">
                <div class="col-md-6">
                    <div class="input-group">
                        <input class="form-control inputNome" id="valorInicial" name="valorInicial" value="" type="text" placeholder="Valor inicial" readonly>
                        <input class="form-control inputDados" id="valorInicial" name="valorInicial" value="" type="text" placeholder="R$ <?= $valorInicial ?>" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group">
                        <input class="form-control inputNome" id="valorMensal" name="valorMensal" value="" type="text" placeholder="Valor Mensal" readonly>
                        <input class="form-control inputDados" id="valorMensal" name="valorMensal" value="" type="text" placeholder="R$ <?= $valorMensal ?>" readonly>
                    </div>
                </div>
            </div>

            <div class="row form-group mt-4">
                <div class="col-md-6">
                    <div class="input-group">
                        <input class="form-control inputNome" id="taxaJuros" name="taxaJuros" value="" type="text" placeholder="Taxa de juros" readonly>
                        <input class="form-control inputDados" id="taxaJuros" name="taxaJuros" value="" type="text" placeholder="<?= $taxaJuros ?>% (<?= $opcaoTaxaJuros ?>)" readonly>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="input-group">
                        <input class="form-control inputNome" id="periodo" name="periodo" value="" type="text" placeholder="Período em" readonly>
                        <input class="form-control inputDados" id="periodo" name="periodo" value="" type="text" placeholder="<?= $tempo ?> meses" readonly>
                    </div>
                </div>
            </div>
        </form>
        <hr>
        <?
        $valorMensal = floatval(str_replace(",", ".", str_replace(".", "", $valorMensal))); ?>
        <h4 class="titulo mt-4 mb-4">Resultado</h4>
        <div id="divDados">
            <div class="divAreaTabela mt-4 mb-5">
                <h3 class="text-center tabelaTitulo">Tabela</h3>
                <hr>
                <div class="table-wrapper">
                    <table class="table divTabela mt-1 table-hover table-striped">
                        <thead>
                            <tr class="tr">
                                <th scope="col" class="thMes">
                                    <p>Mês</p>
                                </th>
                                <th scope="col" class="thMes">
                                    <p>Juros</p>
                                </th>
                                <th scope="col" class="thInvest">Total<br>Investido</th>
                                <th scope="col" class="thTotalJuros">Total<br>Juros</th>
                                <th scope="col" class="thAcumulado">Total<br>Acumulado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <? for ($meses = 0; $meses <= $tempo; $meses++) {
                                echo "<tr>";
                                echo "<td class='tdMes tr'>" . $meses . "</td>";
                                echo $meses != 0 ? "<td class='tdMes tr'> R$" . number_format($juros, 2, ",", ".") . "</td>" : "<td class='tdMes tr'>--</td>";
                                echo "<td class='tdInvest tr'> R$" . number_format($totalInvestido, 2, ",", ".") . "</td>";
                                echo $meses != 0 ? "<td class='tdTotalJuros tr'> R$" . number_format($totalJuros, 2, ",", ".") . "</td>" : "<td class='tdTotalJuros tr'>--</td>";
                                echo "<td class='tdAcumulado tr'> R$" . number_format($totalAcumulado, 2, ",", ".") . "</td>";
                                echo "</tr>";

                                if ($meses < $tempo) {
                                    $juros = $totalAcumulado * ($aplicacaoTaxaJuros / 100);
                                    $totalJuros += $juros;
                                    $totalAcumulado += $valorMensal + $juros;
                                    $totalInvestido += $valorMensal;
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div>
                <hr>
            </div>
            <div id="divValores" class="row form-group">
                <div class="col-4">
                    <div class="card text-white bg-m-1">
                        <div class="card-body">
                            <p class="card-title">Valor total final</p>
                            <p class="card-text valorTotalFinal">R$ <?= number_format($totalAcumulado, 2, ",", ".") ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card text-white bg- m-1">
                        <div class="card-body">
                            <p class="card-title">Valor total investido</p>
                            <p class="card-text valorTotalInvestido">R$ <?= number_format($totalInvestido, 2, ",", ".") ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card text-white bg- m-1 mb-4">
                        <div class="card-body">
                            <p class="card-title">Total em juros</p>
                            <p class="card-text valorTotalJuros">R$ <?= number_format($totalJuros, 2, ",", ".") ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>