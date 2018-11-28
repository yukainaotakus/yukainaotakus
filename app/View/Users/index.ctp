<!-- File: /app/View/Posts/index.ctp -->

<h1>这里是user里的临时用户界面</h1>

<p>
<?php 
echo "您好".$_SESSION['Auth']['User']['username']."!!!您是本站的第".$_SESSION['Auth']['User']['id']."位用户，希望您在这里尽情享受【没卵用系列】给您带来的极致用户体验！have a nice day !";

?>
</p>



<div>
<br>ps：请从导航里的【返回主页】选项中，返回查看Monster主页
</div>