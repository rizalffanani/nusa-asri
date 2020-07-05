<div class='box box-primary'>
            <form action="<?php echo $action; ?>" method="post">
              <table class='table table-bordered'>
                <tr>
                  <td>Name <?php echo form_error('name') ?></td>
                  <td><input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" /></td>
                </tr>
                <tr>
                  <td>Link <?php echo form_error('link') ?></td>
                  <td><input type="text" class="form-control" name="link" id="link" placeholder="Link" value="<?php echo $link; ?>" /></td>
                </tr>
                <tr>
                  <td>Deskrip <?php echo form_error('deskrip') ?></td>
                  <td><textarea class="form-control" rows="3" name="deskrip" id="deskrip" placeholder="Deskrip"><?php echo $deskrip; ?></textarea></td>
                </tr>
                <tr>
                  <td>Icon <?php echo form_error('icon') ?></td>
                  <td><input type="text" class="form-control" name="icon" id="icon" placeholder="Icon" value="<?php echo $icon; ?>" /></td>
                </tr>
                <tr>
                  <td>Is Active <?php echo form_error('is_active') ?></td>
                  <td>
                    <select class="form-control" name="is_active" id="is_active" >
                      <option value="1" <?php echo $retVal = ($is_active=="1") ? "Selected" : "" ; ?>>Aktif</option>
                      <option value="0" <?php echo $retVal = ($is_active=="0") ? "Selected" : "" ; ?>>tidak</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Is Parent <?php echo form_error('is_parent') ?></td>
                  <td>
                      <?php echo cmb_dinamis('is_parent', 'menu', 'name', 'id', $is_parent) ?>
                  </td>
                  <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                </tr>
                <tr>
                  <td>Tipe <?php echo form_error('tipe') ?></td>
                  <td>
                    <select class="form-control" name="tipe" id="tipe" >
                      <option value="menu" <?php echo $retVal = ($tipe=="menu") ? "Selected" : "" ; ?>>Menu</option>
                      <option value="link" <?php echo $retVal = ($tipe=="link") ? "Selected" : "" ; ?>>Link</option>
                      <option value="pager" <?php echo $retVal = ($tipe=="pager") ? "Selected" : "" ; ?>>Pager</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td colspan='2'>
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                    <a href="<?php echo site_url('menu') ?>" class="btn btn-default">Cancel</a>
                  </td>
                </tr>
              </table>
            </form>
</div>