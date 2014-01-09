<?php 

$page = $_GET['page'];

$date_value = $_GET['date'];
if (!$date_value) {
    $date_value = date('Y-m-d', time());
}

if (isset($page))
{
$date_value_month = $_GET['date'];
if (!$date_value_month) {
    $date_value_month = date('Y-m', time());
}
$date_value_month = date('Y-m', strtotime("$date_value_month"));

$date_value_year = $_GET['date'];
if (!$date_value_year) {
    $date_value_year= date('Y', time());
}
$date_value_year = date('Y', strtotime("$date_value_year"));

$pretty_date = strtotime($date_value);
$pretty_date = date('D M d, Y', $pretty_date);
$pretty_month = strtotime($date_value);
$pretty_month  = date('F Y', $pretty_month);
$pretty_year = strtotime($date_value);
$pretty_year  = date('Y', $pretty_year);

Print "<div style='position:fixed;top:0;background-color:white;width:100%;z-index:2'>";

$prev_date = date('Y-m-d', strtotime($date_value .' -1 day'));
$prev_month = date('Y-m-d', strtotime($date_value .' -1 month'));
$prev_year = date('Y-m-d', strtotime($date_value .' -1 year'));
$next_date = date('Y-m-d', strtotime($date_value .' +1 day'));
$next_month = date('Y-m-d', strtotime($date_value .' +1 month'));
$next_year = date('Y-m-d', strtotime($date_value .' +1 year'));
$today = date('Y-m-d', time());

include('main_menu.php');
Print "<div class='nav_links'>";
Print "<a href='?date=" . $prev_date . "&page=" . $page . "'><<</a> Day <a href='?date=" . $next_date . "&page=" . $page . "'>>></a> ";
Print "<a href='?date=" . $prev_month . "&page=" . $page . "'><<</a> Month <a href='?date=" . $next_month . "&page=" . $page . "'>>></a> ";
Print "<a href='?date=" . $prev_year . "&page=" . $page . "'><<</a> Year <a href='?date=" . $next_year . "&page=" . $page . "'>>></a> | ";
Print "<a href='?date=" . $today . "&page=" . $page . "'>Today</a> <br /><br />";

if (isset($_POST['go_date']))
{
    Print "<script type='text/javascript'>";
    Print "self.location='?date=" . $_POST['go_date'] . "&page=" . $page . "';";
    Print "</script>";
}

?>

<form name="go_form" method="post">
    <input type="text" value="YYYY-MM-DD" name="go_date" />
    <input type="submit" value="Go" />
</form>

</div>
</div>

<?php
}
include('main_menu.php');
{
}
?>
