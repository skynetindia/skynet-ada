<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2021-2022
 */

$selected = function ($key, $code) {
    return ($key == $code ? 'selected="selected"' : '');
};

$enc = $this->encoder();

$accPositionArr = ["top_left" => "Top Left", "top_center" => "Top Center", "top_right" => "Top Right", "middel_left" => "Middle Left", "middel_center" => "Middle Center", "middel_right" => "Middle Right", "bottom_left" => "Bottom Left", "bottom_center" => "Bottom Center", "bottom_right" => "Bottom Right"];
?>
<div id="ada" class="item-ada tab-pane fade" role="tabpanel" aria-labelledby="ada">

    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <h2 class="item-header">All In One Accessibilty Setting</h2>
                
                <?php if (empty(trim($enc->attr($this->get('adaData/default/license_key'))))) { ?> <div class="alert alert-warning">
                    <p class="mb-0">You are currently using Free version which have limited features. </br>Please <a href="https://www.skynettechnologies.com/add-ons/product/all-in-one-accessibility/">Sign up</a> and get License Key for additional features on the ADA Widget.</p>
                </div><?php } ?>
                <div class="col-sm-12 form-text text-muted help-text">
                    <?= $enc->html($this->translate('admin', 'License Key')) ?>

                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group row mandatory">
                            <label class="col-sm-4 form-control-label help"><?= $enc->html($this->translate('admin', 'Color')) ?></label>
                            <div class="col-sm-8">
                                <input class="form-control" type="color" required="required" tabindex="1" name="<?= $enc->attr($this->formparam(array('ada', 'default', 'color'))) ?>" placeholder="<?= $enc->attr($this->translate('admin', 'Default Color')) ?>" value="<?= $enc->attr($this->get('adaData/default/color')) ?>">
                            </div>
                            <div class="col-sm-12 form-text text-muted help-text">
                                <?= $enc->html($this->translate('admin', 'Color')) ?>
                            </div>
                        </div>
                        <div class="form-group row mandatory">
                            <label class="col-sm-4 form-control-label help"><?= $enc->html($this->translate('admin', 'License Key')) ?></label>
                            <div class="col-sm-8">
                                <input class="form-control" type="text" tabindex="1" name="<?= $enc->attr($this->formparam(array('ada', 'default', 'license_key'))) ?>" placeholder="<?= $enc->attr($this->translate('admin', 'License Key')) ?>" value="<?= $enc->attr($this->get('adaData/default/license_key')) ?>">
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row mandatory">
                            <label class="col-sm-12 form-control-label help" style="justify-content: flex-start;"><?= $enc->html($this->translate('admin', 'Where would you like to place accessbility icon')) ?></label>
                            <div class="form-check-wrapper" style="column-count: 2; column-gap: 20px; row-gap: 20px;">
                                <?php foreach ($accPositionArr as $key => $position) : ?>
                                    <div class="form-check" style="padding-left: 0;">
                                        <input type="radio" id="edit-position-<?= $key ?>" name="<?= $enc->attr($this->formparam(array('ada', 'default', 'position'))) ?>" value="<?= $key ?>" class="form-radio" <?php echo $this->get('adaData/default/position') == $key ? "checked" : null; ?>>
                                        <label class="form-check-label" for="edit-position-<?= $key ?>">
                                            <?= $position ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="col-sm-12 form-text text-muted help-text">
                                <?= $enc->html($this->translate('admin', 'Where would you like to place accessbility icon')) ?>
                            </div>
                        </div>
                    </div>
                </div>


                
                    <div class="content">
                        <div class="heading-wrapper text-center">
                            <span class="text-muted">Unlock Accessibility, Compliance &amp; Your Site’s Full Potential</span>
                            <h2 class="h1">Select Your Accessibility Plan</h2>
                        </div>
                        <div class="row text-center">
                            <div class="col">
                                <div class="border p-3">
                                    <!--<img alt="Icon of Small Site" height="105.7" loading="lazy" src="https://www.skynettechnologies.com/libraries/bootstrap/images/small-site-icon.svg" width="93.64">-->
                                    <h3 class="text-primary">Small Site</h3>
                                    <div class="text-muted mb-2" style="line-height:1"><small> Up to <span  >50K</span><br>Pageviews per month </small>  </div>
                                    <div class="fs-3 fw-bold mb-2"  >$250/year</div>
                                    <a class="btn btn-primary w-100 text-uppercase fw-bold" href="https://www.skynettechnologies.com/add-ons/cart/?add-to-cart=116&amp;variation_id=117&amp;quantity=1" data-orginal-font-size="18" data-orginal-line-height="27" >Buy</a></div></div>
                            <div class="col">
                                <div class="border p-3">
                                    <!--<img alt="Icon of Medium Site" height="105.7" loading="lazy" src="https://www.skynettechnologies.com/libraries/bootstrap/images/medium-site-icon.svg" width="93.64">-->
                                    <h3  class="text-primary">Medium Site</h3>
                                    <div class="text-muted mb-2" style="line-height:1"><small>Up to <span  >100K</span><br>Pageviews per month </small> </div>
                                    <div class="fs-3 fw-bold mb-2"  >$490/year</div>
                                    <a class="btn btn-primary w-100 text-uppercase fw-bold" href="https://www.skynettechnologies.com/add-ons/cart/?add-to-cart=116&amp;variation_id=118&amp;quantity=1" data-orginal-font-size="18" data-orginal-line-height="27" >Buy</a></div></div>
                            <div class="col">
                                <div class="border p-3">
                                    <!--<img alt="Icon of Large Site" height="105.7" loading="lazy" src="https://www.skynettechnologies.com/libraries/bootstrap/images/large-site-icon.svg" width="93.64">-->
                                    <h3 class="text-primary" >Large Site</h3>
                                    <div class="text-muted mb-2" style="line-height:1" ><small>Up to <span  >500K</span><br>Pageviews per month </small></div>
                                    <div class="fs-3 fw-bold mb-2"  >$999/year</div>
                                    <a class="btn btn-primary w-100 text-uppercase fw-bold" href="https://www.skynettechnologies.com/add-ons/cart/?add-to-cart=116&amp;variation_id=119&amp;quantity=1" data-orginal-font-size="18" data-orginal-line-height="27" >Buy</a></div></div></div>
                        <div class="includes-wrapper"><div class="left">
                                <!--<img alt="Icon of Contact" class="img-fluid" height="150" loading="lazy" src="https://www.skynettechnologies.com/libraries/bootstrap/images/noun-digital-enterprise.svg" width="150">-->
                            </div>

                        </div>
                    </div>
                

                <div class="p-4 bg-ligh text-center" style="background-color: #f7f7f7; border-radius: 10px;">
                    <h4 class="mb-3">Looking for enterprise or custom accessibility solutions?</h4>
                    <a class="btn btn-primary text-uppercase fw-bold" href="https://www.skynettechnologies.com/contact-us">Contact Us</a>
                </div>

            </div>
        </div>

        <div class="col-12">
            <?php if (empty($this->get('themeData'))) : ?>
                <?= $enc->html($this->translate('admin', 'No theme options available')) ?>
            <?php endif ?>
        </div>

    </div>

</div>
