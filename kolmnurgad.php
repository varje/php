<html>
<head>
    <title>Simple Math With User Input</title>
</head>
<body>
Sisesta kolmnurga küljepikkused. <br>
<form method="post">
    Külje a pikkus: <input name="a" type="text" /><br>
    Külje b pikkus: <input name="b" type="text" /><br>
    Külje c pikkus: <input name="c" type="text" /><br>
    <input type="submit" />
</form>
<?php
if((isset($_POST['a']) & (isset($_POST['b'])) & (isset($_POST['c'])))) {
    $a = $_POST['a'];
    $b = $_POST['b'];
    $c = $_POST['c'];
    if($a > 0 & $b > 0 & $c > 0){
        if ($a+$b > $c and $b+$c>$a and $a+$c > $b) {
            $P = $a + $b + $c;
            $p = $P / 2;
            $S = sqrt($p * ($p - $a) * ($p - $b) * ($p - $c));
            $alfa = round(rad2deg(acos(($b * $b + $c * $c - $a * $a) / (2 * $b * $c))), 2);
            $beeta = round(rad2deg(acos(($a * $a + $c * $c - $b * $b) / (2 * $a * $c))), 2);
            $gamma = round(rad2deg(acos(($b * $b + $a * $a - $c * $c) / (2 * $b * $a))), 2);
            if ($a * $a + $b * $b == $c * $c or $a * $a + $c * $c == $b * $b  or $c * $c + $b * $b == $a * $a )  {
                $tyyp = "täisnurkne";
            } else if ($a == $b and $b == $c) {
                $tyyp = "võrdkülgne";
            } else if ($a == $b or $a == $c or $b == $c) {
                $tyyp = "võrdhaarne";
            } else {
                $tyyp = "erikülgne";
            }
            echo "Kolmnurga ümbermõõt on " . $P . ".<br>";
            echo "Kolmnurga pindala on " . $S . ".<br>";
            echo "Kolmnurga nurgad on " . $alfa . ", " . $beeta . " ja " . $gamma . " kraadi.<br>";
            echo "Kolmnurga tüüp on " . $tyyp . ".";
        } else {
            echo "Tegemist pole kolmnurgaga";
        }
    } else {
        echo "Sisesta nullist suurem number küljepikkusteks";
    }
} else {
    echo "Mõni küljepikkus on määramata";
}


?>
</body>
</html>