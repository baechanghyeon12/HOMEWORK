<?php
define("DB_CONN", $_SERVER['DOCUMENT_ROOT']."/mini_board/src/");
define("COMM_URL",DB_CONN."common/db_conn.php");
include_once(COMM_URL);

$rqt_mtd = $_SERVER["REQUEST_METHOD"];
$arr_get = $_GET;
$result_get = select_board_info1($arr_get)
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>상세 페이지</title>
</head>
<body>
    <tr>
        <td>게시글 번호 : <?php echo $result_get["board_no"] ?></td>
        <td>게시글 제목 : <?php echo $result_get["board_title"] ?></td>
        <td>게시글 내용 : <?php echo $result_get["board_contents"] ?></td>
    </tr>
    <button type="button"><a href="board_delete.php?board_no=<?php echo $arr_get["board_no"] ?>">삭제</a></button>
</body>
</html>