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
                $('#newsdate').datepicker({dateFormat:'yy-mm-dd'});
            });
        </script>

<a href="<?php echo base_url() . 'admin/news_list/'; ?>" >view News list</a>

<form id='editForm' method='post' onSubmit="if(confirm('Continue to add?')) return ture; else return false" action='<?php echo base_url() . "admin/news_list/add_submit/"; ?>' >
    <div id="tab_data" style="display:block">
           <table class="form">
                <tr>
                    <td>Title:</td>
                    <td><input name='title' id='title'  value=''/></td>
               </tr>
               <tr>
                    <td>Date:</td>
                    <td><input name='newsdate' id='newsdate'  value=''/></td>
               </tr>
               <tr>
                    <td>Summary:</td>
                    <td><textarea name='summary' id='summary' value='' style="width:400px;height:20px"></textarea></td>
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

                    <td colspan="2"><input type="submit" value="submit" /></td>
                </tr>
            </table>
    </div>
 </form>

