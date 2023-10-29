<?php
require_once('./functions.php');
$connection = connect_to_mysql();
$res = $connection->query("SHOW DATABASES;");
while ($row = mysqli_fetch_assoc($res)) {
    echo $row['Database'] . "\n";
}
// dd($res);
$number_of_hours = 4; 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>تمرین درس برنامه نویسی وب</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
        <style>
            .lesson{
                cursor:pointer;
            }
        </style>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>
    <?php
    require('./lessons.php');
    require('./asatid.php');
    require('./relations.php');
    ?>
    <body dir="rtl">
        <h1>برنامه ترم اول سال تحصیلی 1402 - 1401 مهندسی نرم افزار</h1>
        <div class="row col-md-6 col-sm-12" style="margin-right:auto;margin-left:auto;">
            <table class="table table-bordered table-striped">
                <thead>
                    <th># #</th>
                    <th>8-10</th>
                    <th>10-12</th>
                    <th>13:30-15:30</th>
                    <th>15:30-17:30</th>
                </thead>
                <?php
                $week_days = [
                    'شنبه',
                    'یکشنبه',
                    'دوشنبه',
                    'سه شنبه',
                    'چهارشنبه',
                ] 
                ?>
                <tbody>
                <?php for($cnt=0;$cnt<5;$cnt++){ ?>
                    <tr>
                        <td><?php echo($week_days[$cnt]) ?></td>
                        <?php for($tcount = 0; $tcount<$number_of_hours;$tcount++) {
                            $k = $cnt*$number_of_hours+$tcount;
                            $cell =  get_lessons_in_this_time($asatid_lessons, $lessons, $asatid ,$k);
                            ?>
                            <?php if($cell) {?>
                                <td class="lesson"><?php print $cell ?></td>
                                <?php }else{ ?>
                                <td><?php print $cell ?></td>
                                <?php } ?>
                        <?php  } ?>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </body>
    <script>
        $(document).ready(function(){
            $('.lesson').on('click',function(){
                var text = $(this).html();
                // alert(text);
                swal(text);
            })
        })
    </script>
</html>
