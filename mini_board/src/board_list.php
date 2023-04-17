<?php
define("DB_CONN", $_SERVER['DOCUMENT_ROOT']."/mini_board/src/");
define("COMM_URL",DB_CONN."common/db_conn.php");
include_once(COMM_URL);
$result = select_board_info();
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>게시글 번호</th>
                <th>게시글 제목</th>
                <th>게시글 내용</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $val)
            {
            ?>
            <tr>
                <td><?php echo $val["board_no"] ?></td>
                <td><a href="board_detail.php?board_no=<?php echo $val["board_no"] ?>"><?php echo $val["board_title"] ?></a></td>
                <td><?php echo $val["board_write_date"] ?></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>
</html>