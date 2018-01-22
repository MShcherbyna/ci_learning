<h2><?=$title?></h2>
<div class="post-body">
    <small class='post-date'>Posted on <?=$posts['created_at']?></small>
    <p><?=$posts['body'];?></p>
    <p><a href="/posts">All Posts ></a></p>
</div>
<hr>
<?php echo form_open('/posts/delete/'.$posts['id'])?>
<input type="submit" class="btn btn-danger" value="Delete">
</form>
