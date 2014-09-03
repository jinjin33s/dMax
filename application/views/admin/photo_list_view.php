<div id="home_admin">

    <a href="<?php echo base_url() . 'admin/photo_list/add/'; ?>" >add new photo</a>
    <p>
     
    <br>
    <form id='form' method='post' onSubmit="if(confirm('Continue to delete?')) return ture; else return false" action='<?php echo base_url() . "admin/photo_list/delete";?>'

    <div id="gamebox_container">
        <div id="gamebox_container">
                <table cellpadding="0" cellspacing="0" class="list">
                    <thead>
                        <tr>
                            <th width="1" class="center">&nbsp;</th>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Thumbnail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?
                         if (!$photo_list)
                        {
                            echo "Your search - did not match any data.";
                        }else{
                            foreach($photo_list as $nlist)
                            {
                        ?>
                            <tr>
                                <td class="center">
                        <?
                            $data = array(
                                'name'        => 'nlist_id[]',
                                'value'       => $nlist['id'],
                                'class'		=> 'no_border'
                                );

                            echo form_checkbox($data);
                        ?>
                                </td>
                                    <td>
                                        <? echo anchor('admin/photo_list/edit/'.$nlist['id'], $nlist['id']); ?>
                                    </td>
                                    <td>
                                        <? echo anchor('admin/photo_list/edit/'.$nlist['id'], $nlist['title']); ?>
                                    </td>
                                    <td>
                                        <? echo anchor('admin/photo_list/edit/'.$nlist['id'], $nlist['photodate']); ?>
                                    </td>
                                    <td>
                                        <img height ="50" src='<? echo $nlist['image'];?>'>
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
                                <th>Title</th>
                                <th>Date</th>
                                <th>Image</th>
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

