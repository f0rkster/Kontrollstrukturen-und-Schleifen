<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontrollstrukturen und Schleifen</title>
</head>
<body>
<?
// Konstanten

const PI = 3.14;
define('EUR', '€');

// PI = 3.14; // Fehler

// Vergleichsoperatoren

// == Gleichheit in Inhalt
$true = 1 == 1;
$true = 1 == '1';
$false = 1 == 0;

// === Gleichheit in Inhalt UND Typ
$true = 1 === 1;
$false = 1 === '1';

// != Ungleicher Inhalt
$true = 1 != 0;
$true = 1 != 'Hello';
$false = 1 != 1;
$false = 1 != '1';

// !== Ungleicher Inhalt UND Typ
$true = 1 !== 0;
$true = 1 !== 'Hello';
$false = 1 !== 1;
$true = 1 !== '1';

// <, <=, >, >=

// Vordefinierte Variablenfunktion

$example = 'content';
$array = [];

// geben true und false zurück
isset($example);    // Variable vorhanden?
empty($example);    // Variable leer?
in_array($example, $array); // befindet sich $example in $array?

// gibt Anzahl Elemente zurück
count($array); // Rückgabewert: 0

// if-else Anweisung
echo '<h4>if-else</h4><hr>';

$tom    = array('firstname'=>'Tom', 'height'=>1.65);
$hans   = array('firstname'=>'Hans', 'height'=>1.82);

if($hans['height'] > $tom['height'])
{
    echo $hans['firstname'] . 'ist größer als ' . $tom['firstname'];
}
else if($hans['height'] < $tom['height'])
{
    echo $tom['firstname'] . 'ist größer als ' . $hans['firstname'];
}
else
{
    echo $hans['firstname'] . ' und ' . $tom['firstname'] . ' sind gleich groß.';
}

echo '<br>';

$referenceHeight = 1.7;

$comparison = $tom['height'] > $referenceHeight ? 'größer' : 'nicht größer';

echo $tom ['firstname'] . " ist $comparison als {$referenceHeight}m";

echo '<hr>';

// Switch-Case
echo '<h4>switch-case</h4><hr>';

$myMathMark = 4;

echo 'Meine Mathenote ist ';

if($myMathMark == 1)
{
    echo 'sehr gut';
}
else if($myMathMark == 2)
{
    echo 'gut';
}
else if($myMathMark == 3)
{
    echo 'befriedigend';
}
else if($myMathMark == 4)
{
    echo 'ausreichend';
}
else if($myMathMark == 5 || $myMathMark == 6 )
{
    echo 'nicht ausreichend';
}
else
{
    echo 'keine Einstufung für die Note';
}

echo '<br>Meine Physiknote ist ';
$myPhysicsMark = 5;

switch ($myPhysicsMark)
{
    case 1:
        echo 'sehr gut';
        break;
    case 2:
        echo 'gut';
        break;
    case 3:
        echo 'befriedigend';
        break;
    case 4:
        echo 'ausreichend';
        break;
    case 5:
    case 6:
        echo 'nicht ausreichend';
        break;

    default:
        echo 'Keine Einstufung für die Note';
        break;
}

echo '<hr>';

// Schleifen und break;
echo '<h4>Schleifen</h4><hr>';

$shoppingList = ['Äpfel','Schokolade','67 Zoll Plasma-TV'];
$shoppingCart = []; // Array deklarieren
$storeItems = ['67 Zoll LED-TV', 'Birne', 'Schokolade', 'Stifte', 'Äpfel'];

// for

echo 'Meine Einkaufsliste:<br>';
for($index = 0; $index < count($shoppingList); ++$index)
{
    echo $index < count($shoppingList) - 1 ? $shoppingList[$index] . ', ' : $shoppingList[$index];
}

echo '<br><br>';

for($index =0, $length = count($storeItems); $index<$length; ++$index)
{
    if(in_array($storeItems[$index], $shoppingList))
    {
        $shoppingCart[] = $storeItems[$index];
    }
    if (count($shoppingCart) == count($shoppingList))
    {
        break;
    }
}

// foreach (key=>value und value)

$notInStore = [];

foreach($shoppingList as $position => $item)
{
    if(!in_array($item, $shoppingCart))
    {
        $notInStore[] = ['position' => $position + 1, 'item' => $item];
    }
}
?>
<table border="1">
    <tr>
        <th>Laden</th>
        <th>Einkaufskorb</th>
        <th>Nicht Vorhanden</th>
    </tr>

    <td>
        <ul>
        <? foreach($storeItems as $item) : ?>
            <li><?=$item?></li>

        <? endforeach; ?>
        </ul>
    </td>

    <td>
        <ul>
            <? foreach ($shoppingCart as $item) : ?>

                <li><?=$item?></li>

            <? endforeach; ?>
        </ul>
    </td>
    <td>
        <ul>
            <? foreach ($notInStore as $item) : ?>

                <li>
                    <?
                        echo $item['item'].'(Position auf der Liste: '.$item['position'].')';
                    ?>
                </li>

            <? endforeach; ?>
        </ul>
    </td>
</table>

<br><br>

<?php

// while, do-while und continoue;

$counter = 0;
while($counter != 10)
{
    echo ++$counter;

    if ($counter >= 7)
    {
        echo '<br>';
        continue;
    }

    echo ', damit ist $counter kleiner als 7<br>';
}

do {
    echo ++$counter;
} while ($counter < 1);

?>
</body>
</html>