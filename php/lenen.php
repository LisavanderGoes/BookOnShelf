<?php //checked

require "../../xprivate/config.inc.php";

$boekid = $_GET['id'];
$userID = $_SESSION['userID'];

$selboeken = 'SELECT aantal, name, writer, gereserveerd, reserverenID FROM boeken WHERE boekenID= :ID';
$resboeken = $db->prepare($selboeken);
$resboeken->bindParam(':ID', $boekid, PDO::PARAM_INT);
$resboeken->execute();
$boeken = $resboeken->fetch();


$aantal = $boeken['aantal'];
$name = $boeken['name'];
$writer = $boeken['writer'];
$gereserveerd = $boeken['gereserveerd'];
$reserverenID = $boeken['reserverenID'];

$leen_date = date ("Y-m-d");
$boeknewaantal = $aantal - 1;


$update1 = 'UPDATE boeken SET gereserveerd="false", reserverenID=1 WHERE boekenID = :ID';
$up1 = $db->prepare($update1);
$up1->bindParam(':ID', $boekid, PDO::PARAM_INT);

$update2 = 'UPDATE boeken SET aantal= :NEW WHERE boekenID = :ID';
$up2 = $db->prepare($update2);
$up2->bindParam(':ID', $boekid, PDO::PARAM_INT);
$up2->bindParam(':NEW', $boeknewaantal, PDO::PARAM_INT);

$insert1 = "INSERT INTO lenen (userID, boekID, date)
                  VALUES ('$userID', '$boekid', '$leen_date')";
$in1 = $db->prepare($insert1);

$update3 = 'UPDATE boeken SET gereserveerd="true", reserverenID= :USERID WHERE boekenID = :ID';
$up3 = $db->prepare($update3);
$up3->bindParam(':ID', $boekid, PDO::PARAM_INT);
$up3->bindParam(':USERID', $userID, PDO::PARAM_INT);


if(isset($_POST['submit'])) {

    try{

        if (($gereserveerd == 'true') AND ($userID == $reserverenID)) {

            $up1->execute();

            //----lenen---//
            if ($aantal != 0) {

                $up2->execute();
                $in1->execute();

                $_SESSION['message'] = "success";
                header("Location:../index.php?page=boeken");
            } else {
                $_SESSION['message'] = "fail";
                header("Location:../index.php?page=boeken");
            }
        } else if($gereserveerd != 'true') {
            if ($aantal != 0) {

            }
                if ($aantal != 0) {

                    $up2->execute();
                    $in1->execute();

                    $_SESSION['message'] = "success";
                header("Location:../index.php?page=boeken");
            } else {
                    $_SESSION['message'] = "fail";
                header("Location:../index.php?page=boeken");
            }
        } else {
            $_SESSION['message'] = "fail";
            header("Location:../index.php?page=boeken");
        }
    } catch (PDOException $e) {
        echo $up1 ."<br>". $up2 ."<br>". $in1 . "<br>" . $e->getMessage();
    }
}



if(isset($_POST['reserveren'])) {

    try {

        if ((!$aantal > 0) AND ($gereserveerd != 'true')) {
            $up3->execute();

            $_SESSION['message'] = "success";
            header("Location:../index.php?page=boeken");

        } else {
            $_SESSION['message'] = "fail";
            header("Location:../index.php?page=boeken");
        }
    } catch (PDOException $e) {
        echo $up3 . "<br>" . $e->getMessage();
    }
}

?>
