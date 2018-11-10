<?php
/*
 * @author Shahrukh Khan
 * @website http://www.thesoftwareguy.in
 * @facebook https://www.facebook.com/Thesoftwareguy7
 * @twitter https://twitter.com/thesoftwareguy7
 * @googleplus https://plus.google.com/+thesoftwareguyIn
 */
require_once 'config.php';
include 'header.php';

// SQL Server Extension Sample Code:
	$connectionInfo = array("UID" => "samaroj@app301", "pwd" => "P@ssw0rd1234", "Database" => "app301", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
	$serverName = "tcp:app301.database.windows.net,1433";
	$conn = sqlsrv_connect($serverName, $connectionInfo);

try {
    $stmt = "SELECT itl_id, itl_items, itl_status FROM tbl_items_list WHERE itl_status = 1 ORDER BY itl_id ASC ";
    $query = sqlsrv_query( $conn, $stmt);
    $results = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);
} catch (Exception $ex) {
    echo $ex->getMessage();
}
?>
<div class="row">
    <div id="message_cont"></div>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Shopping List</h3>
        </div>
        <div class="panel-body">

            <div class="col-lg-12" style="padding-left: 0; padding-right: 0;" >
                <div class="pull-right" ><a href="add-item.php" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Add New Item</a></div>               
            </div>

            <div style="margin-bottom: 10px;" class="clearfix"></div>
            <?php if (count($results) > 0) { ?>
                <div style="margin: 5px;display: none;" class="clearfix" id="loader">
                    Loading...
                </div>
                
                    <table class="table table-striped table-hover table-bordered ">
                        <thead>
                            <tr>
                                <th style="text-align: left;width: 80%;">Item</th>
                                <th style="width: 10%;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while($res = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) {
                                ?>
                                <tr>
                                    <td style="text-align: left;vertical-align: middle;"><?php echo trim($res["itl_items"]); ?></td>
                                    <td style="vertical-align: middle;text-align: center;">
                                        <a style="color: #f00;" href="process_form.php?mode=delete&id=<?php echo intval($res["itl_id"]); ?>" onclick="return confirm('Are you sure you want to delete [<?php echo addslashes(trim($res["itl_items"])); ?>] ?')"><span class="glyphicon glyphicon-remove-circle" style="font-size:18px;"></span> </a> </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                
            <?php } else { ?>
                <div class="well well-lg">No items in the list.</div>
            <?php } ?>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>