<h2><?=$title?></h2>
<?php foreach($posts as $value):?>
<h3><?=$value['title']?></h3>
<small class='post-date'>Posted on <?=$value['created_at']?></small>
<p><?=$value['body']?></p>
<?php endforeach;?>
