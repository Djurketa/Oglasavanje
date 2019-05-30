<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mail extends CI_Controller{
      
    function send(){
        // Load PHPMailer library
        $this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        $mail->isSMTP();    
                          
        $mail->Host = 'smtp.gmail.com';                       
        $mail->SMTPAuth = true;
        // Enter gmail account data                             
        $mail->Username = '.........';         
        $mail->Password = '.........';                                   
        $mail->SMTPSecure = 'tls';                              
        $mail->Port = 587;                                       
        //Doesn't work on google STMP
        $mail->setFrom($this->input->post('email').'oglasavanje.com');        
        $mail->AddReplyTo($this->input->post('email'), $this->input->post('name')."".$this->input->post('lname'));
        //Enter mail adress 
        $mail->addAddress('...........');   
        $mail->isHTML(true);  
        $mail->Subject = $this->input->post('subject');
        $mail->Body    = $this->input->post('message');

        if(!$mail->send()) {
        	$this->session->set_flashdata('mail_fail','Doslo je do greske pri slanju mejla!');
            redirect(base_url('contact'));
        } else {
            $this->session->set_flashdata('mail_success','Uspjesno ste poslali emal!');
            redirect(base_url('contact'));           
        }

                    
    }
    
}