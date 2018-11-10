</div>

<footer>
    <div class="navbar navbar-inverse footer">
        <div class="container-fluid">
            <div class="copyright">
                &copy; <?php echo date("Y"); ?> | All rights reserved
            </div>
        </div>
    </div>
</footer>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="bootstrap/js/bootstrap.min.js"></script>

<script>
    function markStatus(id, val) {

        $.ajax({
            type: "GET",
            url: "ajax_update_status.php",
            data: "id="+id+"&val=" + val,
            cache: false,
            beforeSend: function() {
                $("#loader").show();
            },
            success: function(html) {
                $("#loader").hide();
                var obj = $.parseJSON(html);
                var errClass = (obj.code == 1) ?  "success" : "danger";
                var str = '<div class="alert alert-dismissable alert-'+errClass+'"><button data-dismiss="alert" class="close" type="button">x</button><p>'+obj.msg+'</p></div>';
                $('#message_cont').html(str).show();
            }
        });
    }

    $(document).ready(function() {

        $(".chk").click(function() {
            var val = ($(this).prop("checked") == true) ? 1 : 0;
            var id = $(this).val();
            markStatus(id, val);
        });

    });

</script>

</body>
</html>