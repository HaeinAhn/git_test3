<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="/dist/output.css" rel="stylesheet"> -->
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <!-- <script src = "../commenJS/cookie.js"></script>  
  <script src = "./findTeacher.js"></script>        -->
<!-- <script>
    
    // 쿠키 생성 함수
    function setCookie_index(cName, cValue, cDay){
        
        console.log(cName);

        const expire = new Date();
        expire.setDate(expire.getDate() + cDay);
        cookies = cName + '=' + escape(cValue) + '; path=/ '; // 한글 깨짐을 막기위해 escape(cValue)
        if(typeof cDay != 'undefined') cookies += ';expires=' + expire.toGMTString() + ';';
        document.cookie = cookies;
      }

    // 쿠키 삭제하는 함수
      function deleteCookie_index(name) {

        console.log("delete_name : "+name);        

        document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT; path=/';  

        console.log(document.cookie);
      }
  </script> -->
  <body class = "bg-gray-100">   
  <button onclick = "setCookie_index('test', '222222', '1')">쿠키생성</button>
  <button onclick = "deleteCookie_index('test')">쿠키삭제</button>
    <!-- 네비바 -->   
     
    </body><br><br><br><br><br><br>
</html>