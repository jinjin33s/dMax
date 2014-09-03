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
        var selectedIndex = -1;
        for( var i=0; i<len; i++ )
        {
            var obj = new Object();
            obj.subcategoryId = subcategoryIdArray[i];
            obj.subcategoryName = subcategoryNameArray[i];
            obj.categoryId = categoryIdArray[i];
            alert(obj.categoryId +","+ <? echo $product->sub_category->category->id; ?>))
            if(obj.categoryId == <? echo $product->sub_category->category->id; ?>)
                {
                    selectedIndex = i;
                }
            datapool.push(obj);
        }

        $("#ctgrSelect").attr("selectedIndex", selectedIndex);
    });
    
     function setOptions()
        {
            var ctgrSelect = $("#ctgrSelect")[0];
            var ctgrid = ctgrSelect.value;
            var len = datapool.length;
            var select = document.getElementById("sub_category_id");
            select.options.length = 0;
            select.options[select.options.length] = new Option("Select...", "Select...");
            for(var i=0; i<len; i++){
                if (ctgrid == datapool[i].categoryId){                    
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

<form id='editForm' method='post' onSubmit="if(confirm('Continue to edit?')) return ture; else return false" action='<?php echo base_url() . "admin/product_list/update_submit/" . $product->id; ?>' >
    <div id="tab_data" style="display:block">

            <table class="form">
                <tr>
                    <td>ID:</td>
                    <td><input name='id' id='id'  value='' disabled="disabled"/></td>                    
                </tr>
                <tr>
                    <td>Category:</td>
                    <td>
                        <select name="ctgrSelect" id="ctgrSelect" onchange="setOptions()" >
                            <?php
                                foreach ($categoryList as $cgl) {
                                    if (strcmp($product->sub_category->category->id, $cgl->id) == 0){
                                        echo "<option value='$cgl->id' selected=\"selected\">$cgl->name</option>";
                                    }
                                    else
                                        echo "<option value='$cgl->id'>$cgl->name</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>                

                <tr>
                    <td>Sub Category:</td>
                    <td>
                        <select name="sub_category_id" id="sub_category_id">
                            <?php
                                foreach ($subCategoryList as $cgl) {
                                    if (strcmp($product->sub_category_id, $cgl->id) == 0) 
                                        echo "<option value='$cgl->id' selected>$cgl->name</option>";
                                    else
                                        echo "<option value='$cgl->id'>$cgl->name</option>";
                                }
                            ?>
                        </select>
                    </td>
               </tr>

               <tr>
                    <td>Name:</td>
                    <td><input name='name' id='name' value="<?= $product->name ?>"/></td>
               </tr>
               <tr>
                    <td>Meta Title:</td>
                    <td><input name='title' id='title' value="<?= $product->title ?>"/></td>
               </tr>

               <tr>
                    <td>Search Tag:</td>
                    <td><input name='tag' id='tag' value="<?= $product->tag ?>"/></td>
               </tr>
               <tr>
                    <td>Features:</td>
                    <td><textarea name='features' id='features'><?= $product->features ?></textarea>
                        <script type="text/javascript">
                            CKEDITOR.replace( 'features',
                             {
                                filebrowserBrowseUrl : '<?php echo base_url(); ?>ckfinder/ckfinder.html',
                                filebrowserImageBrowseUrl : '<?php echo base_url(); ?>ckfinder/ckfinder.html?type=Images',
                                filebrowserFlashBrowseUrl : '<?php echo base_url(); ?>ckfinder/ckfinder.html?type=Flash',
                                filebrowserUploadUrl : '<?php echo base_url(); ?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&currentFolder=/archive/',
                                filebrowserImageUploadUrl : '<?php echo base_url(); ?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images&currentFolder=/cars/',
                                filebrowserFlashUploadUrl : '<?php echo base_url(); ?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
                             }
                            );
			</script>
               </tr>

               <tr>
                    <td>Specifications:</td>
                    <td><textarea name='specifications' id='specifications'><?= $product->specifications ?></textarea>
                        <script type="text/javascript">
                            CKEDITOR.replace( 'specifications',
                             {
                                filebrowserBrowseUrl : '<?php echo base_url(); ?>ckfinder/ckfinder.html',
                                filebrowserImageBrowseUrl : '<?php echo base_url(); ?>ckfinder/ckfinder.html?type=Images',
                                filebrowserFlashBrowseUrl : '<?php echo base_url(); ?>ckfinder/ckfinder.html?type=Flash',
                                filebrowserUploadUrl : '<?php echo base_url(); ?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&currentFolder=/archive/',
                                filebrowserImageUploadUrl : '<?php echo base_url(); ?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images&currentFolder=/cars/',
                                filebrowserFlashUploadUrl : '<?php echo base_url(); ?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
                             }
                            );
			</script>
               </tr>

               <tr>
                    <td>Dimensions:</td>
                    <td><textarea name='dimensions' id='dimensions'><?= $product->dimensions ?></textarea>
                        <script type="text/javascript">
                            CKEDITOR.replace( 'dimensions',
                             {
                                filebrowserBrowseUrl : '<?php echo base_url(); ?>ckfinder/ckfinder.html',
                                filebrowserImageBrowseUrl : '<?php echo base_url(); ?>ckfinder/ckfinder.html?type=Images',
                                filebrowserFlashBrowseUrl : '<?php echo base_url(); ?>ckfinder/ckfinder.html?type=Flash',
                                filebrowserUploadUrl : '<?php echo base_url(); ?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&currentFolder=/archive/',
                                filebrowserImageUploadUrl : '<?php echo base_url(); ?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images&currentFolder=/cars/',
                                filebrowserFlashUploadUrl : '<?php echo base_url(); ?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
                             }
                            );
			</script>
               </tr>
                <tr>
                    <td>Main Image:
                    <td>
                        <div>
                        <input name='image' id='image' value='<?= $product->image ?>'/>
                        </div>
                        <div>
                        <img width="150" name='imageview' id='imageview' src='<?= $product->image ?>'/>
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
                        <input name='subimage1' id='subimage1' value='<?= $product->subimage1 ?>'/>
                        </div>
                        <div>
                        <img width="150" name='subimage1view' id='subimage1view' src='<?= $product->subimage1 ?>'/>
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
                        <input name='subimage2' id='subimage2' value='<?= $product->subimage2 ?>'/>
                        </div>
                        <div>
                        <img width="150" name='subimage2view' id='subimage2view' src='<?= $product->subimage2 ?>'/>
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
                        <input name='subimage3' id='subimage3' value='<?= $product->subimage3 ?>'/>
                        </div>
                        <div>
                        <img width="150" name='subimage3view' id='subimage3view' src='<?= $product->subimage3 ?>'/>
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
                        <input name='subimage4' id='subimage4' value='<?= $product->subimage4 ?>'/>
                        </div>
                        <div>
                        <img width="150" name='subimage4view' id='subimage4view' src='<?= $product->subimage4 ?>'/>
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
                        <input name='subimage5' id='subimage5' value='<?= $product->subimage5 ?>'/>
                        </div>
                        <div>
                        <img width="150" name='subimage5view' id='subimage5view' src='<?= $product->subimage5 ?>'/>
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
                        <input name='subimage6' id='subimage6' value='<?= $product->subimage6 ?>'/>
                        </div>
                        <div>
                        <img width="150" name='subimage6view' id='subimage6view' src='<?= $product->subimage6 ?>'/>
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
                    <td><input name='manual' id='manual'  value='<?= $product->manual ?>'/>
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
                    <td><input name='catalog' id='catalog'  value='<?= $product->catalog ?>'/>
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
                    <td><input name='cad' id='cad'  value='<?= $product->cad ?>'/>
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
                    <td><input name='software' id='software'  value='<?= $product->software ?>'/>
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
                    <td><input name='rpName1' id='rpName1'  value='<?= $product->rpName1 ?>' /></td>
               </tr>
               <tr>
                    <td>Related Product Image1:
                    <td>
                        <div>
                        <input name='rpImg1' id='rpImg1' value='<?= $product->rpImg1 ?>'/>
                        </div>
                        <div>
                        <img width="150" name='rpImg1view' id='rpImg1view' src='<?= $product->rpImg1 ?>'/>
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
                    <td><input name='rpDown11' id='rpDown11'  value='<?= $product->rpDown11 ?>' />
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
                    <td><input name='rpDown12' id='rpDown12'  value='<?= $product->rpDown12 ?>'/>
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
                    <td><input name='rpName2' id='rpName2'  value='<?= $product->rpName2 ?>' /></td>
               </tr>
               <tr>
                    <td>Related Product Image2:
                    <td>
                        <div>
                        <input name='rpImg2' id='rpImg2' value='<?= $product->rpImg2 ?>'/>
                        </div>
                        <div>
                        <img width="150" name='rpImg2view' id='rpImg2view' src='<?= $product->rpImg2 ?>'/>
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
                    <td><input name='rpDown21' id='rpDown21'  value='<?= $product->rpDown21 ?>' />
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
                    <td><input name='rpDown22' id='rpDown22'  value='<?= $product->rpDown22 ?>'/>
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
                    <td><input name='rpName3' id='rpName3'  value='<?= $product->rpName3 ?>' /></td>
               </tr>
               <tr>
                    <td>Related Product Image3:
                    <td>
                        <div>
                        <input name='rpImg3' id='rpImg3' value='<?= $product->rpImg3 ?>'/>
                        </div>
                        <div>
                        <img width="150" name='rpImg3view' id='rpImg3view' src='<?= $product->rpImg3 ?>'/>
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
                    <td><input name='rpDown31' id='rpDown31'  value='<?= $product->rpDown31 ?>' />
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
                    <td><input name='rpDown32' id='rpDown32'  value='<?= $product->rpDown32 ?>'/>
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
                    <td><input name='rpName4' id='rpName4'  value='<?= $product->rpName4 ?>' /></td>
               </tr>
               <tr>
                    <td>Related Product Image4:
                    <td>
                        <div>
                        <input name='rpImg4' id='rpImg4' value='<?= $product->rpImg4 ?>'/>
                        </div>
                        <div>
                        <img width="150" name='rpImg4view' id='rpImg4view' src='<?= $product->rpImg4 ?>'/>
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
                    <td><input name='rpDown41' id='rpDown41'  value='<?= $product->rpDown41 ?>' />
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
                    <td><input name='rpDown42' id='rpDown42'  value='<?= $product->rpDown42 ?>'/>
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


