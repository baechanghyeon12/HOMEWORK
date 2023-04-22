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
    }
    catch( Exception $e)
    {
        $param_conn = null;
        throw new Exception( $e->getMessage() );
    }
}

function select_board_info()
{
	$sql =
		" SELECT "
		." 	board_no "
		." 	,board_title "
		." 	,board_write_date "
        ."  ,board_contents "
		."  ,comp_flg "
		." FROM "
		." 	board_info "
		." WHERE "
		." 	board_del_flg = '0' "
		;

	$conn = null;
	try
	{
		db_con( $conn );
		$stmt = $conn->prepare( $sql );
		$stmt->execute();
		$result = $stmt->fetchAll();
	}
	catch( Exception $e )
	{
		return $e->getMessage();
	}
	finally
	{
		$conn = null;
	}

	return $result;
}

function select_board_info1(&$arr)
{
	$sql =
		" SELECT "
		." 	board_no "
		." 	,board_title "
		." 	,board_write_date "
        ."  ,board_contents "
		." FROM "
		." 	board_info "
		." WHERE "
		." 	board_no = :board_no "
		;

        $arr_prepare =
                array(
                    ":board_no" => $arr["board_no"]
                );

	$conn = null;
	try
	{
		db_con( $conn );
		$stmt = $conn->prepare( $sql );
		$stmt->execute( $arr_prepare );
		$result = $stmt->fetchAll();
	}
	catch( Exception $e )
	{
		return $e->getMessage();
	}
	finally
	{
		$conn = null;
	}

	return $result[0];
}

function board_info_delete(&$param_no)
{
    $sql =
        " DELETE FROM "
        ." board_info " //---------------테이블 명 정해지면 수정
        ." WHERE "
        ." board_no = :board_no" //--------------------리스트 넘버(넘어오는 값)이 정해지면 수정
        ;
    $arr_prepare =
            array(
                ":board_no" => $param_no["board_no"] //-----------------------리스트 넘버(넘어오는 값)이 정해지면 수정
            );
$conn=null;
db_con($conn);
$conn->beginTransaction();
$stmt = $conn->prepare($sql);
$stmt->execute($arr_prepare);
$conn->commit();
}


function select_goal_info()
{
	$sql =
		" SELECT "
		." * "
		." FROM "
		." 	goal_info "
		;

	$conn = null;
	try
	{
		db_con( $conn );
		$stmt = $conn->prepare( $sql );
		$stmt->execute();
		$result = $stmt->fetchAll();
	}
	catch( Exception $e )
	{
		return $e->getMessage();
	}
	finally
	{
		$conn = null;
	}

	return $result[0];
}
?>

