<link rel="stylesheet" href="style.css">
<?php
echo date('F o');
$today = date('d');
$dayofmonth = date('t');
$day_count = 1;
$num = 0;
$text = array('Пн','Вт','Cр','Чт','Пт','Сб','Вс');

for ($i = 0; $i < 7; $i++) {

    $dayofweek = date('w', mktime(0, 0, 0, date('m'), $day_count, date('Y')));
    $dayofweek = $dayofweek -1;

    if ($dayofweek == -1) $dayofweek = 6;
    if ($dayofweek == $i) {
        $week[$num][$i] = $day_count;
        $day_count++;
    } else {
        $week[$num][$i] = " ";
    }
}

while (true) {
    $num++;
    for ($i = 0; $i < 7; $i++) {
        $week[$num][$i] = $day_count;
        $day_count++;
        if ($day_count > $dayofmonth) break;
    }
    if ($day_count > $dayofmonth) break;
}

echo "<table border=1>";

echo "<thead><tr>";

for($i =0; $i<7; $i++) {
    if($i == 5 || $i == 6){
        echo "<th class='red'>".$text[$i]."</th>";
    } else {
        echo "<th>".$text[$i]."</th>";
    }
}

echo "</tr></thead>";

for ($i = 0; $i < count($week); $i++) {
    echo "<tr>";
    for ($j = 0; $j < 7; $j++) {
        if (!empty($week[$i][$j])) {
            if ($j == 5 || $j == 6)
                echo "<td class='red'>".$week[$i][$j]. "</td>";
            else {
                if($week[$i][$j] == $today) {
                    echo "<td class='red'>".$today. "</td>";
                } else {
                    echo "<td>" . $week[$i][$j] . "</td>";
                }
            }
        } else echo "<td></td>";
    }
    echo "</tr>";
}
echo "</table>";
?>

