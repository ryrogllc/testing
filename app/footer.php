<?php
/*
 *  This file is a cluster fuck. Ugh, going to try to unwrap it. GP
 *  - so, i have unwrapped a lot of this, but it isn't that pretty....
 */

$flag_set = false;

?>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ftrmain">
                    <ul>

                        <li><a href="/dashboard.php"
                               class="modalblock <?php if ($currentFileName == 'dashboard') {echo 'active'; $flag_set = true;}?>"><img
                                        src="images/dashboard-gray.png" class="ftrmainNormal"/><img
                                        src="images/dashboard-blue.png"
                                        class="ftrmainActive"/><span>Dashboard</span></a></li>

                        <li><a href="/history.php"
                               class="modalblock <?php if ($currentFileName == 'history') {echo 'active';$flag_set = true;} ?>"><img
                                        src="images/history-gray.png" class="ftrmainNormal"/><img
                                        src="images/history-blue.png" class="ftrmainActive"/><span>History</span></a>
                        </li>

                        <li><a href="/daydetails.php"
                               class="modalblock <?php if ($currentFileName == 'daydetails') {echo 'active'; $flag_set = true;}?>"><img
                                        src="images/daydetail-gray.png" class="ftrmainNormal"/><img
                                        src="images/daydetail-blue.png"
                                        class="ftrmainActive"/><span>Day Detail</span></a></li>

                        <li><a href="/myhome.php"
                               class="modalblock <?php if (($currentFileName == 'myhome') or ($currentFileName == 'myhomeedit')) { echo 'active'; $flag_set = true;}?>"><img
                                        src="images/myhome-gray.png" class="ftrmainNormal"/><img
                                        src="images/myhome-blue.png" class="ftrmainActive"/><span>My Home</span></a>
                        </li>

                        <li><a href="/more.php"
                               class="modalblock <?php  if (!$flag_set) echo 'active' ?>"><img
                                        src="images/more-gray.png" class="ftrmainNormal"/><img
                                        src="images/more-blue.png" class="ftrmainActive"/><span>More</span></a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>

<script>
    function add_remove(item,qty,default_value,min_value, max_value){
        var the_item = $('input[name=' + item + ']');
        var currentVal = parseInt(the_item.val());
        //temporary work-around
        $('input[name=' + item + ']').val(currentVal + qty);
        return;

        if (currentVal > min_value && currentVal < max_value) {
            // If is not undefined
            if (!isNaN(currentVal)) {
                // Increment
                $('input[name=' + item + ']').val(currentVal + qty);
            } else {
                // Otherwise put the default there
                $('input[name=' + item + ']').val(default_value);
            }
        } else {
            return true;
        }
    }


    jQuery(document).ready(function () {
        $('.modalblock').click(function () {
           $.blockUI({message:null});
        });

        // This button will increment the value
        $('.qtyplus1').click(function (e) {
            e.preventDefault(); // Stop acting like a button
            var fieldName = $(this).attr('field');  // Get the field name
            add_remove(fieldName,1,1,1,20);
        });

        // This button will decrement the value till 0
        $(".qtyminus1").click(function (e) {
            e.preventDefault();   // Stop acting like a button
            var fieldName = $(this).attr('field');
            add_remove(fieldName,-1,1,1,20);
        });


        $('.qtyplus0').click(function (e) {
            e.preventDefault();   // Stop acting like a button
            var fieldName = $(this).attr('field');
            add_remove(fieldName,1,1,0,10);
        });
        // This button will decrement the value till 0
        $(".qtyminus0").click(function (e) {
            e.preventDefault();   // Stop acting like a button
            var fieldName = $(this).attr('field');
            add_remove(fieldName,-1,1,0,10);
        });


        $('.qtyplus10').click(function (e) {
            e.preventDefault();   // Stop acting like a button
            var fieldName = $(this).attr('field');
            add_remove(fieldName,10,2000,1800,2010);
        });

        // This button will decrement the value till 0
        $(".qtyminus10").click(function (e) {
            e.preventDefault();   // Stop acting like a button
            var fieldName = $(this).attr('field');
            add_remove(fieldName,-10,2000,1800,2010);
        });




    });

</script>
<?php if ($currentFileName == 'waterutility') { ?>

<?php } ?>
<!-- go -->
</body>
</html>
