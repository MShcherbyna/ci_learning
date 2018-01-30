<h2><?=$title?></h2>
<?php echo validation_errors();?>

<?php echo form_open('create');?> <!-- Внутри form_open указан путь к обрабатывающему контроллеру-->
  <div class="form-group">
    <label for="exampleTitle">Title</label>
    <input type="text" class="form-control" name="title" id="exampleTitle" placeholder="Title">
  </div>
  <div class="form-group">
    <label for="editor1">Body</label>
    <textarea class="form-control" name="body" id="editor1" cols="30" rows="10" placeholder="Add Body" ></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
