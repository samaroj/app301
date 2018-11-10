<?php
/*
 * @author Shahrukh Khan
 * @website http://www.thesoftwareguy.in
 * @facebook https://www.facebook.com/Thesoftwareguy7
 * @twitter https://twitter.com/thesoftwareguy7
 * @googleplus https://plus.google.com/+thesoftwareguyIn
 */
require 'config.php';
if ($_POST["mode"] == "add") {
    $item_name = trim($_POST['item_name']);
    $error = FALSE;

    if ($item_name == "") {
        $_SESSION["errorType"] = "danger";
        $_SESSION["errorMsg"] = "Please provide item name.";
    } else if (strlen($item_name) < 2) {
        $_SESSION["errorType"] = "danger";
        $_SESSION["errorMsg"] = "Item name must have atleast 2 characters.";
    } else {
        try {

	// SQL Server Extension Sample Code:
	$connectionInfo = array("UID" => "samaroj@app301", "pwd" => "P@ssw0rd1234", "Database" => "app301", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
	$serverName = "tcp:app301.database.windows.net,1433";
	$conn = sqlsrv_connect($serverName, $connectionInfo);

            $sql = "INSERT INTO tbl_items_list (itl_items, itl_status) VALUES (?, ?)";
		$params = array($item_name, 1);
            $stmt = sqlsrv_query( $conn, $sql, $params);

            if ($stmt === false) {
		$_SESSION["errorType"] = "danger";
                $_SESSION["errorMsg"] = "Failed to add item.";
                
            } else {
                $_SESSION["errorType"] = "success";
                $_SESSION["errorMsg"] = "Item added successfully.";
            }
        } catch (Exception $ex) {
            $_SESSION["errorType"] = "danger";
            $_SESSION["errorMsg"] = $ex->getMessage();
        }
    }

    header("location:add-item.php");
    exit;
} else if ($_GET["mode"] == "delete") {
    $id = intval($_GET['id']);

    if ($id == 0) {
        $_SESSION["errorType"] = "danger";
        $_SESSION["errorMsg"] = "Item is not recognized.";
    } else {

        try {
            $sql = "DELETE FROM tbl_items_list WHERE itl_id = :id";
            $stmt = $DB->prepare($sql);
            $stmt->bindValue(":id", $id);
            $stmt->execute();
            $retval = $stmt->rowCount();

            if ($retval >= 0) {
                $_SESSION["errorType"] = "success";
                $_SESSION["errorMsg"] = "Item has been deleted successfully.";
            } else {
                $_SESSION["errorType"] = "danger";
                $_SESSION["errorMsg"] = "Failed to delete the item";
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    @header("location:" . SITE_URL);
    exit;
} else if ($_GET["mode"] == "clear") {

    try {
        $sql = "DELETE FROM tbl_items_list WHERE 1";
        $stmt = $DB->prepare($sql);
        $stmt->execute();
        $retval = $stmt->rowCount();

        if ($retval >= 0) {
            $_SESSION["errorType"] = "success";
            $_SESSION["errorMsg"] = "List has been cleared successfully.";
        } else {
            $_SESSION["errorType"] = "danger";
            $_SESSION["errorMsg"] = "Failed to clear the list";
        }
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }

    @header("location:" . SITE_URL);
    exit;
}