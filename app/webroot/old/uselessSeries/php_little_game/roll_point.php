<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>掷骰子</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
<?php
session_start();

// 用户名
$userName = $_GET['userName'];
// 随机的数
$xianzaide = rand(1, 10000);

// 判断是不是第一次投掷
if (empty($_SESSION['lishizuida'])) {
	//是第一次投掷

	// 如果当前只有一个数的时候，当然他自己就是最大了
	$_SESSION['lishizuida'] = $xianzaide;
} else {
	// 不是第一次投掷

	// 谁是最大值
	if ($_SESSION['lishizuida'] < $xianzaide) {
		// 说明了现在的大
		$_SESSION['lishizuida'] = $xianzaide;
	} else {
		// 说明了以前的大
		$_SESSION['lishizuida'] = $_SESSION['lishizuida'];
	}
}
$_SESSION['ranking'][$userName] = $xianzaide;

$max=0;
$maxName="";
foreach ($_SESSION['ranking'] as $name => $point) {
    if ($point>$max){
        $max=$point;
        $maxName=$name;
    }
}

?>
<div style="height:100px;">
    <a href="/">返回主页</a>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card" style="">
                <img class="card-img-top" src="touzi.jpeg" alt="Card image cap" style="width:150px;margin-left:40px;">
                <div class="card-body">
                    <h5 class="card-title">掷骰子游戏</h5>
                    <p class="card-text">游戏说明：<br>输入姓名后，点击“开始roll”.</p>
                    <form>
                        <div class="form-group">
                            <label for="userName">姓名</label>
                            <input type="text" name="userName" id="userName" placeholder="请输入姓名" class="form-control"/><br>
                        </div>

                        <input type="submit" value="开始roll" class="btn btn-primary"/>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card" style="">
                <div class="card-body">
                    <h5 class="card-title">排名榜</h5>
                    <div class="card-text">
                        <table class="table table-borded">

                            <tr><th>姓名</th><th>分数</th></tr>
							<?php
							foreach ($_SESSION['ranking'] as $name=>$rank) {
								echo "<tr></tr>";
								echo "<td>{$name}</td><td>{$rank}</td>";
								echo "<tr></tr>";
							}

							//						echo "<pre>";
							//
							//						print_r($rankingData);
							//						echo "</pre>";
							?>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card" style="">
                <div class="card-body">
                    <h5 class="card-title">历史最高分</h5>
                    <p class="card-text">
						<?php
						echo "当前是：".$userName . "投了" . $xianzaide . "点<br>";
						echo "历史上：".$maxName . "投了" . $max . "点<br>";
						?>
                    </p>
                </div>
            </div>
        </div>


    </div>


</div>


</body>
</html>