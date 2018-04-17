<?php
    function Connection(){
        $host="localhost";
        $user="postgres";
        $port="5432";
        $db="testegprs";
        $pass="1901";
        $conexao = pg_connect("host='$host' dbname='$db',
                             port='$port', user='$user',
                             pass='$pass'");

        if(!$conexao){
            die('Pgsql ERRO: '. pg_erro());
        }else{
            pg_close($conexao);
            print "conexão OK!!!";
        }

    }
?>