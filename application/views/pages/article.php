<div style="background-color:white" class="row">
  <div  class="col-md-6">
    <table style="margin-top: 20px;" class="table table-bordered ">
      <tr>
        <td>
          <h2><?php echo $article['name'];?></h2>
        </td>
      </tr>
      <tr style="background-color:#F2E3AC;">
        <td>OPIS:
          <div>
            <h4><i><b><?php echo $article['description'] ;?></b></i></h4>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <h4>
            CIJENA:<b> <?php echo $article['price'] ;?> KM</b>
            <span style="float: right;">Datum: <?php echo $article['created'] ;?></span>
          </h4>
        </td>
      </tr>
    </table>
    <div>     
      <?php if ($this->session->userdata('logged_in')): ?>
        <?php echo form_open('comments/create/'.$article['id']); ?>
        <div class="form-group">
          <textarea style="margin-top: 30px" name="comment" class="form-control" rows="1"  placeholder="Postavite pitanje.."></textarea>
        </div>
        <button name="submit" type="submit" class="btn  btn-primary">Pitaj </button>
      <?php endif ;?>
      <?php echo validation_errors(); ?>
      <?php echo form_close() ;?>
        <div style="margin-top: 10px;" class="well">
          <span><h4><i>Pitanja:</i></h4></span> 
        </div>
    </div>
      <?php foreach ($comments as $comment): ?>
        <div class="well">
         <!-- Comment list -->
          <?php echo $comment['comment'] ;?> <small>[ <?= $comment['name'] ?> ]</small>
        </div>
      <?php endforeach ?> 
  </div>
  <div  class="col-md-3 col col-md-offset-1">
       <!-- Trigger the Modal -->
    <img id="myImg" src="<?php echo site_url(); ?>assets/images/<?php echo $article['article_image'] ?>"  style="width:100%;max-width:300px">
    <!-- The Modal -->
    <div id="myModal" class="modal">
      <!-- The Close Button -->
      <span class="close">&times;</span>
      <!-- Modal Content (The Image) -->
        <img class="modal-content" id="img01">
      <!-- Modal Caption (Image Text) -->
      <div id="caption"></div>
    </div>   
  </div>
</div>



