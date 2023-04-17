<?php
define("DB_CON",$_SERVER["DOCUMENT_ROOT"]."폴더 명");                           /* 정확한 파일의 루트가 정해지면 수정 */
define("URL",DB_CON."파일 경로");
include_once(URL);

$rqt_mtd = $_SERVER["REQUEST_METHOD"];              /* 넘어오는 방식을 변수에 저장한다.(GET,POST) */
if($rqt_mtd === "GET")                              /* 만약에 GET이면 실행한다. */
{
    $list_no = $_GET["list_no"];
    list_delete($list_no);
}
else                                                /* 만약에 POST일경우 실행한다. */
{
    $list_no = $_POST["list_no"];
    list_delete($list_no);
}

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="연결할 CSS파일 경로">                          <!-- CSS파일이 정해지면 경로 수정 -->
    <title>삭제 페이지</title>
</head>
<body>
                                                                                <!-- 헤더 영역이 정해지면 include_once로 설정  -->
    <p>리스트 제목</p>                                                          <!-- PK로 넘어오는 값을 받아서 해당 PK의 제목을 화면에 표시 -->
    <textarea cols="30" rows="10">                                              
                                                                                <!-- PK로 넘어오는 값을 받아서 해당 PK의 내용을 화면에 표시 -->
    </textarea>
    <button type="button">
    <p>정보를 완전히 삭제합니다.<br>동의 하시면 확인을 눌러 주세요.</p>                         <!-- 주의 메세지 -->
        <a href=" 리스트 페이지 URL " >
            확인                                                                <!-- 클릭시 삭제를 완료하고 리스트 페이지로 이동(삭제 페이지를 하나 더 만들어야 된다.) -->
        </a>                                                                    <!-- 그 페이지로 넘어가서 삭제를 하고 리스트 페이지로 바로 넘어갈 수 있게 만들어야 된다. -->
    </button>
    <button type="button">
    <a href=" 상세 페이지 URL(받은 리스트 넘버를 다시 반환) " >                                                                 
            취소                                                                <!-- 클릭시 상세 페이지로 이동(상세 페이지의 URL을 작성) -->
        </a>
    </button>
</body>
</html>