
<h3><center>Dobrodosli na Oglasavanje.com</center></h3>

<?php 
    function lower($a, $b) {
    return  $a['price'] <=> $b['price'];
    }
    function higher($a, $b) {
    return  $b['price'] <=> $a['price'];
    }
    if($this->session->userdata('sort')){
    usort($articles, $this->session->userdata('sort'));     
    }
?>
<div class="row">
  <div id="left" class="col-md-2 collapse navbar-collapse"> 
    <table id="filter" class="table table-bordered">
      <tr>
        <td>
          <h4 style="text-align: center;"><span class="glyphicon glyphicon-filter"></span><b>Filter</b></h4>
        </td>
      </tr>
      <tr>
        <td>
          <form action="<?php echo base_url('search/sort') ?>" method="post">
            <div class="form-group">
              <label >SORTIRAJ PO:</label>
              <select name="sort" class="form-control" >
                <option value="">----------------</option>
                <option value="higher">cijeni - najvisoj</option>
                <option value="lower">cijeni - najnizoj</option>
              </select>
              <input type="hidden" name="uri" value="<?php echo current_full_url()?>">
              <button type="submit" class=""><span class="glyphicon glyphicon-refresh"></span>osvjezi</button>
            </div>               
          </form>
        </td>
      </tr>       
    </table>
  </div>
  <div style="margin-top: 65px " class="col-sm-12 col-md-8 col-offset-2">
    <?php foreach ($articles as $article): ?>               
      <div class="media">
        <div  class="media-left">
          <img id="i" src="<?php echo site_url(); ?>/assets/images/<?php echo $article['article_image'] ?>" class="media-object"  >
        </div>
        <div class="media-body">
          <h4 class="media-heading"><b><?php echo $article['name']; ?></b></h4>
          <div style="background-color: #F2E3AC;" class="well well-sm"><b><a href="<?php echo site_url('article/'.$article['id']); ?>"><?php echo character_limiter(strip_tags($article['description']),60); ?></a></b></div>           
        </div>
        <div class="media-right">
          <div id="mediaright" class="media-object table-bordered">
            <h4 style="text-decoration: bold;"><?php echo $article['price']; ?> KM</h4>
            <h5><span class="glyphicon glyphicon-calendar"></span><?php echo $article['created']; ?></h5>
            <h6><span class="glyphicon glyphicon-tag"></span> POLOVNO</h6>
          </div>
        </div>
      </div>         
    <?php endforeach ?>               
  </div>
</div>

