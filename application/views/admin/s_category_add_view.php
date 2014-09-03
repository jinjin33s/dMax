<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>js/uploadify/uploadify.css" />
<script type="text/javascript" language="javascript" src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>js/uploadify/jquery.uploadify.v2.1.0.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>ckfinder/ckfinder.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>ckeditor/adapters/jquery.js"></script>

<script type="text/javascript" language="javascript">
 function browseServer(flID,igID) {
        // You can use the "CKFinder" class to render CKFinder in a page:

        inputFieldID = flID;

        imgID = igID;
        var finder = new CKFinder();
        finder.basePath = '/ckfinder/'; // The path for the installation of CKFinder (default = "/ckfinder/").
        finder.selectActionFunction = setFileField;
        finder.popup();
    }

    // This is a sample function which is called when a file is selected in CKFinder.
    function setFileField(fileUrl)
    {
        var temp;

        if(imgID != null)
        {
            $('#' + imgID).attr('src', fileUrl);
        }

        $('#' + inputFieldID).val(fileUrl);

    }
     $(document).ready(function() {
     $("#reg_date").datepicker({dateFormat:'yy-mm-dd'});
    });
</script>

<a href="<?php echo base_url() . 'admin/s_category_list/'; ?>" >view category list</a>

  <form id='editForm' method='post' onSubmit="if(confirm('Continue to add?')) return ture; else return false"action='<?php echo base_url() . "admin/s_category_list/add_submit/"; ?>' >
    <div id="tab_data" style="deisplay:block">

            <table class="form">
                <tr>
                    <td>Category:</td>
                    <td><select name="category" id="category" value="">
                            <?php
                                    foreach ($categorylist as $cgl)
                                    {
                                        echo "<option value='$cgl->id'>$cgl->name</option>";
                                    }
                            ?>
                        </select>
                    </td>
               </tr>
                <tr>
                    <td>Name:</td>
                    <td><input name='name' id='name' value=''/></td>
                </tr>
                <tr>
                    <td>Image:
                    <td>
                        <div>
                        <input name='image' id='image' value=''/>
                        </div>
                        <div>
                        <img width="150" name='imageview' id='imageview' alt="" src=''/>
                        </div>
                        <div>
                        <input type="button"
                               value="Insert Image"
                               onclick="browseServer('image','imageview');return false"
                               name="Change" />
                        </div>
                    </td>
               </tr>
                <tr>
                    <td>Description:</td>
                    <td>
                        <textarea  name='description' id='description' style="width:400px;height:200px"></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="submit" />
                    </td>
                </tr>
            </table>


    </div>
</form>