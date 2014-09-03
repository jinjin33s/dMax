
<a href="<?php echo base_url() . 'admin/banner_list/'; ?>" >view category list</a>

  <form id='editForm' method='post' onSubmit="if(confirm('Continue to add?')) return ture; else return false" action='<?php echo base_url() . "admin/banner_list/add_submit/"; ?>' >
    <div id="tab_data" style="deisplay:block">

            <table class="form">
                <tr>
                    <tr>
                    <td>ID:</td>
                    <td><input name='id' id='id'  value='' disabled="disabled"/></td>
                    <td></td><td></td>
                </tr>
                </tr>
                <tr>
                    <td>New Product Title:</td>
                    <td><input name='npTitle' id='npTitle'  value='' /></td>
                    <td>Featured Product Title:</td>
                    <td><input name='fpTitle' id='fpTitle'  value='' /></td>
                </tr>
                <tr>
                    <td>New Product Image:
                    <td>
                        <div>
                        <input name='npImg' id='npImg' value=''/>
                        </div>
                        <div>
                        <img width="150" name='npImgview' id='npImgview' src=''/>
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
                        <input name='fpImg' id='fpImg' value=''/>
                        </div>
                        <div>
                        <img width="150" name='fpImgview' id='fpImgview' src=''/>
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
                    <td><input name='npLink' id='npLink'  value='' /></td>
                    <td>Featured Product Link:</td>
                    <td><input name='fpLink' id='fpLink'  value='' /></td>
                </tr>
                <tr>
                    <td colspan="1"><input type="submit" value="submit" /></td>
                    <td></td>
               </tr>
            </table>


    </div>
</form>