<?php
define("DB_CONN", $_SERVER['DOCUMENT_ROOT']."/mini_board/src/");
define("COMM_URL",DB_CONN."common/db_conn.php");
include_once(COMM_URL);
$result = select_board_info();
$result_goal = select_goal_info();
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/board_list.css">
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>게시글 번호</th>
                <th>게시글 제목</th>
                <th>게시글 내용</th>
                <th>완료 상태</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $val)
            {
            ?>
            <tr class="loot_tr">
                <td><?php echo $val["board_no"] ?></td>
                <td><a href="board_detail.php?board_no=<?php echo $val["board_no"] ?>"><?php echo $val["board_title"] ?></a></td>
                <td><?php echo $val["board_write_date"] ?></td>
                <td>
                    <?php
                    $comp = $val["comp_flg"];
                    if ($comp === '0')
                    {
                    ?>
                    <img src="./check.jpg" alt="체크박스" >
                    <?php
                    }
                    ?>
                </td>
            </tr>
            <tr></tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>
</html>