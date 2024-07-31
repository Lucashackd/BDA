<?php

use Google\Cloud\Core\Exception\GoogleException;
use Google\Cloud\Firestore\FirestoreClient;

require 'vendor/autoload.php';

$configParams = [
    'keyFilePath' => '',
    'projectId' => '',
];

try {
    $db = new FirestoreClient($configParams);
    $collection = $db->collection('Provedores');
    if (isset($_GET['submit'])) {
        $selectedDate = $_GET['dates'];
        $docs = $collection->where('mensuracao', '=', $selectedDate)->limit(20)->documents();
    }
} catch (GoogleException $e) {
    echo $e->getMessage();
}
?>

<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tarefa 1</title>
    <style>
        th{
            background-color: burlywood;
            padding: 2px 8px 2px 8px;
        }
        td {
            background-color: gainsboro;
            padding: 2px 8px 2px 8px;
        }
    </style>
</head>
<body>
<form method="get">
    <label for="dates">Selecione a data de mensuração:</label>
    <select name="dates" id="dates">
        <option value="2023-09-01">01/09/2023</option>
        <option value="2022-09-01">01/09/2022</option>
        <option value="2021-09-01">01/09/2021</option>
        <option value="2020-09-01">01/09/2020</option>
        <option value="2019-09-01">01/09/2019</option>
        <option value="2018-09-01">01/09/2018</option>
        <option value="2017-09-01">01/09/2017</option>
        <option value="2016-09-01">01/09/2016</option>
        <option value="2015-09-01">01/09/2015</option>
        <option value="2014-09-01">01/09/2014</option>
        <option value="2013-09-01">01/09/2013</option>
        <option value="2012-09-01">01/09/2012</option>
        <option value="2011-09-01">01/09/2011</option>
        <option value="2010-09-01">01/09/2010</option>
        <option value="2009-09-01">01/09/2009</option>
        <option value="2008-09-01">01/09/2008</option>
        <option value="2007-09-01">01/09/2007</option>"
    </select>
    <input type="submit" name="submit">
</form>

<?php
    if (!empty($selectedDate)) {
        ?>
        <table style="text-align: center; margin-top: 8px;">
            <tr>
                <th>CNPJ</th>
                <th>EMPRESA</th>
                <th>FAIXA</th>
                <th>GRUPO</th>
                <th>MEIO</th>
                <th>PORTE</th>
                <th>QT</th>
                <th>TECNOLOGIA</th>
                <th>TPESSOA</th>
                <th>TPRODUTOS</th>
                <th>VELOCIDADE</th>
            </tr>

            <?php
            foreach ($docs as $doc) {
            ?>
                    <tr>
                        <td><?= $doc['cnpj'] ?></td>
                        <td><?= $doc['empresa'] ?></td>
                        <td><?= $doc['faixa'] ?></td>
                        <td><?= $doc['grupo'] ?></td>
                        <td><?= $doc['meio'] ?></td>
                        <td><?= $doc['porte'] ?></td>
                        <td><?= $doc['qt'] ?></td>
                        <td><?= $doc['tecnologia'] ?></td>
                        <td><?= $doc['tpessoa'] ?></td>
                        <td><?= $doc['tproduto'] ?></td>
                        <td><?= $doc['velocidade'] ?></td>
                    </tr>
                <?php
            }
            ?>
        </table>
        <?php
    }
    ?>
</body>
</html>
