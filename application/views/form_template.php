<div class="col-12 stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title"><?php echo $form_title; ?></h4>
      <form class="forms-sample" action="<?php echo $action; ?>" method="POST">
        <?php foreach ($form_config as $value) : ?>
        <div class="form-group row">
          <label for="<?php echo $value['field']; ?>" class="col-sm-3 col-form-label"><?php echo $value['label']; ?></label>
          <div class="col-sm-9">
            <span class="text-danger"><?php echo form_error($value['field']); ?></span>
            <input type="<?php echo $value['type']; ?>" class="form-control" name="<?php echo $value['field']; ?>" value= "<?php echo isset(${$value['field']}) ? ${$value['field']} : (($value['value'] == true) ? set_value($value['field']) : ""); ?>" <?php echo (($status == 'update') && (isset($value['id']) && ($value['id'] == true))) ? 'readonly' : ''; ?>>
          </div>
        </div>
        <?php endforeach; ?>
        <button type="submit" name="submit" value="Submit" class="btn btn-success mr-2">Submit</button>
        <button type="submit" name="submit" value="Cancel" class="btn btn-light">Cancel</button>
      </form>
    </div>
  </div>
</div>