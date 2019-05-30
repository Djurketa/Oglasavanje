
<?php if($this->session->flashdata('no_articles')): ?>
  <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('no_articles',).'</p>'; ?>
<?php endif; ?>
<h3><center>KATEGORIJE</center></h3><br>
<div class="row">
<?php foreach ($categories  as $category): ?>
  <div class="col-md-4 col-sm-6 ">     
    <div class="media">
      <div class="media-left">
        <img id="i" src="<?php echo base_url() ?>/assets/categoryimg/<?php echo $category['image'] ?>" class="media-object"  >
      </div>
      <div class="media-body">
        <h4 class="media-heading"><b><?php echo $category['name']; ?></b></h4>
        <div style="background-color: #F2E3AC;" class="well well-sm"><b><a href="<?php echo base_url('categories/view/'.$category['id']); ?>"><?php echo $category['name']; ?></a></b>
        </div>           
      </div>
    </div>          
  </div>
<?php endforeach ;?>
</div>





