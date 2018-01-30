<?php

require "config.php";

$boekname = isset($_POST['boekname']) ? $_POST['boekname'] : '';
$boekwriter = isset($_POST['writer']) ? $_POST['writer'] : '';

if(isset($_POST['submit']) && (!$boekname == "" || !$boekwriter == "")){

    $userID = $_SESSION['userID'];

    $product = $db->prepare('SELECT * FROM boeken WHERE name=? AND writer=?');
    $product->execute(array($boekname, $boekwriter));
    $boekdb = $product->fetch();

    $boekID = $boekdb['boekenID'];
    $boeknewaantal = $boekdb['aantal'] + 1;


        $delete = "DELETE FROM lenen WHERE userID= :userID AND boekID= :boekID LIMIT 1";
        $del = $db->prepare($delete);
        $del->bindParam(':userID', $userID, PDO::PARAM_INT);
        $del->bindParam(':boekID', $boekID, PDO::PARAM_INT);

        $update = "UPDATE boeken SET aantal= :newaantal WHERE boekenID= :boekID";
        $up = $db->prepare($update);
        $up->bindParam(':newaantal', $boeknewaantal, PDO::PARAM_INT);
        $up->bindParam(':boekID', $boekID, PDO::PARAM_INT);


        try {
            $del->execute();
            $count = $del->rowCount();


            $up->execute();

            if ($count != "") {
                header("Location:../index.php?page=terugbrengen&message=success");
            } else {
                header("Location:../index.php?page=terugbrengen&message=fail");
            }


        } catch (PDOException $e) {
            header("Location:../index.php?page=terugbrengen&message=fail");
            echo $del . "<br>" . $e->getMessage();
        }

}else{
    header("Location:../index.php?page=terugbrengen&message=fail");
}
?>
