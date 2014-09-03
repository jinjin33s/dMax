	<script type="text/javascript" src="<?php echo base_url(); ?>ckfinder/ckfinder.js"></script>

         <script type="text/javascript">
            var inputFieldID;
            var imgID;
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

                if(imgID != null)
                {
                    $('#' + imgID).attr('src', fileUrl);
                }

                $('#' + inputFieldID).val(fileUrl);

            }

        </script>

        <script type="text/javascript">
            $(document).ready(function(){
                $('#photodate').datepicker({dateFormat:'yy-mm-dd'});
            });
        </script>

<a href="<?php echo base_url() . 'admin/photo_list/'; ?>" >view photo list</a>

<form id='editForm' method='post' onSubmit="if(confirm('Continue to add?')) return ture; else return false" action='<?php echo base_url() . "admin/photo_list/add_submit/"; ?>' >
    <div id="tab_data" style="display:block">
           <table class="form">
                <tr>
                    <td>Title:</td>
                    <td><input name='title' id='title'  value=''/></td>
               </tr>
               <tr>
                    <td>Date:</td>
                    <td><input name='photodate' id='photodate'  value=''/></td>
               </tr>               
               <tr>
                    <td>Description:</td>
                    <td><textarea name='description' id='description' class="full"></textarea>
                    <?php
                    echo form_ckeditor(array('id' => 'description',
                        'width' => '500',
                        'height' => '300',
                        'value' => ''));
                    ?>
                    </td>
                </tr>                
                <tr>
                    <td>Thumbnail:
                    <td><div>
                        <input name='image' id='image' value=''/>
                        </div>
                        <div>
                        <img width="150" name='imageview' id='imageview' src=''/>
                        </div>
                        <div>
                        <input type="button"
                               value="Change Image"
                               onclick="browseServer('image','imageview');return false"
                               name="Change" />
                        </div>
                   </td>

                </tr>
                <tr>

                    <td colspan="2"><input type="submit" value="submit" /></td>
                </tr>
            </table>
    </div>
 </form>

