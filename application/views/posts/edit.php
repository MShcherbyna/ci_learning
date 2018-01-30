<h2><?=$title?></h2>
<?php echo validation_errors();?>

<?php echo form_open('/update');?> <!-- Внутри form_open указан путь к обрабатывающему контроллеру-->
	<input type="hidden" name="id" value="<?=$posts['id']?>">
  <div class="form-group">
    <label for="exampleTitle">Title</label>
    <input type="text" class="form-control" name="title" id="exampleTitle" placeholder="Title" value="<?php echo $posts['title']?>" >
  </div>
  <div class="form-group">
    <label for="editor1">Body</label>
    <textarea class="form-control" name="body" id="editor1" cols="30" rows="10" placeholder="Add Body"><?php echo $posts['body']?></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
