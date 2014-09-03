<div id="home_admin">

    <a href="<?php echo base_url() . 'admin/s_category_list/add/'; ?>" >add new category</a>
    <p>
     
    <br>
    
    <form id='form' method='post' onSubmit="if(confirm('Continue to delete?')) return ture; else return false" action='<?php echo base_url() . "admin/s_category_list/delete";?>'
    <div id="gamebox_container">
        <div id="gamebox_container">
            
                <table cellpadding="0" cellspacing="0" class="list">
                    <thead>
                        <tr>
                            <th width="1" class="center">&nbsp;</th>
                            <th>Category</th>
                            <th>ID</th>
                            <th>Sub Category</th>
                            <th>Image</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?
                         if (!$s_category_list)
                        {
                            echo "Your search - did not match any data.";
                        }else{
                            foreach($s_category_list as $clist)
                            {
                        ?>
                            <tr>
                                <td class="center">
                        <?
                            $data = array(
                                'name'        => 'clist_id[]',
                                'value'       => $clist['id'],
                                'class'		=> 'no_border'
                                );

                            echo form_checkbox($data);
                        ?>
                                </td>
                                <td>
                                        <? echo anchor('admin/category_list/edit/'.$clist->category->id, $clist->category->name); ?>
                                    </td>

                                    <td>
                                        <? echo anchor('admin/s_category_list/edit/'.$clist['id'], $clist['id']); ?>
                                    </td>
                                    <td>
                                        <? echo anchor('admin/s_category_list/edit/'.$clist['id'], $clist['name']); ?>
                                    </td>
                                    <td>
                                        <img height ="50" src='<? echo $clist['image'];?>'>
                                    </td>
                                    <td>
                                        <? echo $clist['description']; ?>
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
                                <th>Category</th>
                                <th>ID</th>
                                <th>Sub Category</th>
                                <th>Image</th>
                                <th>Description</th>
                            </tr>
                    </tfoot>
                </table>
            
        </div>

        <div class="pagination">
                <?// echo $this->pagination->create_links($kclass_list['pagination_info']['page'], $kclass_list['pagination_info']['page_count'], 'admin/kclass/overview/');?>
        </div>

    </div>
    </form>
</div>

