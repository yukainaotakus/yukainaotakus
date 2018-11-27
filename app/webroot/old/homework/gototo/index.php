<!DOCTYPE HTML>
 <html>
 <head>
<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="0">

     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 <title>来呀~快活呀~</title>
 
 </head>
 <body>
 	<h1>我的作品</h1>
 	<h1>科学占卜</h1>
  <a href="#" id="clickMe"> <img src="img/ou.jpg" title=必出SSR！ ></a><span id="speak"></span>
 
 <br>
    <div style="text-align:right;">
        <a href="yunshi.php">玄不救非，氪不改命，科学占卜，从我做起！</a>

    </div>


 <script>
     var x =1;

     $("#clickMe").click(function(){
     	$("#speak").html("你点了我，"+x +"次，你给我记住.");
         x++;
         if(x>10){
			 $("#speak").html("你再也抽不到ssr了！");

         }
     });

 </script>
 
 
 
 
 </body>
 
 
 
 </html>
