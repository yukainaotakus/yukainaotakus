<?php
$display['title'] = "主页";
?>

<?php include 'View/common_header.php';// 引用共通部品：头部?>

<div class="container-fluid" style="min-height:600px;">
    <div class="row">
        <div class="col-sm-12">
            <ul>
                <li><a href="homework/gototo">gototo</a></li>
                <li><a href="homework/gokoyoku">gokoyoku</a><span style="font-size:2em;color:red;">囍</span><a href="homework/ritenu">ritenu</a></li>
                <li><a href="homework/ka">课内代码</a></li>
                <li><a href="php_little_game/roll_point.php">掷骰子效果</a></li>
                <li>    <a href="jsonData.txt">json数据</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div style="width:500px;">
<?php
$jsonData = "{\"広告宣伝\":\"広告宣伝\",\"マーケティングリサーチ・分析\":\"マーケティングリサーチ\",\"ＦＣオーナー\":\"ＦＣオーナー\",\"マーケティング・企画・宣伝\":\"映像\",\"商品企画\":\"商品企画\",\"ＣＥＯ\":\"ＣＥＯ\",\"マーチャンダイザー\":\"マーチャンダイザー\",\"営業企画\":\"営業企画\",\"バイヤー\":\"バイヤー\",\"事業企画\":\"事業企画\",\"代理店営業\":\"代理店営業\",\"店舗開発\":\"店舗開発\",\"商品開発\":\"商品開発\",\"仕入れ\":\"仕入\",\"事業プロヂュース\":\"プロヂュース\",\"ＣＦＯ\":\"ＣＦＯ\",\"ＣＩＯ\":\"ＣＩＯ\",\"ＣＯＯ\":\"ＣＯＯ\",\"研究生\":\"研究生\",\"経営企画\":\"経営企画\",\"経営幹部\":\"経営幹部\",\"ＣＴＯ\":\"ＣＴＯ\",\"販促企画\":\"販促\",\"ＦＣ開発\":\"ＦＣ開発\",\"海外事業企画\":\"海外事業企画\"}";

echo $jsonData;

$data = json_decode($jsonData);
print_r($data);
?>
</div>
<div class="row" style="height:500px;">
    <!--            <div class="col-sm-6" style="background-color:#c9b6e7;">板块1</div>-->
    <!--            <div class="col-sm-6" style="background-color:#d0e6ff;">板块2</div>-->
</div>



<?php include 'View/common_footer.php';// 引用共通部品：脚步?>
