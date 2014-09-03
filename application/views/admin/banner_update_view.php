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


<form id='editForm' method='post' onSubmit="if(confirm('Continue to edit?')) return ture; else return false" action='<?php echo base_url() . "admin/banner_list/update_submit/1"; ?>' >
    <div id="tab_data" style="display:block">

            <table class="form">
                <tr>
                    <tr>
                    <td>ID:</td>
                    <td><input name='id' id='id'  value='1' disabled="disabled"/></td>
                    <td></td><td></td>
                </tr>
                </tr>
                <tr>
                    <td>New Product Title:</td>
                    <td><input name='npTitle' id='npTitle'  value='<?= $bannerlist->npTitle ?>' /></td>
                    <td>Featured Product Title:</td>
                    <td><input name='fpTitle' id='fpTitle'  value='<?= $bannerlist->fpTitle ?>' /></td>
                </tr>
                <tr>
                    <td>New Product Image:
                    <td>
                        <div>
                        <input name='npImg' id='npImg' value='<?= $bannerlist->npImg ?>'/>
                        </div>
                        <div>
                        <img width="150" name='npImgview' id='npImgview' src='<?= $bannerlist->npImg ?>'/>
                        </div>
                        <div>
                        <input type="button"
                               value="Image"
                               onclick="browseServer('npImg','npImgview');return false"
                               name="Change" />
                        </div>
                    </td>
                    <td>Featured Product Image:
                    <td>
                        <div>
                        <input name='fpImg' id='fpImg' value='<?= $bannerlist->fpImg ?>'/>
                        </div>
                        <div>
                        <img width="150" name='fpImgview' id='fpImgview' src='<?= $bannerlist->fpImg ?>'/>
                        </div>
                        <div>
                        <input type="button"
                               value="Image"
                               onclick="browseServer('fpImg','fpImgview');return false"
                               name="Change" />
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>New Product Link:</td>
                    <td><input name='npLink' id='npLink'  value='<?= $bannerlist->npLink ?>' /></td>
                    <td>Featured Product Link:</td>
                    <td><input name='fpLink' id='fpLink'  value='<?= $bannerlist->fpLink ?>' /></td>
                </tr>
                <tr>
                    <td colspan="1"><input type="submit" value="submit" /></td>
                    <td></td>
               </tr>

            </table>
    </div>
 </form>


