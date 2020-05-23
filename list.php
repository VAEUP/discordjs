<?php
if (!empty($_GET['number'])) {
    $bdd = new PDO('pdo_values');
    
    $number = htmlspecialchars($_GET['number']);

    $reqnumber = $bdd->prepare("SELECT * FROM scam_incs WHERE numbers = ?");
    $reqnumber->execute(array($number));
    $numberexist = $reqnumber->rowCount();

    if ($numberexist != 0) {
        $number = $reqnumber->fetch();

        echo $number['name'].'*'.$number['website'].'*'.$number['numbers'].'*'.$number['email'].'*'.$number['other_name'];
    } else {
        echo "Error";
    }
} else {
    echo "Error";
}
