<?php
                // ---------------------------------
                // 함수명	: db_conn
                // 기능		: DB Connection
                // 파라미터	: Obj	&$param_conn
                // 리턴값	: 없음  $param_conn
                // ---------------------------------
    function db_con(&$param_conn)
    {
        $host = "localhost"; // 호스트 이름
        $user = "root"; // 데이터 베이스 사용자 이름??아이디??
        $pass = "qockdgus12@";// 데이터 베이스 비밀번호
        $charset = "utf8mb4"; // 문자 집합의 종류
        $db_name = "board"; //데이터 베이스 이름
        $dns = "mysql:host=".$host.";dbname=".$db_name.";charset=".$charset; // 호스트, 데이터 베이스 이름, 문자 집합의 종류
        $pdo_option =
        array(
            PDO::ATTR_EMULATE_PREPARES          => false                            
            ,PDO::ATTR_ERRMODE                      => PDO::ERRMODE_EXCEPTION       
            ,PDO::ATTR_DEFAULT_FETCH_MODE           =>PDO::FETCH_ASSOC              
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
                // ---------------------------------
                // 함수명	: list_delete
                // 기능		: DB delete
                // 파라미터	: Array       $list_no
                // 리턴값	: 없음
                // ---------------------------------
    function list_delete(&$param_no)
    {
        $sql =
            " DELETE FROM "
            ." 테이블 명 " //---------------테이블 명 정해지면 수정
            ." WHERE "
            ." 리스트 번호의 컬럼 = :리스트 번호" //--------------------리스트 넘버(넘어오는 값)이 정해지면 수정
            ;
        $arr_prepare =
                array(
                    ":리스트 번호" => $param_no["리스트 번호"] //-----------------------리스트 넘버(넘어오는 값)이 정해지면 수정
                );
    $conn=null;
    db_con($conn);
    $conn->beginTransaction();
    $stmt = $conn->prepare($sql);
    $stmt->execute($arr_prepare);
    $conn->commit();
    }
?>