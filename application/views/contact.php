<div class="leftcontainer">
	<?php $this->load->view('includes/leftmenu_contact.php'); ?>
</div>
<div class="rightcontainer">	
    <div class="breadcrumb">home &raquo; Contact &raquo; Contact Info
    </div>
    <div class="titleCategory">Contact Information
    </div>
    <div class="contentcontainer_top">
    </div>
    <div id="productDetail_container">
        <div class="bnCategory"><img src="<?php echo base_url();?>images/category/contact.jpg" border="0" ></div>
        <div id="contact_container">
			<div style="width:90%; margin-left:auto; margin-right:auto; margin-top:10px; text-align:left;">Welcome to the Customer Support Department.  At D-max, we strive to meet the needs of every client and are always here to answer any questions you may have.  Please follow the directions below and fill out the form and one of our highly trained specialists will contact you.</div>
            <div class="contact_address">D-Max : Englewood Cliffs, NJ</div>
            <div class="contact_dotted"></div>
            <div class="contact_map">
                <iframe width="350" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Englewood+Cliffs,+NJ&amp;ie=UTF8&amp;hq=&amp;hnear=Englewood+Cliffs,+Bergen,+New+Jersey&amp;ll=40.885356,-73.952322&amp;spn=0.022711,0.030041&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe><br /><small><a href="http://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Englewood+Cliffs,+NJ&amp;ie=UTF8&amp;hq=&amp;hnear=Englewood+Cliffs,+Bergen,+New+Jersey&amp;ll=40.885356,-73.952322&amp;spn=0.022711,0.030041&amp;z=14&amp;iwloc=A" style="color:#0000FF;text-align:left">View Larger Map</a></small>
            </div>
            <div id="contact_form_container">
                <div class="formcontainer">
                    <form id="form1" name="form1" method="post" onSubmit="if(confirm('Continue to Submit?')) return ture; else return false" action='<?php echo base_url();?>about/signup/'>
                        <div class="field">
                            <label>Name<input name="name" type="text" class="txt" /></label>
                        </div>
                        <div class="field">
                            <label>Email
                                <input name="email" type="text" class="txt" /></label>
                        </div>
                         <div class="field">
                            <label>Phone Number
                                <input name="phone" type="text" class="txt" /></label>
                        </div>
                        <div class="field">
                            <label>Message<textarea name="message" cols="25" rows="5" class="txt"></textarea></label>
                        </div>
                        <div class="field">
                            <input type="Submit" value="Submit" class="contact_button" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
	
    <div class="contentcontainer_bottom">
    </div>

</div>