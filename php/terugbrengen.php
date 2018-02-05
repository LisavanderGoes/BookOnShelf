<?php //checked

require "../../xprivate/config.inc.php";

$boekname = isset($_POST['boekname']) ? $_POST['boekname'] : '';
$boekwriter = isset($_POST['writer']) ? $_POST['writer'] : '';

$userID = $_SESSION['userID'];

$selboeken = 'SELECT boekenID, gereserveerd, aantal, gereserveerd FROM boeken WHERE name= :NAME AND writer= :WRITER';
$resboeken = $db->prepare($selboeken);
$resboeken->bindParam(':NAME', $boekname, PDO::PARAM_STR);
$resboeken->bindParam(':WRITER', $boekwriter, PDO::PARAM_STR);
$resboeken->execute();
$boekdb = $resboeken->fetch();


$boekID = $boekdb['boekenID'];
$gereserveerd = $boekdb['gereserveerd'];
$boeknewaantal = $boekdb['aantal'] + 1;

$delete = "DELETE FROM lenen WHERE userID= :userID AND boekID= :boekID LIMIT 1";
$del = $db->prepare($delete);
$del->bindParam(':userID', $userID, PDO::PARAM_INT);
$del->bindParam(':boekID', $boekID, PDO::PARAM_INT);

$update = "UPDATE boeken SET aantal= :newaantal WHERE boekenID= :boekID";
$up = $db->prepare($update);
$up->bindParam(':newaantal', $boeknewaantal, PDO::PARAM_INT);
$up->bindParam(':boekID', $boekID, PDO::PARAM_INT);


if(isset($_POST['submit']) && (!$boekname == "" || !$boekwriter == "")){

    try {
        $del->execute();
        $count = $del->rowCount();

        $up->execute();

        if ($count != "") {
            $_SESSION['message'] = "success";
            header("Location:../index.php?page=terugbrengen");
        } else {
            $_SESSION['message'] = "fail";
            header("Location:../index.php?page=terugbrengen");
        }


    } catch (PDOException $e) {
        echo $del . "<br>" . $e->getMessage();
    }

}else{
    $_SESSION['message'] = "fail";
    header("Location:../index.php?page=terugbrengen");
}
?>
