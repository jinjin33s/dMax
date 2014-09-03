
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>js/uploadify/uploadify.css" />
        <script type="text/javascript" language="javascript" src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
        <script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>js/uploadify/jquery.uploadify.v2.1.0.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>ckfinder/ckfinder.js"></script>

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

                        <input id="imagepath" />
                        <img id="imageview" src="" />
                        <input type="button"
                               value="Change Image"
                               onclick="browseServer('imagepath','imageview');return false"
                               name="Change" />




