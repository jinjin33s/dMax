        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>js/uploadify/uploadify.css" />
        <script type="text/javascript" language="javascript" src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
        <script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>js/uploadify/jquery.uploadify.v2.1.0.min.js"></script>
	
         <script type="text/javascript">
            var inputFieldID;
            var imgID;
            function browseServer(flID,igID) {
                // You can use the "CKFinder" class to render CKFinder in a page:
                inputFeldID = flID;
                imgID = igID;
                var finder = new CKFinder();
                finder.basePath = '/ckfinder/'; // The path for the installation of CKFinder (default = "/ckfinder/").
                finder.selectActionFunction = setFileField;
                finder.popup();
            }

            // This is a sample function which is called when a file is selected in CKFinder.
            function setFileField(fileUrl) {
                document.getElementById('imagepath').value = fileUrl;
                if(imgID != null)
                {
                    document.getElementById('imageview').src = fileUrl;
                }

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


            
            
<div id="multiupload" style="deisplay:block">
            <?php echo form_open_multipart('upload/index'); ?>
            <table class="form">
                <tr>
                    <td>Muliple File Upload:</td>
                    <td>
            <p>
                <label for="Filedata">Choose a File</label><br/>
                <?php echo form_upload(array('name' => 'Filedata', 'id' => 'upload')); ?>
                <a href="javascript:$('#upload').uploadifyUpload();">Upload File(s)</a>
            </p>
                    </td>
                </tr>
            </table>
            <?php echo form_close(); ?>
</div>

