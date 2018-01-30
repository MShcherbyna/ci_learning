<h2><?=$title?></h2>
<div class="post-body">
    <small class='post-date'>
		Posted on <?=$posts['created_at']?> in <strong><?php//$posts['name']?></strong>
	</small>
    <p><?=$posts['body'];?></p>
    <p><a href="/posts">All Posts ></a></p>
</div>
<hr>
<a class="btn btn-warning pull-left edit-btn" href="/posts/edit/<?=$posts['slug']?>">Edit</a>
<?php echo form_open('/posts/delete/'.$posts['id'])?>
<input type="submit" class="btn btn-danger" value="Delete">
</form>
