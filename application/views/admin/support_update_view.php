<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>js/uploadify/uploadify.css" />
<script type="text/javascript" language="javascript" src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>js/uploadify/jquery.uploadify.v2.1.0.min.js"></script>
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

<script type="text/javascript" language="javascript">
    $(document).ready(function(){

        $("#upload").uploadify({
            uploader: '<?php echo base_url(); ?>uploadify/uploadify.swf',
            script: '<?php echo base_url(); ?>uploadify/uploadify.php',
            cancelImg: '<?php echo base_url(); ?>uploadify/cancel.png',
            folder: 'upload',
            scriptAccess: 'always',
            multi: true,
            'onError' : function (a, b, c, d) {
                if (d.status == 404)
                    alert('Could not find upload script.');
                else if (d.type === "HTTP")
                    alert('error '+d.type+": "+d.status);
                else if (d.type ==="File Size")
                    alert(c.name+' '+d.type+' Limit: '+Math.round(d.sizeLimit/1024)+'KB');
                else
                    alert('error '+d.type+": "+d.text);
            },
            'onComplete'   : function (event, queueID, fileObj, response, data) {
                //Post response back to controller
                $.post('<?php echo site_url('upload/uploadify'); ?>',{filearray: response},function(info){
                    $("#target").append(info);  //Add response returned by controller
                });
            }
        });
    });
</script>

<script type="text/javascript">
            $(document).ready(function(){
                $('#issuedDate').datepicker({dateFormat:'yy-mm-dd'});
                $('#created_at').datepicker({dateFormat:'yy-mm-dd'});
                $('#updated_at').datepicker({dateFormat:'yy-mm-dd'});

                $('#DOB1').datepicker({dateFormat:'yy-mm-dd'});
                $('#idExp').datepicker({dateFormat:'yy-mm-dd'});
                $('#idIssue').datepicker({dateFormat:'yy-mm-dd'});
                $('#DOB_m1').datepicker({dateFormat:'yy-mm-dd'});
                $('#DOB_m2').datepicker({dateFormat:'yy-mm-dd'});
                $('#DOB_m3').datepicker({dateFormat:'yy-mm-dd'});
                $('#DOB_m4').datepicker({dateFormat:'yy-mm-dd'});
            });
</script>

<a href="<?php echo base_url() . 'admin/support_list/'; ?>" >view product list</a>

<form id='editForm' method='post' onSubmit="if(confirm('Continue to edit?')) return ture; else return false" action='<?php echo base_url() . "admin/support_list/update_submit/" . $supportList->id; ?>' >
    <div id="tab_data" style="display:block">

            <table class="form">
                <tr>
                    <td>ID:</td>
                    <td><input name='id' id='id'  value='' disabled="disabled"/></td>
                </tr>
                <tr>
                    <td>Name:</td>
                    <td><input name='name' id='name' value="<?= $supportList->name ?>"/></td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td><textarea name='description' id='description' class="full"><? echo $supportList->description ?></textarea>
                    <?php
                    echo form_ckeditor(array('id' => 'description',
                        'width' => '500',
                        'height' => '300'));
                    ?>
                    </td>
               </tr>
                            
               <tr>
                    <td>Product File 1(PDF):</td>
                    <td><input name='file1' id='file1'  value='<?= $supportList->file1 ?>' />
                        <div>
                        <input type="button"
                               value="Insert PDF"
                               onclick="browseServer('file1',null);return false"
                               name="Change" >
                        </div>
                    </td>
               </tr>
               <tr>
                    <td>Product File 2(Zip):</td>
                    <td><input name='file2' id='file2'  value='<?= $supportList->file2 ?>' />
                        <div>
                        <input type="button"
                               value="Insert PDF"
                               onclick="browseServer('file2',null);return false"
                               name="Change" >
                        </div>
                    </td>
               </tr>
               
               <tr>
                    <td colspan="1"><input type="submit" value="submit" /></td>
                    <td></td>
               </tr>
            </table>
    </div>
 </form>


<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
