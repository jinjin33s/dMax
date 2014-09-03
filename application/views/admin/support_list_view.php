<div id="home_admin">

    <a href="<?php echo base_url() . 'admin/support_list/add/'; ?>" >add new support</a>
    <p>
     
    <br>
    <form id='form' method='post' onSubmit="if(confirm('Continue to delete?')) return ture; else return false" action='<?php echo base_url() . "admin/support_list/delete";?>'
    <div id="gamebox_container">
        <div id="gamebox_container">            
                <table cellpadding="0" cellspacing="0" class="list">
                    <thead>
                        <tr>
                            <th width="1" class="center">&nbsp;</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?
                         if (!$support_list)
                        {
                            echo "Your search - did not match any data.";
                        }else{
                            foreach($support_list as $slist)
                            {
                        ?>
                            <tr>
                                <td class="center">
                        <?
                            $data = array(
                                'name'        => 'slist_id[]',
                                'value'       => $slist['id'],
                                'class'		=> 'no_border'
                                );

                            echo form_checkbox($data);
                        ?>
                                </td>
                                    <td>
                                        <? echo anchor('admin/support_list/edit/'.$slist['id'], $slist['id']); ?>
                                    </td>
                                    <td>
                                        <? echo anchor('admin/support_list/edit/'.$slist['id'], $slist['name']); ?>
                                    </td>
                                    <td>
                                        <? echo anchor('admin/support_list/edit/'.$slist['id'], $slist['description']); ?>
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
                                <th>Name</th>
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

