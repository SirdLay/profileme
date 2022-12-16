
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">

  <div class="row">
    <!-- experience area -->
    <div class="col-md-4">
      <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Select your availeble days</h3>
        </div>

        <?php $days = get_days(); ?>

        <div class="box-body">
          <form method="post" class="validate-form" action="<?php echo base_url('admin/appointment/add')?>" role="form" enctype="multipart/form-data">
              
            <?php $m=0; $i=1; foreach ($days as $day): ?>
              <div class="form-group">
                  <input type="checkbox" id="md_checkbox_<?php echo $i; ?>" class="filled-in chk-col-blue" value="<?php echo $i; ?>" name="days[]" <?php if(isset($my_days[$m]) && $my_days[$m] == $i){echo "checked";} ?>>
                  <label for="md_checkbox_<?php echo $i; ?>"><?php echo $day ?></label>
              </div>
            <?php $m++; $i++; endforeach ?>

            <!-- csrf token -->
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
            
            <button type="submit" class="btn btn-info">Set Days</button>
          </form>
        </div>

      </div>
    </div>


    <!-- experience area -->
    <div class="col-md-8">
      <div class="box add_area">
        <div class="box-header with-border">
            <h3 class="box-title">Appointments </h3>
        </div>

        <div class="box-body">
        
          <table class="table table-bordered datatable" id="dg_table">
              <thead>
                  <tr>
                      <th>#</th>
                      <th>Title</th>
                      <th>Email</th>
                      <th>Date</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                <?php $i=1; foreach ($appointments as $amp): ?>
                  <tr id="row_<?php echo html_escape($amp->id); ?>">
                      
                      <td><?php echo $i; ?></td>
                      <td><?php echo html_escape($amp->title); ?></td>
                      <td><?php echo html_escape($amp->email); ?></td>
                      <td><?php echo my_date_show_time($amp->book_time); ?></td>
                      
                      <td class="actions" width="15%">
                        <a data-val="experience" data-id="<?php echo html_escape($amp->id); ?>" href="<?php echo base_url('admin/appointment/delete/'.html_escape($amp->id));?>" class="on-default remove-row delete_item" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o"></i></a>
                      </td>
                  </tr>
                  
                <?php $i++; endforeach; ?>
              </tbody>
          </table>

        </div>

      </div>
    </div>

  </div>

  </section>
</div>
