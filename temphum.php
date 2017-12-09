#기본 코드

<!doctype html>
<html lang="ko">
  <head>
    <title>Temperature & humidity</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./bootstrap-4-beta-2/css/bootstrap.min.css">
  </head>
  <body>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="./bootstrap-4-beta-2/js/jquery-3.2.1.min.js"></script>
    <script src="./bootstrap-4-beta-2/js/popper.js"></script>
    <script src="./bootstrap-4-beta-2/js/bootstrap.min.js"></script>
  </body>
</html>

#DB정보 불러오기

<?php 
  $db_host = "localhost";
  $db_user = "ejdnl51";
  $db_passwd = "zxc15963";
  $db_name = "ejdnl51";
  $conn = mysqli_connect($db_host,$db_user,$db_passwd,$db_name);
 
 //에러로그 활성화
  error_reporting(E_ALL);

  ini_set("display_errors", 1);
?>
<!doctype html>








#body 태그 안 가장 상단에 넣기

<?php 
    //데이터베이스 data_temphum테이블의 모든 컬럼을 id값을 기준으로 가장 큰 10개의 값을 보여달라고 요청.
        $result = mysqli_query($conn, "SELECT * FROM data_temphum ORDER BY id DESC LIMIT 10");
    //result변수에 받은 데이터값을 mysqli_fetch_array함수로 각 배열에 넣어줌
        while($row = mysqli_fetch_array($result)){
            $temp[] = $row['temp'];
            $date[] = $row['datetime'];
        }
    ?>


#온도 습도 출력

<div class="container">
        <h1>My home</h1>
        <?php
          //데이터베이스 data_temphum테이블의 모든 컬럼을 id값을 기준으로 가장 큰 1개의 값을 보여달라고 요청.
          $sql = "SELECT * FROM data_temphum ORDER BY id DESC LIMIT 1";
          $result = mysqli_query($conn, $sql);
          //row변수에 mysqli_fetch_object함수로 오브젝트화 시킴
          $row = mysqli_fetch_object($result);
          //row안에 있는 오브젝트에서 각각 오브젝트명에 있는 값을 부름
          echo "<h2>온도: $row->temp ℃ / 습도: $row->hum %</h2>";
          echo "<p>기록시간: $row->datetime</p>";
        ?>
</div>

#테이블 형태로 출력

<div class="table mt-3">
          <?php
            echo "<table class='table table-hover table-bordered'>
                <thead>
                  <tr>
                    <th>시간</th>
                    <th>온도</th>
                    <th>습도</th>
                  </tr>
                </thead>";
              echo "<tbody>";
              //데이터베이스 data_temphum테이블의 모든 컬럼을 id값을 기준으로 가장 큰 48개의 값을 보여달라고 요청.
              $sql = "SELECT * FROM data_temphum ORDER BY id DESC LIMIT 48";
              $result = mysqli_query($conn, $sql);
              //result변수에 받은 데이터값을 mysqli_fetch_array함수로 각 배열에 넣어줌
              while($row = mysqli_fetch_array($result)){
                echo "<tr>";
                //각 테이블 값에 row변수에 있는 값을 넣어줌
                echo "<td>".$row['datetime']."</td>";
                echo "<td>".$row['temp']." ℃"."</td>";
                echo "<td>".$row['hum']." %"."</td>";
                echo "</tr>";
              }
              echo "</tbody>";
            echo "</table>";
            mysqli_close($conn);
          ?>
          </div>

#collapse 추가 코드(이거로 변경하세요.)

<a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">기록보기</a>

        <div class="collapse" id="collapseExample">
          <div class="table mt-3">
          <?php
            echo "<table class='table table-hover table-bordered'>
                <thead>
                  <tr>
                    <th>시간</th>
                    <th>온도</th>
                    <th>습도</th>
                  </tr>
                </thead>";
              echo "<tbody>";
              //데이터베이스 data_temphum테이블의 모든 컬럼을 id값을 기준으로 가장 큰 48개의 값을 보여달라고 요청.
              $sql = "SELECT * FROM data_temphum ORDER BY id DESC LIMIT 48";
              $result = mysqli_query($conn, $sql);
              //result변수에 받은 데이터값을 mysqli_fetch_array함수로 각 배열에 넣어줌
              while($row = mysqli_fetch_array($result)){
                echo "<tr>";
                //각 테이블 값에 row변수에 있는 값을 넣어줌
                echo "<td>".$row['datetime']."</td>";
                echo "<td>".$row['temp']." ℃"."</td>";
                echo "<td>".$row['hum']." %"."</td>";
                echo "</tr>";
              }
              echo "</tbody>";
            echo "</table>";
            mysqli_close($conn);
          ?>
          </div>
        </div>

