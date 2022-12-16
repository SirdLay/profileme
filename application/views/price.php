
<section class="section-padding" id="price-page">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="page-title">
                    <h2 class="title">Explore Our Pricing</h2>
                    <div class="desc">Select your comfortable plan</div>
                    <div class="space-60"></div>
                </div>
            </div>
        </div>
        <div class="row">

            <?php foreach ($packages as $package): ?>
                <div class="col-md-<?php echo 12 / count($packages) ?> col-sm-<?php echo 12 / count($packages) ?> col-xs-12 wow fadeInRight <?php if($package['is_special'] == 1){echo "special-pricing";} ?>" data-wow-delay="0.2s">
                    <div class="single-pricing">
                        <div class="price-type"><?php echo html_escape($package['name']) ?></div>
                        <div class="price-amount">$<?php echo round($package['price']) ?> <?php if($package['slug'] != 'free'){echo "<small>Per year</small>";} ?></div>
                        
                        <div class="price-features">
                            <ul>
                                <?php foreach ($package['features'] as $feature): ?>
                                    <li><?php echo html_escape($feature['name']) ?></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                        
                        <a href="<?php echo base_url('create-profile/'.html_escape($package['slug'])) ?>" class="bttn-1">Select Plan</a>
                    </div>
                    <div class="hidden visible-xs space-30"></div>
                </div>
            <?php endforeach ?>

        </div>
    </div>
</section><!-- /Pricing Area