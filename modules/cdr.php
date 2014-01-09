<?php 

mysql_connect("$sql_host", "$sql_user", "$sql_pass") or die(mysql_error()); 
mysql_select_db("$sql_db") or die(mysql_error()); 

$data = mysql_query("
SELECT t.calldate,t.clid,t.dst,t.duration,t.channel,t.lastdata
FROM (
    SELECT * 
    FROM cdr 
    WHERE calldate LIKE '$date_value%' AND lastdata NOT LIKE '%auto-confir%' AND lastdata!='demo-instruct' AND dst!='pbdirectory' AND channel LIKE 'SIP%' AND dst NOT LIKE '*%'
    ORDER BY duration DESC
    ) t
GROUP BY t.calldate
");

$pretty_date = strtotime($date_value);
$pretty_date = date('D M d, Y', $pretty_date);

if (isset($_POST['go_date']))
{
    Print "<script type='text/javascript'>";
    Print "self.location='?date=" . $_POST['go_date'] . "';";
    Print "</script>";
}

Print "<h2>Daily Report for " . $pretty_date . "</h2>";
Print "<table>";
Print "<tr>
         <th scope='col'>Date/Time</th>
         <th scope='col'>Caller</th>
         <th scope='col'>Service Provider</th>
         <th scope='col'>Final Destination</th>
         <th scope='col'>Duration</th>
       </tr>";


while($info = mysql_fetch_array( $data ))
{ 
    $clid = $info['clid'];
    $dst = $info['dst'];
    $channel = $info['channel'];
    $lastdata = $info['lastdata'];
    $duration = $info['duration'];

    require 'conf/regex.php';

    Print "<tr>";
    Print "<td>" . $info['calldate'] . "</td>"; 
    Print "<td>" . $clid . "</td>"; 

    if (in_array($channel, $trunks))
    {
        Print "<td>" . $channel . "</td>"; 
    }
    elseif (in_array($lastdata, $trunks))
    {
        Print "<td>" . $lastdata . "</td>"; 
    }
    else { Print "<td>--</td>"; }

    Print "<td>" . $dst . "</td>"; 

    if ($duration > 3600)
    {
        $duration = $duration / 60 / 60;
        $duration = number_format($duration, 2);
        Print "<td>" . $duration . " hours</td>";
    }
    elseif ($duration > 60)
    {
        $duration = $duration / 60;
        $duration = number_format($duration, 2);
        Print "<td>" . $duration . " minutes</td>";
    }
    else { Print "<td>" . $info['duration'] . " seconds</td>"; }

    Print "</tr>";
}

Print "</table>";

?> 
