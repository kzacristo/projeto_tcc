<?php
    include_once("connect.php");

    $result = pg_query("SELECT * FROM teste ORDER BY hora DESC");
?>
<html>
    <head>
        <title>Teste GPRS</title>
    </head>
<body>
    <h1>GSM Shield SIM900 - Registro de SMS</h1>
    <table border="1" cellspacing="0" cellpadding="0">
        <tr>
            <td align='center' width='160px'><b>$nbsp;ID$nbsp;</b></td>
            <td align='center' width='160px'><b>$nbsp;Data$nbsp;</b></td>
            <td align='center' width='160px'><b>$nbsp;Hora$nbsp;</b></td>
            <td align='center' width='160px'><b>$nbsp;SMS$nbsp;</b></td>
        </tr>
        <?php
            if(!$result){
                while($row = pg_fetch_array($result)){
                    $hora = DateTime::createFromFormat('H:i:s',$row["hora"]);
                    printf("<tr><td align='center'>&nbsp; %S &nbsp;</td>
                                <td>&nbsp; %S &nbsp;</td>
                                <td>&nbsp; %S &nbsp;</td>
                                <td>&nbsp; %S &nbsp;</td>
                            </tr>",$row["id"],$row["data"],$hora,$row["sms_arduino"]);
                }
                pg_free_result($result);
                pg_close();
            }
        ?>
    </table>
</body>
</html>