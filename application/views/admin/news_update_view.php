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


<a href="<?php echo base_url() . 'admin/news_list/'; ?>" >View News List</a>

<form id='editForm' method='post' onSubmit="if(confirm('Continue to edit?')) return ture; else return false" action='<?php echo base_url() . "admin/news_list/update_submit/" . $newlist->id; ?>' >
    <div id="tab_data" style="display:block">

            <table class="form">
                
                <tr>
                    <td>Title:</td>
                    <td><input name='title' id='title'  value='<?=$newlist->title?>'/></td>
               </tr>
               <tr>
                    <td>Date:</td>
                    <td><input name='newsdate' id='newsdate'  value='<?=$newlist->newsdate?>'/></td>
               </tr>
               <tr>
                    <td>Summary:</td>
                    <td><textarea name='summary' id='summary' value='' style="width:400px;height:20px"><?=$newlist->summary;?></textarea></td>
                </tr>
               <tr>
                    <td>Description:</td>
                    <td><textarea name='description' id='description' class="full"><? echo $newlist->description; ?></textarea>               
                    <?php
                    echo form_ckeditor(array('id' => 'description',
                        'width' => '500',
                        'height' => '300'));
                    ?>
                    </td>
                </tr>
                
                <tr>

                    <td colspan="2"><input type="submit" value="submit" /></td>
                </tr>
            </table>
    </div>
 </form>

