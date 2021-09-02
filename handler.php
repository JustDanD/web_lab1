<?php
session_start();
date_default_timezone_set('Europe/Moscow');
$start = microtime(true);
if (!isset($_SESSION["length"]))
{
    $_SESSION["length"] = 0;
}
$x = $_GET["x"];
$y = $_GET["y"];
$r = $_GET["r"];
$_SESSION["data"][$_SESSION["length"]] = $x;
$_SESSION["data"][$_SESSION["length"] + 1] = $y;
$_SESSION["data"][$_SESSION["length"] + 2] = $r;
if (($y >= -$r && $y <= 0 && $x <= 0 && $x >= -$r) || ($y >= 0 && $x >= 0 && $y <= ($r - 2 * $x)) || ($x >= 0 && $y <= 0 && ($y >= -sqrt(($r/2) * ($r/2) - $x * $x))))
{
    $_SESSION["data"][$_SESSION["length"] + 3] = "+";
}
else
{
    $_SESSION["data"][$_SESSION["length"] + 3] = "-";
}
$i = 0;
echo "<table border='1px'>";
echo "<tr><th>X</th><th>Y</th><th>R</th><th>Статус</th></tr>";
while ($i <= $_SESSION["length"])
{
    $xValue = $_SESSION['data'][$i];
    $yValue = $_SESSION['data'][$i + 1];
    $rValue = $_SESSION['data'][$i + 2];
    $sValue = $_SESSION['data'][$i + 3];
    echo "<tr><td>$xValue</td><td>$yValue</td><td>$rValue</td><td>$sValue</td></tr>";
    $i = $i + 4;
}
echo "</table>";
$_SESSION["length"] = $_SESSION["length"] + 4;
echo 'Время выполнения скрипта: '.round(microtime(true) - $start, 4).' сек.';
echo '<br>Текущие дата и время: '.date("m.d.y G:i:s")

?>