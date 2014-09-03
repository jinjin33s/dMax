
<div id="home_admin">

    <a href="<?php echo base_url() . 'admin/product_list/add/'; ?>" >add new product</a>
    <p>
     <div id="searchcontainer">
         <form id='searchForm' method='post' action='<?php echo base_url() . "admin/product_list/search"; ?>' >
            <div id="searchbox">
                <input name="searchStr" type="text" autocomplete="off" />
                <input type="image" src="<?php echo base_url();?>/images/buttons/btn_Magnifyglass.png" style="width:13px; height:12px;"/>
            </div>
        </form>
    </div>
    <br>
    <form id='form' method='post' onSubmit="if(confirm('Continue to delete?')) return ture; else return false" action='<?php echo base_url() . "admin/product_list/delete";?>'
    <div id="gamebox_container">
        <div id="gamebox_container">
            
                <table cellpadding="0" cellspacing="0" class="list">
                    <thead>
                        <tr>
                            <th width="1" class="center">&nbsp;</th>
                            <th>ID</th>                            
                            <th>Category</th>
                            <th>Sub Category</th>
                            <th>Name</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?
                         if (!$product_list)
                        {
                            echo "Your search - did not match any data.";
                        }else{
                            foreach($product_list as $plist)
                            {
                        ?>
                            <tr>
                                <td class="center">
                        <?
                            $data = array(
                                'name'        => 'plist_id[]',
                                'value'       => $plist['id'],
                                'class'		=> 'no_border'
                                );

                            echo form_checkbox($data);
                        ?>
                                </td>
                                    <td>
                                        <? echo anchor('admin/product_list/edit/'.$plist['id'], $plist['id']); ?>
                                    </td>
                                    <td>
                                        <? echo $plist->sub_category->category->name ?>
                                    </td>

                                    <td>
                                        <? echo $plist->sub_category->name ?>
                                    </td>
                                        <?php if (empty($plist->name) || $plist->name == '') {?> <td></td>
                                        <?php } else {?>
                                    <td>
                                        <?php echo anchor('admin/product_list/edit/'.$plist['id'], $plist['name']); ?>
                                    </td>
                                        <?php } ?>
                                    <td>
                                        <img height ="50" src='<? echo $plist['image'];?>'>
                                    </td>                                    
                                </tr>
                            <?
                                    }
                        }
                            ?>
                    </tbody>
                    <tfoot>
                            <tr>
                                <th class="center">
                                        <?
                                                $data = array(
                                                              'name'    => 'submit',
                                                              'id'      => 'submit',
                                                              'value'	=> 'Delete',
                                                              'class'	=> 'submit'
                                                            );
                                                echo form_submit($data);
                                        ?>
                                </th>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Sub Category</th>
                                <th>Name</th>
                                <th>Image</th>
                            </tr>
                    </tfoot>
                </table>

                <? if(isset($pagination)) {?>
                    <div class="pagination">
                    <? echo $pagination;?>
                    </div>
                <?}?>
            
        </div>        
        
    </div>
</form>
</div>

