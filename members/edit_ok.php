<?php
/* 세션 시작 */
session_start();
$s_idx = $_SESSION["s_idx"];
// echo $s_idx;
// exit;


/* 이전 페이지에서 값 가져오기 */
$pwd = $_POST["pwd"];
$birth = $_POST["birth"];
$postalCode = $_POST["postalCode"];
$add1 = $_POST["add1"];
$add2 = $_POST["add2"];
$email = $_POST["email_id"]."@".$_POST["email_dns"];
$mobile = $_POST["mobile"];

// 값 확인
echo "비밀번호 : ".$pwd."<br>";
echo "생년월일 : ".$birth."<br>";
echo "우편번호 : ".$postalCode."<br>";
echo "기본주소 : ".$add1."<br>";
echo "상세주소 : ".$add2."<br>";
echo "이메일 : ".$email."<br>";
echo "전화번호 : ".$mobile."<br>";
// exit;


/*  DB 접속 */
include "../inc/dbcon.php";


/* 쿼리 작성 */
// update 테이블명 set 필드명=값, 필드명=값, ....;
if(!$pwd){
    $sql = "update members set birth='$birth', postalCode='$postalCode', add1='$add1', add2='$add2', email='$email', mobile='$mobile' where idx=$s_idx;";
} else{
    $sql = "update members set pwd='$pwd', birth='$birth', postalCode='$postalCode', add1='$add1', add2='$add2', email='$email', mobile='$mobile' where idx=$s_idx;";
};
echo $sql;
// exit;


/* 데이터베이스에 쿼리 전송 */
mysqli_query($dbcon, $sql);


/* DB(연결) 종료 */
mysqli_close($dbcon);


/* 리디렉션 */
echo "
    <script type=\"text/javascript\">
        alert(\"정보가 수정되었습니다.\");
        location.href = \"edit.php\";
    </script>
";
?>