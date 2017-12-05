<html>
<head>
    <title>Kolmnurga kalkulaator</title>
    <style>
        body {
            background-color: lightblue;
        }
        p {
            text-align: center;
        }
    </style>
</head>
<body>
<p>Sisesta kolme muutuja väärtused: <br></p>
<p><img src="triangle.png" alt="Kolmnurk" width="25%" height="25%"></p>
<form method="post">
    <p>Külje a pikkus: <input name="a" type="text" /><br>
    Külje b pikkus: <input name="b" type="text" /><br>
        Külje c pikkus: <input name="c" type="text" /><br>
    Nurga A suurus: <input name="A" type="text" /><br>
    Nurga B suurus: <input name="B" type="text" /><br>
    Nurga C suurus: <input name="C" type="text" /><br></p>
    <p><input type="submit" /></p>
</form>
<?php
function is_set($var_name) {
    if (isset($_POST[$var_name])) {
        return $_POST[$var_name];
    } else {
        return NULL;
    }
}
function solveSide($a, $b, $C) {
    $C = deg2rad($C);
    return sqrt($a * $a + $b * $b - 2 * $a * $b * cos($C));
}

$a = is_set('a');
$b = is_set('b');
$c = is_set('c');
$A = is_set('A');
$B = is_set('B');
$C = is_set('C');
$sides = is_numeric($a) + is_numeric($b) + is_numeric($c);
$angles = is_numeric($A) + is_numeric($B) + is_numeric($C);

if ($sides + $angles == 3) {
    if ($sides > 0) {
        // all sides
        if ($sides == 3) {
            // angle calculations
            if ($a > 0 & $b > 0 & $c > 0) {
                if ($a + $b > $c and $b + $c > $a and $a + $c > $b) {
                    $A = round(rad2deg(acos(($b * $b + $c * $c - $a * $a) / (2 * $b * $c))), 2);
                    $B = round(rad2deg(acos(($a * $a + $c * $c - $b * $b) / (2 * $a * $c))), 2);
                    $C = round(rad2deg(acos(($b * $b + $a * $a - $c * $c) / (2 * $b * $a))), 2);
                    solveTriangle($a, $b, $c, $A, $B, $C);
                } else {
                    echo "<p style='color:red;'>Tegemist pole kolmnurgaga</p>";
                }
            } else {
                echo "<p style='color:red;'>Sisesta nullist suurem number küljepikkusteks</p>";
            }
            // 2 angles, 1 side
        } else if ($angles == 2) {
            // find angles
            if ($A == NULL) {
                $A = 180 - $B - $C;
            } else if ($B == NULL) {
                $B = 180 - $A - $C;
            } else {
                $C = 180 - $A - $B;
            }
            // find ratio to find sides
            if ($a != NULL) {
                $ratio = $a / sin(deg2rad($A));
            } else if ($b != NULL) {
                $ratio = $b / sin(deg2rad($B));
            } else {
                $ratio = $c / sin(deg2rad($C));
            }
            // find sides
            if ($a == NULL) {
                $a = $ratio * sin(deg2rad($A));
            }
            if ($b == NULL) {
                $b = $ratio * sin(deg2rad($B));
            }
            if ($c == NULL) {
                $c = $ratio * sin(deg2rad($C));
            }
            solveTriangle($a, $b, $c, $A, $B, $C);
            // 2 sides, 1 angle
        } else {
            //Side-angle-side
            if (($A != null and $b != null and $c != null) or ($c != null and $a != null and $B != null) or ($a != null and $b != 0 and $c != 0)) {
                // sides calculations
                if ($a == null) {
                    $a = solveSide($b, $c, $A);
                }
                if ($b == null) {
                    $b = solveSide($c, $a, $B);
                }
                if ($c == null) {
                    $c = solveSide($a, $b, $C);
                }
                // angle calculations
                if ($a + $b > $c and $b + $c > $a and $a + $c > $b) {
                    $A = round(rad2deg(acos(($b * $b + $c * $c - $a * $a) / (2 * $b * $c))), 2);
                    $B = round(rad2deg(acos(($a * $a + $c * $c - $b * $b) / (2 * $a * $c))), 2);
                    $C = round(rad2deg(acos(($b * $b + $a * $a - $c * $c) / (2 * $b * $a))), 2);
                    solveTriangle($a, $b, $c, $A, $B, $C);
                } else {
                    echo "<p style='color:red;'>Tegemist pole kolmnurgaga</p>";
                }
                //side-side-angle
            } else {
                //declare temporary variables
                $knownside = null;
                $knownangle = null;
                $partialside = null;
                if ($a != null and $A != null) {
                    $knownside = $a;
                    $knownangle = $A;
                }
                if ($b != null and $B != null) {
                    $knownside = $b;
                    $knownangle = $B;
                }
                if ($c != null and $C != null) {
                    $knownside = $c;
                    $knownangle = $C;
                }
                if ($a != null and $A == null) {
                    $partialside = $a;
                }
                if ($b != null and $B == null) {
                    $partialside = $b;
                }
                if ($c != null and $C == null) {
                    $partialside = $c;
                }
                // ratio calculation
                $ratio = $knownside / sin(deg2rad($knownangle));
                $temporary = $partialside / $ratio;
                if (($temporary > 1) or ($knownangle >= 90 and $partialside >= $knownside)) {
                    echo "<p style='color:red;'>Tegemist pole kolmnurgaga</p>";
                } else if ($temporary == 1 or $knownside >= $partialside) {
                    $partialangle = rad2deg(asin($temporary));
                    $unknownangle = 180 - $knownangle - $partialangle;
                    $unknownside = $ratio * sin(deg2rad($unknownangle));
                    // give from temporary variables back to real variables
                    if ($a != null and $A == null) {
                        $A = $partialangle;
                    }
                    if ($b != null and $B == null) {
                        $B = $partialangle;
                    }
                    if ($c != null and $C == null) {
                        $C = $partialangle;
                    }
                    if ($a == null and $A == null) {
                        $a = $unknownside;
                        $A = $unknownangle;
                    }
                    if ($b == null and $B == null) {
                        $b = $unknownside;
                        $B = $unknownangle;
                    }
                    if ($c == null and $C == null) {
                        $c = $unknownside;
                        $C = $unknownangle;
                    }
                    solveTriangle($a, $b, $c, $A, $B, $C);
                } else {
                    echo "<p style='color:red;'>Pole unikaalset lahendust</p>";
                }
            }
        }
    } else {
        echo "<p style='color:red;'>Sisesta vähemalt ühe külje pikkus</p>";
    }
} else {
    echo "<p style='color:red;'>Sisesta 3 muutuja väärtused</p>";
}

function solveTriangle($a, $b, $c, $A, $B, $C) {
    $P = $a + $b + $c;
    $p = $P / 2;
    $S = sqrt($p * ($p - $a) * ($p - $b) * ($p - $c));
    if ($a * $a + $b * $b == $c * $c or $a * $a + $c * $c == $b * $b or $c * $c + $b * $b == $a * $a) {
        $tyyp = "täisnurkne";
    } else if ($a == $b and $b == $c) {
        $tyyp = "võrdkülgne";
    } else if ($a == $b or $a == $c or $b == $c) {
        $tyyp = "võrdhaarne";
    } else {
        $tyyp = "erikülgne";
    }
    echo "<p>Kolmnurga ümbermõõt on " . round($P) . ". Kasutatud valem: P = a + b + c</p>";
    echo "<p>Kolmnurga pindala on " . round($S) . ".Kasutatud valem: S = ruutjuur(p * (p - a) * (p - b) * (p - c), kus p = P / 2</p>";
    echo "<p>Kolmnurga nurgad on " . round($A) . ", " . round($B) . " ja " . round($C) . " kraadi.</p>";
    echo "<p>Kolmnurga küljed on " . round($a, 2) . ", " . round($b, 2) . " ja " . round($c, 2) . " pikkusühikut.</p>";
    echo "<p>Kolmnurga tüüp on " . $tyyp . ".</p>";
}


?>
</body>
</html>