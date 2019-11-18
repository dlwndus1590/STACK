<!-- 스레드 목록 게시판 -->

<?php
//세션사용을 하기 위한 필수메서드, 세션사용선언
session_start();
$host ="localhost";
$user ="root";
$pass ="song941012!";
//mysql 연동
$mysqli = new mysqli($host,$user,$pass);
if(!$mysqli){
	die('MySQL connect ERROR:'.mysql_error());
}
//데이터 베이스 진입
$ret = mysqli_select_db($mysqli,'stack');
if(!$ret){
	die('db connect error:'.mysql_error());
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>STACK</title>

    <!--Font Awesome-->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  <!--a태그 클릭시 색깔 바뀌게 하기-->
  <style type="text/css">
  a:link{text-decoration: none; color: #2E64FE;}
  a:visited{
  text-decoration: underline;
  font-style:italic;
  color: #682692;
  }
  </style>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <link rel="stylesheet" href="./css1/normalize.css" />
  <link rel="stylesheet" href="./css1/board.css" />
  <link href="css/search.css" rel="stylesheet">
  <script src="./js1/jquery-2.1.3.min.js"></script>
  <title>????</title>
  <script language="javascript">




  </script>
  </head>

<!-- 삽입해야 할 소스 끝 -->
<body class="fixed-nav sticky-footer bg-dark" id="page-top">

  <!--navbar-dark: navbar에 있는 모든 글씨 색깔 -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top"  id="mainNav">
    <a class="navbar-brand" href="home.php" onclick="home.php"><img src="logo.png"></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">

	<!-- 게시판 -->
			<li class="nav-item dropdown">
 				<a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	 				<i class="fas fa-fw fa-list"></i>
	 				<span>게시판</span>
 				</a>
 			<div class="dropdown-menu" aria-labelledby="pagesDropdown">
	 			<a class="dropdown-item" href="advertice-table.php">홍보 게시판</a>
	 			<a class="dropdown-item" href="notice-table.php">공지사항 게시판</a>
 			</div>
		</li>

	<!--스레드  -->
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-fw fa-list"></i>
						<span>스레드</span>
					</a>
				<div class="dropdown-menu" aria-labelledby="pagesDropdown">
					<a class="dropdown-item" href="thread-table.php">스레드 목록</a>
					<a class="dropdown-item" href="mythread.php">내 스레드</a>
				</div>
			</li>

			<!--등록-->
		        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
		          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
		            <i class="fa fa-fw fa-file"></i>
		            <span class="nav-link-text">register</span>
		          </a>
		          <ul class="sidenav-second-level collapse" id="collapseMulti">

		            <li>
		                  <a href="./member/register.php">회원가입</a>
		                </li>
		                <li>
		                  <a href="forgot-password.php">비밀번호 찾기</a>
		                </li>

		            <li>

		            </li>
		          </ul>
		        </li>
		      </ul>
		      <ul class="navbar-nav sidenav-toggler">
		        <li class="nav-item">
		          <a class="nav-link text-center" id="sidenavToggler">
		            <i class="fa fa-fw fa-angle-left"></i>
		          </a>
		        </li>
		      </ul>
		      <ul class="navbar-nav ml-auto">

		<?php
		if(isset($_SESSION['is_login'])){//세션 값이 있을때 = "로그인 이후 상태"
		?>
		        <li class="nav-item">
		          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
		            <i class="fa fa-fw fa-sign-out"></i>로그아웃</a>
		        </li>
		<?php
		}else{
		?>
			<li class="nav-item">
		            <a class="nav-link" href="login.php">
			     <i class="fa fa-fw fa-sign-in"></i>로그인</a>
		        </li>
		<?php
		}
		?>
		      </ul>
		    </div>
		  </nav>
  <!-- nav end-->
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="home.php" >STACK</a>
        </li>
        <li class="breadcrumb-item active">스레드 게시판</li>
      </ol>

      <!-- 프로필 바-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fas fa-table"></i>
          선택한 스레드 프로필</div>
          <div class="card-body">
            <div style="width:200px; height:150px; border:1px; float:left; margin-right:10px;">
              <img src="images-4.png" alt="스레드 프로필사진" border="3px" width="150px" height="150px" align="left">
            </div>
            <div style="width:500px; height:150px; border:1px; float:left;">
              스레드 이름 // DB로 나중에
              <br>
              소개 // 이것도
              <br><br>
              <button>가입 신청</button>
            </div>
          </div>
        </div>

      <!--calender-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fas fa-table"></i>
          해당 스레드의 calendar// 이미지만 넣은거임</div>
          <div class="card-body">
              <img src="calendar.png" alt="스레드 프로필사진" style="margin-left:auto; margin-right:auto; display:block;"/ >
          </div>
        </div>

      <!-- 스레드 게시판 table-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fas fa-table"></i>
          스레드 게시판</div>
          <div class="card-body">
            <dic class="table-responsive">
              <table class="table table-borded" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>글 번호</th>
                    <th>제목</th>
                    <th>작성자</th>
                    <th>조회수</th>
                    <th>작성일</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>글 번호</th>
                    <th>제목</th>
                    <th>작성자</th>
                    <th>조회수</th>
                    <th>작성일</th>
                  </tr>
                </tfoot>

             </table>
          </div>
        </div>


    <!-- /.container-fluid-->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">로그아웃 하시겠습니까?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">로그아웃 하시려면 버튼을 눌러주세요.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">취소</button>
            <a class="btn btn-primary" href="logout.php">로그아웃</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
  </div>
</body>

</html>
