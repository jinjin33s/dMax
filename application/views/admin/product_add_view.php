<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>js/uploadify/uploadify.css" />
<script type="text/javascript" language="javascript" src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>js/uploadify/jquery.uploadify.v2.1.0.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>ckfinder/ckfinder.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>ckeditor/adapters/jquery.js"></script>
<?php

    echo '<script type="text/javascript">';
    echo 'var subcategoryIdArray = [];';
    echo 'var subcategoryNameArray = [];';
    echo 'var categoryIdArray = [];';

    foreach ($subCategoryList as $dl){
        echo 'subcategoryIdArray.push("'.$dl->id.'");';
        echo 'subcategoryNameArray.push("'.$dl->name.'");';
        echo 'categoryIdArray.push("'.$dl->category_id.'");';
    }
    echo '</script>';

 ?>
 <script type="text/javascript">

    var datapool = new Array();

    $(document).ready(function(){

        var len = subcategoryIdArray.length;

        for( var i=0; i<len; i++ )
        {
            var obj = new Object();
            obj.subcategoryId = subcategoryIdArray[i];
            obj.subcategoryName = subcategoryNameArray[i];
            obj.categoryId = categoryIdArray[i];

            datapool.push(obj);
        }
        $("#ctgrSelect").attr("selectedIndex", 0);
        setOptions();
    });

    function setOptions()
        {
            var ctgrSelect = $("#ctgrSelect")[0];
            var subctgrid = ctgrSelect.value;
            var len = datapool.length;
            var select = document.getElementById("sub_category_id");
            select.options.length = 0;
            select.options[select.options.length] = new Option("Select...", "Select...");
            for(var i=0; i<len; i++){
                if (subctgrid == datapool[i].categoryId){
                        select.options[select.options.length] = new Option(datapool[i].subcategoryName, datapool[i].subcategoryId);
                }
            }
        }

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

<a href="<?php echo base_url() . 'admin/product_list/'; ?>" >view product list</a>

<form id='editForm' method='post' onSubmit="if(confirm('Continue to add?')) return ture; else return false" action='<?php echo base_url() . "admin/product_list/add_submit/"; ?>' >
    <div id="tab_data" style="display:block">

            <table class="form">
                <tr>
                    <td>ID:</td>
                    <td><input name='id' id='id'  value='' disabled="disabled"/></td>                    
                </tr>
                <tr>
                    <td>Category:</td>
                    <td>
                        <select id="ctgrSelect" name="optone" onchange="setOptions()" style="width:270px;">
                        <option value="Select...">Select...</option>
                            <?php foreach($categoryList as $dl) { ?>
                            <?php   $temp = $dl->name;
                                    if ($category != $temp)
                                    {
                            ?>
                        <option value="<?= $dl->id;?>"><?= $dl->name;?></option>
                            <?php
                                    $category = $dl->name;
                                    }
                            }?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Sub Category</td>
                    <td>
                        <select name="sub_category_id" id="sub_category_id" style="width:245px;"></select>
                    </td>
                </tr>
                
               <tr>
                    <td>Name:</td>
                    <td><input name='name' id='name' value=""/></td>
               </tr>

               <tr>
                    <td>Meta Title:</td>
                    <td><input name='title' id='title' value=""/></td>
               </tr>

               <tr>
                    <td>Search Tag:</td>
                    <td><input name='tag' id='tag' value=""/></td>
               </tr>
                
               <tr>
                    <td>Features:</td>
                    <td><textarea name='features' id='features'  value=''></textarea>
			<script type="text/javascript">
                            CKEDITOR.replace( 'features',
                             {
                                filebrowserBrowseUrl : '/dmax/ckfinder/ckfinder.html',
                                filebrowserImageBrowseUrl : '/dmax/ckfinder/ckfinder.html?type=Images',
                                filebrowserFlashBrowseUrl : '/dmax/ckfinder/ckfinder.html?type=Flash',
                                filebrowserUploadUrl :
                                   '/dmax/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&currentFolder=/archive/',
                                filebrowserImageUploadUrl :
                                   '/dmax/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images&currentFolder=/cars/',
                                filebrowserFlashUploadUrl : '/dmax/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
                             }
                            );
			</script>
               </tr>
               
               <tr>
                    <td>Specifications:</td>
                    <td><textarea name='specifications' id='specifications'  value=''></textarea>
                        <script type="text/javascript">
                                CKEDITOR.replace( 'specifications', 
                             {
                                filebrowserBrowseUrl : '/dmax/ckfinder/ckfinder.html',
                                filebrowserImageBrowseUrl : '/dmax/ckfinder/ckfinder.html?type=Images',
                                filebrowserFlashBrowseUrl : '/dmax/ckfinder/ckfinder.html?type=Flash',
                                filebrowserUploadUrl :
                                   '/dmax/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&currentFolder=/archive/',
                                filebrowserImageUploadUrl :
                                   '/dmax/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images&currentFolder=/cars/',
                                filebrowserFlashUploadUrl : '/dmax/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
                             }
                            );
                        </script>
               </tr>
                
               <tr>
                    <td>Dimensions:</td>
                    <td><textarea name='dimensions' id='dimensions'  value=''></textarea>
                        <script type="text/javascript">
                                CKEDITOR.replace( 'dimensions',
                             {
                                filebrowserBrowseUrl : '/dmax/ckfinder/ckfinder.html',
                                filebrowserImageBrowseUrl : '/dmax/ckfinder/ckfinder.html?type=Images',
                                filebrowserFlashBrowseUrl : '/dmax/ckfinder/ckfinder.html?type=Flash',
                                filebrowserUploadUrl :
                                   '/dmax/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&currentFolder=/archive/',
                                filebrowserImageUploadUrl :
                                   '/dmax/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images&currentFolder=/cars/',
                                filebrowserFlashUploadUrl : '/dmax/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
                             }
                            );
                        </script>
               </tr>
                <tr>
                    <td>Main Image:                    
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
                    <td>Sub Image1:
                    <td>
                        <div>
                        <input name='subimage1' id='subimage1' value=''/>
                        </div>
                        <div>
                        <input type="button"
                               value="Insert Image 1"
                               onclick="browseServer('subimage1','subimage1view');return false"
                               name="Change" />
                        </div>
                    </td>
               </tr>
               <tr>
                    <td>Sub Image2:
                    <td>
                        <div>
                        <input name='subimage2' id='subimage2' value=''/>
                        </div>
                        <div>
                        <img width="150" name='subimage2view' id='subimage2view' src=''/>
                        </div>
                        <div>
                        <input type="button"
                               value="Insert Image 2"
                               onclick="browseServer('subimage2','subimage2view');return false"
                               name="Change" />
                        </div>
                    </td>
               </tr>
               <tr>
                    <td>Sub Image3:
                    <td>
                        <div>
                        <input name='subimage3' id='subimage3' value=''/>
                        </div>
                        <div>
                        <img width="150" name='subimage3view' id='subimage3view' src=''/>
                        </div>
                        <div>
                        <input type="button"
                               value="Insert Image 3"
                               onclick="browseServer('subimage3','subimage3view');return false"
                               name="Change" />
                        </div>
                    </td>
               </tr>
               <tr>
                    <td>Sub Image4:
                    <td>
                        <div>
                        <input name='subimage4' id='subimage4' value=''/>
                        </div>
                        <div>
                        <img width="150" name='subimage4view' id='subimage4view' src=''/>
                        </div>
                        <div>
                        <input type="button"
                               value="Insert Image 4"
                               onclick="browseServer('subimage4','subimage4view');return false"
                               name="Change" />
                        </div>
                    </td>
               </tr>
               <tr>
                    <td>Sub Image5:
                    <td>
                        <div>
                        <input name='subimage5' id='subimage5' value=''/>
                        </div>
                        <div>
                        <img width="150" name='subimage5view' id='subimage5view' src=''/>
                        </div>
                        <div>
                        <input type="button"
                               value="Insert Image 5"
                               onclick="browseServer('subimage5','subimage5view');return false"
                               name="Change" />
                        </div>
                    </td>
               </tr>
               <tr>
                    <td>Sub Image6:
                    <td>
                        <div>
                        <input name='subimage6' id='subimage6' value=''/>
                        </div>
                        <div>
                        <img width="150" name='subimage6view' id='subimage6view' src=''/>
                        </div>
                        <div>
                        <input type="button"
                               value="Insert Image 6"
                               onclick="browseServer('subimage6','subimage6view');return false"
                               name="Change" />
                        </div>
                    </td>
               </tr>
               <tr>
                    <td>Manual:</td>
                    <td><input name='manual' id='manual'  value=''/>
                        <div>
                        <input type="button"
                               value="Insert Manual"
                               onclick="browseServer('manual',null);return false"
                               name="Change" >
                        </div>
                    </td>
               </tr>
               <tr>
                    <td>Catalog:</td>
                    <td><input name='catalog' id='catalog'  value=''/>
                        <div>
                        <input type="button"
                               value="Insert Catalog"
                               onclick="browseServer('catalog',null);return false"
                               name="Change" >
                        </div>
                    </td>
               </tr>
               <tr>
                    <td>CAD:</td>
                    <td><input name='cad' id='cad'  value=''/>
                        <div>
                        <input type="button"
                               value="Insert CAD"
                               onclick="browseServer('cad',null);return false"
                               name="Change" >
                        </div>
                    </td>
               </tr>

               <tr>
                    <td>Software File:</td>
                    <td><input name='software' id='software'  value=''/>
                        <div>
                        <input type="button"
                               value="Insert Software File"
                               onclick="browseServer('software',null);return false"
                               name="Change" >
                        </div>
                    </td>
               </tr>

               <tr>
                    <td>Related Product Name1:</td>
                    <td><input name='rpName1' id='rpName1'  value='' /></td>
               </tr>
               <tr>
                    <td>Related Product Image1:
                    <td>
                        <div>
                        <input name='rpImg1' id='rpImg1' value=''/>
                        </div>
                        <div>
                        <img width="150" name='rpImg1view' id='rpImg1view' src=''/>
                        </div>
                        <div>
                        <input type="button"
                               value="Insert Image 1"
                               onclick="browseServer('rpImg1','rpImg1view');return false"
                               name="Change" />
                        </div>
                    </td>
               </tr>
               <tr>
                    <td>Related Product File1(PDF):</td>
                    <td><input name='rpDown11' id='rpDown11'  value='' />
                        <div>
                        <input type="button"
                               value="Insert PDF"
                               onclick="browseServer('rpDown11',null);return false"
                               name="Change" >
                        </div>
                    </td>
               </tr>
               <tr>
                    <td>Related Product File1(AI):</td>
                    <td><input name='rpDown12' id='rpDown12'  value=''/>
                        <div>
                        <input type="button"
                               value="Insert AI"
                               onclick="browseServer('rpDown12',null);return false"
                               name="Change" >
                        </div>
                    </td>
               </tr>
               <tr>
                    <td>Related Product Name2:</td>
                    <td><input name='rpName2' id='rpName2'  value='' /></td>
               </tr>
               <tr>
                    <td>Related Product Image2:
                    <td>
                        <div>
                        <input name='rpImg2' id='rpImg2' value=''/>
                        </div>
                        <div>
                        <img width="150" name='rpImg2view' id='rpImg2view' src=''/>
                        </div>
                        <div>
                        <input type="button"
                               value="Insert Image 2"
                               onclick="browseServer('rpImg2','rpImg2view');return false"
                               name="Change" />
                        </div>
                    </td>
               </tr>
               <tr>
                    <td>Related Product File2(PDF):</td>
                    <td><input name='rpDown21' id='rpDown21'  value='' />
                        <div>
                        <input type="button"
                               value="Insert PDF"
                               onclick="browseServer('rpDown21',null);return false"
                               name="Change" >
                        </div>
                    </td>
               </tr>
               <tr>
                    <td>Related Product File2(AI):</td>
                    <td><input name='rpDown22' id='rpDown22'  value=''/>
                        <div>
                        <input type="button"
                               value="Insert AI"
                               onclick="browseServer('rpDown22',null);return false"
                               name="Change" >
                        </div>
                    </td>
               </tr>
               <tr>
                    <td>Related Product Name3:</td>
                    <td><input name='rpName3' id='rpName3'  value='' /></td>
               </tr>
               <tr>
                    <td>Related Product Image3:
                    <td>
                        <div>
                        <input name='rpImg3' id='rpImg3' value=''/>
                        </div>
                        <div>
                        <img width="150" name='rpImg3view' id='rpImg3view' src=''/>
                        </div>
                        <div>
                        <input type="button"
                               value="Insert Image 3"
                               onclick="browseServer('rpImg3','rpImg3view');return false"
                               name="Change" />
                        </div>
                    </td>
               </tr>
               <tr>
                    <td>Related Product File3(PDF):</td>
                    <td><input name='rpDown31' id='rpDown31'  value='' />
                        <div>
                        <input type="button"
                               value="Insert PDF"
                               onclick="browseServer('rpDown31',null);return false"
                               name="Change" >
                        </div>
                    </td>
               </tr>
               <tr>
                    <td>Related Product File3(AI):</td>
                    <td><input name='rpDown32' id='rpDown32'  value=''/>
                        <div>
                        <input type="button"
                               value="Insert AI"
                               onclick="browseServer('rpDown32',null);return false"
                               name="Change" >
                        </div>
                    </td>
               </tr>
               <tr>
                    <td>Related Product Name4:</td>
                    <td><input name='rpName4' id='rpName4'  value='' /></td>
               </tr>
               <tr>
                    <td>Related Product Image4:
                    <td>
                        <div>
                        <input name='rpImg4' id='rpImg4' value=''/>
                        </div>
                        <div>
                        <img width="150" name='rpImg4view' id='rpImg4view' src=''/>
                        </div>
                        <div>
                        <input type="button"
                               value="Insert Image 4"
                               onclick="browseServer('rpImg4','rpImg4view');return false"
                               name="Change" />
                        </div>
                    </td>
               </tr>
               <tr>
                    <td>Related Product File4(PDF):</td>
                    <td><input name='rpDown41' id='rpDown41'  value='' />
                        <div>
                        <input type="button"
                               value="Insert PDF"
                               onclick="browseServer('rpDown41',null);return false"
                               name="Change" >
                        </div>
                    </td>
               </tr>
               <tr>
                    <td>Related Product File1(AI):</td>
                    <td><input name='rpDown42' id='rpDown42'  value=''/>
                        <div>
                        <input type="button"
                               value="Insert AI"
                               onclick="browseServer('rpDown42',null);return false"
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


