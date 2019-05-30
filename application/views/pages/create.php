
<h3><center>Kreirajte oglas</center></h3>
<?php echo form_open_multipart(base_url().'article/create'); ?>
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <div class="form-group">
      <label>Naslov oglasa</label>
      <input type="text" class="form-control" name="name" placeholder="Unesite">
    </div>
    <div class="form-group">
      <label>Odaberite kategoriju</label>
        <select name="category_id" class="form-control">
          <?php foreach ($categories as $category): ?>
            <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
          <?php endforeach; ?>
        </select> 
    </div>
    <div class="form-group">
      <label>Cijena u KM</label>
      <input type="number" class="form-control" name="price">
    </div>
    <div class="form-group">
      <label>Opis</label>
      <textarea  class="form-control" name="description" rows="3"></textarea>
    </div>
    <div class="form-group">
      <label>Dodaj sliku</label>
      <input type="file" name="userfile" size="20">
    </div>
    <div class="form-group">
      <button class="btn btn-primary" type="submit" name="submit">Gotovo</button>
    </div>
<?php echo form_close(); ?>
  </div>
</div>
<?php echo validation_errors(); ?>



