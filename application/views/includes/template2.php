<?php $this->load->view('includes/header'); ?>

<div id="contentscontainer" class="narrowcontainer">
        <div id="leftmenucontainer">
        <?php $this->load->view('includes/'.$left_menu); ?>
    </div>
    <div id="rightcontentscontainer">
<?php $this->load->view($main_content); ?>
   </div>

</div>


<?php $this->load->view('includes/footer'); ?>