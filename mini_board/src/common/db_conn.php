<?php
// phpinfo();
// xcopy C:\HOMEWORK\mini_board\src C:\Apache24\htdocs\mini_board\src /E /F /H /Y
function db_con(&$param_conn)
{
    $host = "localhost";
    $user = "root";
    $pass = "qockdgus12@";
    $charset = "utf8mb4";
    $db_name = "board";
    $dns = "mysql:host=".$host.";dbname=".$db_name.";charset=".$charset;
    $pdo_option =
    array(
        PDO::ATTR_EMULATE_PREPARES          => false
    ,PDO::ATTR_ERRMODE                      => PDO::ERRMODE_EXCEPTION //에러가 일어났을때 에러관련 설정
    ,PDO::ATTR_DEFAULT_FETCH_MODE           =>PDO::FETCH_ASSOC // 패치할때 연상배열로 받아온다
    );

    try
    {
        $param_conn = new PDO( $dns, $user, $pass, $pdo_option );
        return $param_conn;
    }
    catch( Exception $e)
    {
        $param_conn = null;
        throw new Exception( $e->getMessage() );
    }
}
?>

