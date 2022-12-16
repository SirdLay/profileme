<div class="content-wrapper">

  <section class="content">

    <div class="row">
        <!-- Column -->
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-row">
                        <div class="round align-self-center round-success"><i class="icon-people"></i></div>
                        <div class="m-l-10 align-self-center">
                            <h2 class="m-b-0"><?php if(!empty($user)) {echo $user->total;}else{echo 0;} ?></h2>
                            <h5 class="text-muted m-b-0">Total User</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-row">
                        <div class="round align-self-center bg-primary"><i class="icon-user-following"></i></div>
                        <div class="m-l-10 align-self-center">
                            <h2 class="m-b-0"><?php if(!empty($user)) {echo $user->pro_user;}else{echo 0;} ?></h2>
                            <h5 class="text-muted m-b-0">Pro User</h5></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-row">
                        <div class="round align-self-center bg-info"><i class="icon-user"></i></div>
                        <div class="m-l-10 align-self-center">
                            <h2 class="m-b-0"><?php if(!empty($user)) {echo $user->free_user;}else{echo 0;} ?></h2>
                            <h5 class="text-muted m-b-0">Free User</h5></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-row">
                        <div class="round align-self-center bg-danger"><i class="icon-user-unfollow"></i></div>
                        <div class="m-l-10 align-self-center">
                            <h2 class="m-b-0"><?php if(!empty($user)) {echo $user->pending_user;}else{echo 0;} ?></h2>
                            <h5 class="text-muted m-b-0">Pending User</h5></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>


    <div class="row">
      
      <div class="col-xl-6 col-lg-6">
        <div class="box">
          <div class="box-header with-border">
              <h5 class="box-title">Recently joined Users</h5>
          </div>
          <div class="box-body p-0">
            <div class="media-list media-list-hover media-list-divided">
            
            <?php foreach ($users as $user): ?>
            
              <div class="media">
                <span class="avatar avatar-sm bg-info"><i class="icon-user"></i></span>
                <div class="media-body">
                <p>
                  <a class="hover-primary" href="#"><strong><?php echo html_escape($user->name) ?></strong></a>
                  <time class="float-right" datetime="<?php echo my_date_show($user->created_at) ?>"><?php echo get_time_ago($user->created_at) ?></time>
                </p>
                <p><?php echo html_escape($user->email); ?></p>
                <p>
                    <?php if ($user->account_type == 'pro'): ?>
                        <label class="label label-warning"><?php echo html_escape($user->account_type); ?></label>
                    <?php else: ?>
                        <label class="label label-info"><?php echo html_escape($user->account_type); ?></label>
                    <?php endif ?>
                
                    <?php if ($user->status == 1): ?>
                        <label class="label label-success"><i class="fa fa-check"></i> Verified</label>
                    <?php endif ?>
                </p>
                </div>
              </div>

            <?php endforeach ?>

              <div class="text-center bt-1 border-light p-2">
                <a class="text-uppercase d-block font-size-12" href="<?php echo base_url('admin/users') ?>">See all Users <i class="fa fa-long-arrow-right"></i></a>
              </div>

            </div>
          </div>
        </div>
      </div>
      <!-- /.col -->

    </div>

  </section>

</div>