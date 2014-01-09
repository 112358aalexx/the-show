<?php 

mysql_connect("$sql_host", "$sql_user", "$sql_pass") or die(mysql_error()); 
mysql_select_db("$sql_db") or die(mysql_error()); 

$pretty_date = strtotime($date_value);
$pretty_date = date('D M d, Y', $pretty_date);
$pretty_month = strtotime($date_value);
$pretty_month  = date('F Y', $pretty_month);
$pretty_year = strtotime($date_value);
$pretty_year  = date('Y', $pretty_year);

Print "<h2>Trunk Usage Report for " . $pretty_date . "</h2>";

///////////// BEGIN DAY TABLE /////////////

Print "<div style='float:left;padding-right:20px;'>";
Print "<h3>Day</h3>";
Print "<table>";
Print "<tr>
         <th scope='col'>Trunk</th>
         <th scope='col'>Minutes</th>
      ";

foreach ($trunks as $trunk) {
  $day_total_trunk = mysql_query("
    SELECT sum(duration)/60
      FROM cdr
      WHERE calldate
      LIKE '$date_value%' AND (lastdata LIKE '%$trunk%' OR channel LIKE '%$trunk%')
  ");

  while($line = mysql_fetch_array( $day_total_trunk))
  {
    Print "<tr><td>" . $trunk . "</td><td>" . $line[0] . "</td></tr>";
  }
}

$year_total = mysql_query("
  SELECT sum(duration)/60
    FROM cdr
    WHERE calldate
    LIKE '$date_value%' AND (lastdata LIKE '%" . implode("%' OR lastdata LIKE '%", $trunks) . "%' OR channel LIKE '%" . implode("%' OR channel LIKE '%", $trunks) . "%')
");

while($line = mysql_fetch_array( $year_total))
{
  Print "<tr><td>Total</td><td>" . $line[0] . "</td></tr>";
}

Print "</table>";
Print "</div>";

///////////// END DAY TABLE /////////////

///////////// BEGIN MONTH TABLE /////////////

Print "<div style='float:left;padding-right:20px;'>";
Print "<h3>Calendar Month</h3>";
Print "<table>";
Print "<tr>
         <th scope='col'>Trunk</th>
         <th scope='col'>Minutes</th>
      ";

foreach ($trunks as $trunk) {
  $month_total_trunk = mysql_query("
    SELECT sum(duration)/60
      FROM cdr
      WHERE calldate
      LIKE '$date_value_month%' AND (lastdata LIKE '%$trunk%' OR channel LIKE '%$trunk%')
  ");

  while($line = mysql_fetch_array( $month_total_trunk))
  {
    Print "<tr><td>" . $trunk . "</td><td>" . $line[0] . "</td></tr>";
  }
}

$month_total = mysql_query("
  SELECT sum(duration)/60
    FROM cdr
    WHERE calldate
    LIKE '$date_value_month%' AND (lastdata LIKE '%" . implode("%' OR lastdata LIKE '%", $trunks) . "%' OR channel LIKE '%" . implode("%' OR channel LIKE '%", $trunks) . "%')
");

while($line = mysql_fetch_array( $month_total))
{
  Print "<tr><td>Total</td><td>" . $line[0] . "</td></tr>";
}

Print "</table>";
Print "</div>";

///////////// END MONTH TABLE /////////////

///////////// BEGIN YEAR TABLE /////////////

Print "<div style='float:left;padding-right:20px;'>";
Print "<h3>Calendar Year</h3>";
Print "<table>";
Print "<tr>
         <th scope='col'>Trunk</th>
         <th scope='col'>Minutes</th>
      ";

foreach ($trunks as $trunk) {
  $year_total_trunk = mysql_query("
    SELECT sum(duration)/60
      FROM cdr
      WHERE calldate
      LIKE '$date_value_year%' AND (lastdata LIKE '%$trunk%' OR channel LIKE '%$trunk%')
  ");

  while($line = mysql_fetch_array( $year_total_trunk))
  {
    Print "<tr><td>" . $trunk . "</td><td>" . $line[0] . "</td></tr>";
  }
}

$year_total = mysql_query("
  SELECT sum(duration)/60
    FROM cdr
    WHERE calldate
    LIKE '$date_value_year%' AND (lastdata LIKE '%" . implode("%' OR lastdata LIKE '%", $trunks) . "%' OR channel LIKE '%" . implode("%' OR channel LIKE '%", $trunks) . "%')
");

while($line = mysql_fetch_array( $year_total))
{
  Print "<tr><td>Total</td><td>" . $line[0] . "</td></tr>";
}

Print "</table>";
Print "</div>";

///////////// END YEAR TABLE /////////////
