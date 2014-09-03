<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>js/uploadify/uploadify.css" />
<script type="text/javascript" language="javascript" src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>js/uploadify/jquery.uploadify.v2.1.0.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>ckfinder/ckfinder.js"></script>
<script type="text/javascript" src="/dmax/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="/dmax/ckeditor/adapters/jquery.js"></script>

<?php

    echo '<script type="text/javascript">';
    echo 'var subcategoryIdArray = [];';
    echo 'var subcategoryNameArray = [];';
    echo 'var categoryIdArray = [];';

    echo 'var subCategoryArray = [];';
    echo 'var nameArray = [];';
    echo 'var manualArray = [];';
    echo 'var catalogArray = [];';
    echo 'var cadArray = [];';
    echo 'var softwareArray = [];';

    foreach ($subCategoryList as $sl){
        echo 'subcategoryIdArray.push("'.$sl->id.'");';
        echo 'subcategoryNameArray.push("'.$sl->name.'");';
        echo 'categoryIdArray.push("'.$sl->category_id.'");';
    }

    foreach ($downloadList as $dl){
        echo 'subCategoryArray.push("'.$dl->sub_category_id.'");';
        echo 'nameArray.push("'.$dl->name.'");';
        echo 'manualArray.push("'.$dl->manual.'");';
        echo 'catalogArray.push("'.$dl->catalog.'");';
        echo 'cadArray.push("'.$dl->cad.'");';
        echo 'softwareArray.push("'.$dl->software.'");';
    }
    echo '</script>';

 ?>
<script type="text/javascript">

    var subcat_datapool = new Array();

    $(document).ready(function(){
        setDefault();
        var len = subcategoryIdArray.length;

        for( var i=0; i<len; i++ )
        {
            var obj = new Object();
            obj.subcategoryId = subcategoryIdArray[i];
            obj.subcategoryName = subcategoryNameArray[i];
            obj.categoryId = categoryIdArray[i];

            subcat_datapool.push(obj);
        }
        $("#ctgrSelect").attr("selectedIndex", 0);
        setCatOption();
    });

    var prod_datapool = new Array();

    $(document).ready(function(){        
        
        var prod_len = subCategoryArray.length;

        for( var i=0; i<prod_len; i++ )
        {
            var prod_obj = new Object();
            prod_obj.subcategory = subCategoryArray[i];
            prod_obj.productName = nameArray[i];
            prod_obj.manual = manualArray[i];
            prod_obj.catalog = catalogArray[i];
            prod_obj.cad = cadArray[i];
            prod_obj.software = softwareArray[i];

            prod_datapool.push(prod_obj);
        }
        $("#prodSelect").attr("selectedIndex", 0);
        setProductionOptions();
    });

    function setCatOption()
    {
        var ctgrSelect = $("#ctgrSelect")[0];
        var ctgrid = ctgrSelect.value;
        var len = subcat_datapool.length;
        var select = document.getElementById("sub_category_select");
        select.options.length = 0;
        select.options[select.options.length] = new Option("Select...", "Select...");
        for(var i=0; i<len; i++){
            if (ctgrid == subcat_datapool[i].categoryId){
                    select.options[select.options.length] = new Option(subcat_datapool[i].subcategoryName, subcat_datapool[i].subcategoryId);
            }
        }
        setProductionOptions();
    }

    function setProductionOptions()
    {
        var prodSelect = $("#sub_category_select")[0];
        var subctgrid = prodSelect.value;
        var prod_len = prod_datapool.length;
        var select = document.getElementById("prodSelect");
        select.options.length = 0;
        select.options[select.options.length] = new Option("Select...", "Select...");
        for(var i=0; i<prod_len; i++){
            if (subctgrid == prod_datapool[i].subcategory){
                    select.options[select.options.length] = new Option(prod_datapool[i].productName, prod_datapool[i].productName);
            }
        }
    }

    function setDefault() {
        $("#btn1").css('visibility','hidden');
        $("#btn2").css('visibility','hidden');
        $("#btn3").css('visibility','hidden');
        $("#btn4").css('visibility','hidden')
    }

    function setFileOptions() {
        var fileSelect = $("#prodSelect")[0];
        var fileName = fileSelect.value;
        var len = prod_datapool.length;
        for(var i=0; i<len; i++){
            if (fileName == prod_datapool[i].productName){
                updateFile(prod_datapool[i].manual, prod_datapool[i].catalog, prod_datapool[i].cad, prod_datapool[i].software);
            }
        }
    }

    function updateFile(manual, catalog, cad, software) {
        var file1 = document.getElementById("files1");
        var file2 = document.getElementById("files2");
        var file3 = document.getElementById("files3");
        var file4 = document.getElementById("files4");

        var btn1 = document.getElementById("btn1");
        var btn2 = document.getElementById("btn2");
        var btn3 = document.getElementById("btn3");
        var btn4 = document.getElementById("btn4");

        if (manual == "")
        {
            $("#btn1").css('visibility','hidden');
        }else{
            file1.disabled = false;
            $("#btn1").css('visibility','visible');
            $("#files1").attr({"action" : manual, "target" : "_blank"});
        }
        if (catalog == "")
        {
            $("#btn2").css('visibility','hidden');
        }else{
            file2.disabled = false;
            $("#btn2").css('visibility','visible');
            $("#files2").attr({"action" : catalog, "target" : "_blank"});
        }
        if (cad == "")
        {
            $("#btn3").css('visibility','hidden');
        }else{
            file3.disabled = false;
            $("#btn3").css('visibility','visible');
            $("#files3").attr({"action" : cad, "target" : "_blank"});
        }
        if (software == "")
        {
            $("#btn4").css('visibility','hidden');
        }else{
            file4.disabled = false;
            $("#btn4").css('visibility','visible');
            $("#files4").attr({"action" : software, "target" : "_blank"});
        }
    }

</script>


<div class="leftcontainer">
	<?php $this->load->view('includes/leftmenu_support.php'); ?>
</div>
<div class="rightcontainer">
	<div class="breadcrumb">home &raquo; Support &raquo; Download
	</div>
	<div class="titleCategory">Download Files
	</div>

	<div class="contentcontainer_top">

	</div>

	<div id="productDetail_container">
    <div class="bnCategory"><img src="<?php echo base_url();?>images/category/news.jpg" border="0"></div>

        <div id="download_text">Please choose your downloads from below list.</div>
        <div id="download_back">
        <div id="download_container">
        <div id="download_table_1">Category:
            <select id="ctgrSelect" name="optone" onchange="setCatOption()" style="width:150px;">
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
                </div>

                <div id="download_table_2">
                   Sub Category:  <select name="sub_category_select" id="sub_category_select" onchange="setProductionOptions()" style="width:130px;"></select>
                </div>

                <div id="download_table_2">
                   Model:  <select name="prodSelect" id="prodSelect" onchange="setFileOptions()" style="width:150px;"></select>
                </div>

                </div>
                </div>

                <div id="download_container">

                <div id="download_table_5"><form id="files3">
                <input id="btn3" type="image" value="CAD" src="../images/download_cad.jpg" /></form></div>

                <div id="download_table_4"><form id="files2">
                <input id="btn2" type="image" value="Catalog" src="../images/download_cata.jpg" /></form></div>

                <div id="download_table_3"><form id="files1" >
               	<input type="image" id="btn1" value="Manual" src="../images/download_manual.jpg" /></form></div>

                <div id="download_table_5"><form id="files4">
                <input id="btn4" type="image" value="Software" src="../images/download_software.jpg" /></form></div>

                </div>


	</div>
	<div class="productDetail_bottom">
	</div>
</div>