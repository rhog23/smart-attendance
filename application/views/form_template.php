<div class="col-12 stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Horizontal Form</h4>
      <p class="card-description">
        Horizontal form layout
      </p>
      <form class="forms-sample" action="<?php echo $action; ?>" method="POST">
        <?php foreach ($form_config as $value) : ?>
        <div class="form-group row">
          <label for="<?php echo $value['field']; ?>" class="col-sm-3 col-form-label"><?php echo $value['label']; ?></label>
          <div class="col-sm-9">
            <input type="<?php echo $value['type']; ?>" class="form-control" name="<?php echo $value['field']; ?>">
          </div>
        </div>
        <?php endforeach; ?>
        <button type="submit" name="submit" class="btn btn-success mr-2">Submit</button>
        <button type="submit" name="cancel" class="btn btn-light">Cancel</button>
      </form>
    </div>
  </div>
</div>