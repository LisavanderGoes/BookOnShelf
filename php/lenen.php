<?php session_start();
if(isset($_POST['submit'])){

//Database
    include_once "../db/connect.php";

//Query database
    $result = $db->query('SELECT * FROM boeken WHERE id='.$_GET['id']);
    $product = $result->fetch();
    $lresult = $db->query('SELECT * FROM lenen WHERE id='.$_GET['id']);
    $leen = $lresult->fetch();


    $id = $_GET['id'];
    $newaantal = $product['aantal'] - 1;
    $lnewaantal = $leen['aantal'] + 1;
    $name = $product['name'];
    $writer = $product['writer'];
    $leen_date = date("Y-m-d");
    $aantal = $leen['aantal'] + 1;

    echo $id;


if($product['aantal'] != 0) {
    $db->exec('UPDATE boeken SET aantal=' . $newaantal . ' WHERE id=' .$id);
    if(! $leen) {
        $db->exec("INSERT INTO lenen (id, name, writer, aantal)
                  VALUES ('$id', '$name', '$writer', '1')");
        echo 'bestaat niet';
    } else {
        echo 'Bestaat';
        $db->exec('UPDATE lenen SET aantal=' . $lnewaantal . ' WHERE id=' .$id);

    }
    echo 'Je kunt het boek nu meenemen!';
} else {
    echo 'Kan niet geleend worden!';
}

}

?>
