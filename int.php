<html>
<body>
<!-- MADE BY CHETAN KHANNA -->
<!-- ROLL NUMBER : 2018CSC10143 -->
<!-- SEM IV -->
<h3>Reverse an integer</h3>
<?php
function reverse_integer()
{


    $num = $_POST['n'];
    $rev = 0;
    while ($num != 0) {

        $rev = $rev * 10;
        $rev = $rev + $num % 10;
        $num = (int) ($num / 10);
    }


    echo $rev;
}


if (isset($_POST['submit'])) {
    reverse_integer();
} else {
?>
<form action="" method="post">
        Number : <input type="number" name="n" required><br><br>
        <span>&emsp;&emsp;&emsp;&emsp;</span>
        <input type="submit" value="Submit" name="submit">
    </form>
      <?php
}
?>
</body>
</html>
