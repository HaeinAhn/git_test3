<?php   
//   error_reporting( E_ALL );
//   ini_set( "display_errors", 1 );

// == 일반 메인 프로세스==
//   #요구되는 파라미터 (fetch형태도 요청 ) 
//1. 토큰값 이메일 - token 


# 보낼 줄 때 형태 
// {
//  "token" : "토큰값 "
// }


// #반환되는 데미터 
// ==성공시 
// 1. 프로필이미지 - p_img ("~~~~") 
// 2. 이름 -  name   ("qwe")
// 3. 강사여부  - teacher ("yes")
# 반환형태 
// {"p_img":"~~~",
//  "name":"qwe",
//  "teacher":"yes"}

# 값이 없을때는 null 표시 
// ==실패시  (로그인 후에 들어오기 떄문에 모든 값이 없는건 불가능함)
// 1. 프로필이미지 - p_img ("null") 
// 2. 이름 -  name   ("qwe")  이름만 뜸 - 로그인 한 후기 때문에  
// 3. 강사여부  - teacher ("null")
# 반환형태 
// {"p_img":"null","name":"qwe","teacher":"null"}

include("../conn.php");
include("../jwt.php");


$jwt = new JWT();

// 토큰값 전달 받음 
file_get_contents("php://input")."<br/>";
$token = json_decode(file_get_contents("php://input"))->{'token'};

//토큰 해체 
$data = $jwt->dehashing($token);

$parted = explode('.', base64_decode($token));

$payload = json_decode($parted[1], true);


$User_ID =  base64_decode($payload['User_ID']);

$U_Name  = base64_decode($payload['U_Name']);

$U_Email = base64_decode($payload['U_Email']);


// DB 정보 가져오기 
$sql = "SELECT User.User_ID, U_Name, U_D_Img, U_D_T_add FROM HANGLE.User left join User_Detail on User.User_ID = User_Detail.User_Id where User.User_ID = '{$User_ID}'";
$result = mysqli_query($conn, $sql);



$row = mysqli_fetch_array($result);


// 값 변수 설정 
 $userid = $row['User_ID'];
 $name = $row['U_Name'];
 $p_img = $row['U_D_Img'];
 $teacher = $row['U_D_T_add'];


 $send["p_img"] = $p_img ;
 $send["name"] = $name;
 $send["teacher"] =  $teacher;

 echo json_encode($send);
 mysqli_close($conn);




?>