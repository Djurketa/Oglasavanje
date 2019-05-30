<h3><center>Izmjenite oglas</center></h3>
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <?php echo form_open('article/update'); ?>
      <input type="hidden" name="id" value="<?php echo $article['id']; ?>">
      <div class="form-group">
        <label>Naslov oglasa</label>
        <input type="text" class="form-control" name="name" value="<?php echo $article['name'] ?>">
      </div>
      <label>Odaberite kategoriju</label>
        <select name="category_id" value="<?php echo $article['name'] ;?>" class="form-control">
          <?php foreach ($categories as $category): ?>
            <option  value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
          <?php endforeach; ?>
        </select> 
      <div class="form-group">
        <label>Cijena u KM</label>
        <input type="number" class="form-control" name="price" value="<?php echo $article['price'] ;?>">
      </div>
      <div class="form-group">
        <label>Opis</label>
        <textarea class="form-control" name="description" rows="3" ><?php echo $article['description'] ;?></textarea>
      </div>
      <div class="form-group">
        <label>Izmjeni</label><br>
        <button class="btn btn-primary" type="submit" name="submit">Gotovo</button>
      </div>
    <?php echo form_close(); ?>
    <?php echo validation_errors(); ?>
  </div>
</div>