<?php if($this->session->flashdata('mail_success')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('mail_success').'</p>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('mail_fail')): ?>
    <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('mail_fail').'</p>'; ?>
<?php endif; ?>
<form method="post" action="<?php echo base_url('mail/send') ?>">
    <div class="row">
        <div class="col-md-6 col-md-offset-3" >
            <h3>Kontaktirajte nas</h3><br>
            <div class="form-group">
                <label>Ime</label>
                <input type="text" name="name" class="form-control" placeholder="Unesite ime" required="required"  data-error="Please, leave us a message.">
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <label>Prezime</label>
                <input type="text" name="lname" class="form-control" placeholder="Unesite prezime" required="required">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input  type="email" name="email" class="form-control" placeholder="Unesite vasu adresu" required="required"><br><br>
            </div>
            <div class="form-group">
                <label>Naslov poruke</label>
                <input  type="text" name="subject" class="form-control" placeholder="Unesite naslov poruke" required="required">
            </div>     
            <div class="form-group">
                <label>Poruka</label>
                <textarea name="message" class="form-control" placeholder="Otkucajte tekst poruke" rows="4" required="required"></textarea>
            </div>     
            <button type="submit" class="btn btn-danger btn-block">Poslaji</button>              
        </div>
    </div>    
</form>
