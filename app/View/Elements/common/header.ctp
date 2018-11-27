<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">导航栏</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="/cakephp-2.10.13/">Home <span class="sr-only">(current)</span></a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      
	  <?php
	  echo $this->Html->link(
		  '文章列表',
		  ['controlle'=>'Posts',
		 'action'=>'index' ],
		 ['class'=>'nav-link']
	  )

	  ?>
	  
	  </li>
    </ul>
  </div>
</nav>

