<html>
<head>
    <title>Simple Math With User Input</title>
</head>
<body>
Sisesta täisnurkse kolmnurga küljepikkused. <br>
<form method="post">
    Külje a pikkus: <input name="a" type="text" /><br>
    Külje b pikkus: <input name="b" type="text" /><br>
    Külje c pikkus: <input name="c" type="text" /><br>
    <input type="submit" />
</form>
<?php
$a = $b = $c = 0;
if((isset($_POST['a']) & (isset($_POST['b'])) & (isset($_POST['c'])))) {
    $a = $_POST['a'];
    $b = $_POST['b'];
    $c = $_POST['c'];
    if(($a * $a + $b * $b == $c * $c or $a * $a + $c * $c == $b * $b  or $c * $c + $b * $b == $a * $a) & $a > 0 & $b > 0 & $c > 0 ) {
        $P = $a + $b + $c;
        $S = $a * $b / 2;
        $alfa = round(rad2deg(acos($a/$c)), 2);
        $beeta = 90 - $alfa;
        echo "Kolmnurga ümbermõõt on ". $P . "<br>";
        echo "Kolmnurga pindala on ". $S . "<br>";
        echo "Kolmnurga nurgad on 90, ". $alfa . " ja " .$beeta. " kraadi.";
    } else {
        echo "Tegemist pole täisnurkse kolmnurgaga, sisesta uued küjepikkused";
    }
} else {
    echo "Mõni küljepikkus on määramata";
}


?>
</body>
</html>