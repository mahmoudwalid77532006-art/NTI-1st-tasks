<?php
///////////////////////////////////////////////////////////////
// problem 1: Age check
$age = 16;
echo "<h3>Problem 1:</h3>";
if ($age >= 18) {
    echo "Registration allowed";
} else {
    echo "Registration not allowed";
}
echo "<hr>";

///////////////////////////////////////////////////////////////
// problem 2: Operations on numbers
function operation_numbers($x, $y) {
    echo "<h3>Problem 2:</h3>";
    echo "Multiplication: " . ($x * $y) . "<br>";
    echo "Subtraction: " . ($x - $y) . "<br>";
    echo "Modulo: " . ($x % $y) . "<br>";
}
operation_numbers(15, 5);
echo "<hr>";

///////////////////////////////////////////////////////////////
// problem 3: Sum numbers
$x=0; $y=0; $z=0;
$numbers=array($x,$y,$z);
function sum_numbers($numbers) {
    $sum = 0;
    foreach($numbers as $num) {
        $sum += $num;
    }
    echo "<h3>Problem 3:</h3>";
    echo "Sum: " . $sum . "<br>";
}
sum_numbers(array(5,10,15));
echo "<hr>";

///////////////////////////////////////////////////////////////
// problem 4: Search film
$films = array("Fast","Predestination","Persuit","Prestige");
$keyword = "avatar";
$found = false;
$count = count($films);
for ($i = 0; $i < $count; $i++) {
    if ($films[$i] == $keyword) {
        $found = true;
        break; 
    }
}
echo "<h3>Problem 4:</h3>";
echo ($found ? "Yes" : "No");
echo "<hr>";

///////////////////////////////////////////////////////////////
// problem 5: Bubble Sort
function RouteBubble($arr) {
    $n = count($arr);
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if ($arr[$j] > $arr[$j + 1]) {
                $temp = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $temp;
            }
        }
    }
    return $arr;
}
$arr_to_sort = array(5, 2, 9, 1, 6);
$sorted = RouteBubble($arr_to_sort);
echo "<h3>Problem 5: Bubble Sort</h3>";
echo "Sorted array: ";
echo implode(", ", $sorted);
echo "<hr>";

///////////////////////////////////////////////////////////////
// problem 6: Max number
$tests = array(5,4,9,3,1,7,5,8,6);
$max = $tests[0];
for ($i = 1; $i < count($tests); $i++) {
    if ($tests[$i] > $max) {
        $max = $tests[$i];
    }
}
echo "<h3>Problem 6:</h3>";
echo "Max: " . $max;
echo "<hr>";

///////////////////////////////////////////////////////////////
// problem 7: Count keyword
$films = array("avatar","Prestige","avatar","Prestige");
$keyword = "avatar";
$count = 0;
for ($i = 0; $i < count($films); $i++) {
    if ($films[$i] == $keyword) {
        $count++;
    }
}
echo "<h3>Problem 7:</h3>";
echo "Count of '$keyword': " . $count;
echo "<hr>";

///////////////////////////////////////////////////////////////
// problem 8: Random password
function RouteRandomPass($length) {
    $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
    $pass = "";
    for ($i = 0; $i < $length; $i++) {
        $pass .= $chars[rand(0, strlen($chars) - 1)];
    }
    return $pass;
}
echo "<h3>Problem 8: Random Password</h3>";
echo "Password: " . RouteRandomPass(8);
echo "<hr>";

///////////////////////////////////////////////////////////////
// problem 9: Boolean check
$tests = array(1, "tariq", 1.5, true, 7, 's', false);
echo "<h3>Problem 9: Boolean Check</h3>";
foreach ($tests as $item) {
    echo (is_bool($item) ? "Yes" : "No") . "<br>";
}
echo "<hr>";

///////////////////////////////////////////////////////////////
// problem 10: Sorting numbers
$tests = array(6, 4, 9, 3, 12, 8, 7);
sort($tests);
echo "<h3>Problem 10: Sorted Numbers</h3>";
echo implode(", ", $tests);
echo "<hr>";

///////////////////////////////////////////////////////////////
// problem 11: Same values between arrays
$arr1 = array('a','b','c','d');
$arr2 = array('c','d','e','f');
echo "<h3>Problem 11: Same Values</h3>";
$first = true;
for ($i = 0; $i < count($arr1); $i++) {
    for ($j = 0; $j < count($arr2); $j++) {
        if ($arr1[$i] == $arr2[$j]) {
            if (!$first) echo " - ";
            echo $arr1[$i];
            $first = false;
        }
    }
}
echo "<hr>";

///////////////////////////////////////////////////////////////
// problem 12: Form GET/POST
$total = "";
if (isset($_POST['submit'])) {
    $price = $_POST['price']; 
    $tax = $_POST['tax'];   
    $total = $price + ($price * $tax / 100);
}
?>

<h3>Problem 12: Calculate Price with Tax</h3>
<form method="post" action="">
    <label>Price:</label>
    <input type="number" name="price" required><br><br>

    <label>Tax (%):</label>
    <input type="number" name="tax" required><br><br>

    <input type="submit" name="submit" value="Process">
</form>

<?php
if ($total != "") {
    echo "<h4>Total: " . $total . " EGP</h4>";
}
?>
