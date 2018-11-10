<?php
/*
 * @author Shahrukh Khan
 * @website http://www.thesoftwareguy.in
 * @facebook https://www.facebook.com/Thesoftwareguy7
 * @twitter https://twitter.com/thesoftwareguy7
 * @googleplus https://plus.google.com/+thesoftwareguyIn
 */
require_once 'config.php';
$id = intval($_GET["id"]);
$val = intval($_GET["val"]);
$arr = array();

if ($id == 0) {
    // value of item is not passed
    $arr = array("code" => -1, "msg" => "Item is not properly defined");
} else {

    try {
        $sql = "UPDATE tbl_items_list SET itl_status = :s WHERE itl_id = :id";
        $stmt = $DB->prepare($sql);
        $stmt->bindValue(":s", $val);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $retval = $stmt->rowCount();

        if ($retval > 0) {
            $arr = array("code" => 1, "msg" => "Item has been updated successfully.");
        } else if ($retval == 0) {
            $arr = array("code" => 0, "msg" => "No changes has been done.");
        } else {
            $arr = array("code" => 2, "msg" => "Failed to update the item");
        }
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}
echo json_encode($arr);
exit;