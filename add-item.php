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
?>
<div class="row">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Add New Item</h3>
        </div>
        <div class="panel-body">

            <form class="form-horizontal" name="form1" id="form1" method="post" action="process_form.php">
                <input type="hidden" name="mode" value="add" >
                <fieldset>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="item_name"><span class="required">*</span>Item:</label>
                        <div class="col-md-6">
                            <input type="text" value="" placeholder="Item" id="item_name" class="form-control" name="item_name"><span id="item_name_err" class="error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-5 col-md-offset-3">
                            <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-save"></i> Submit</button>&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="<?php echo SITE_URL; ?>" class="btn btn-warning" type="submit"><i class="glyphicon glyphicon-arrow-left"></i> Back to list</a> 
                        </div>
                    </div>
                </fieldset>
            </form>

        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {

        // the fade out effect on hover
        $('.error').hover(function() {
            $(this).fadeOut(200);
        });


        $("#form1").submit(function() {
            $('.error').fadeOut(200);
            if (!validateForm()) {
                // go to the top of form first
                $(window).scrollTop($("#form1").offset().top);
                return false;
            }
            return true;
        });

    });

    function validateForm() {
        var errCnt = 0;

        var item_name = $.trim($("#item_name").val());

        // validate item
        if (item_name == "") {
            $("#item_name_err").html("Enter the item name/value.");
            $('#item_name_err').fadeIn("fast");
            errCnt++;
        } else if (item_name.length < 2) {
            $("#item_name_err").html("Enter atleast 2 characters.");
            $('#item_name_err').fadeIn("fast");
            errCnt++;
        }


        if (errCnt > 0)
            return false;
        else
            return true;
    }
</script>
<?php
include 'footer.php';
?>