<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2021-2022
 */

$selected = function( $key, $code ) {
	return ( $key == $code ? 'selected="selected"' : '' );
};

$enc = $this->encoder();

$accPositionArr=["top_left"=>"Top Left","top_center"=>"Top Center","top_right"=>"Top Right","middel_left"=>"Middle Left","middel_center"=>"Middle Center","middel_right"=>"Middle Right","bottom_left"=>"Bottom Left","bottom_center"=>"Bottom Center","bottom_right"=>"Bottom Right"];
?>
<div id="ada" class="item-ada tab-pane fade" role="tabpanel" aria-labelledby="ada">

	<div class="row">
			<div class="col-lg-6">
				<div class="box">
					<h2 class="item-header">All In One Accessibilty Setting</h2>

                    <div class="form-group row mandatory">
                        <label class="col-sm-2 form-control-label help"><?= $enc->html( $this->translate( 'admin', 'Color' ) ) ?></label>
                        <div class="col-sm-8">
                            <input class="form-control" type="color" required="required" tabindex="1"
                                   name="<?= $enc->attr( $this->formparam( array( 'ada', 'default','color' ) ) ) ?>"
                                   placeholder="<?= $enc->attr( $this->translate( 'admin', 'Default Color' ) ) ?>"
                                   value="<?= $enc->attr($this->get( 'adaData/default/color' )) ?>">
                        </div>
                        <div class="col-sm-12 form-text text-muted help-text">
                            <?= $enc->html( $this->translate( 'admin', 'Color' ) ) ?>
                        </div>
                    </div>
                    <div class="form-group row mandatory">
                        <label class="col-sm-8 form-control-label help"><?= $enc->html( $this->translate( 'admin', 'Where would you like to place accessbility icon' ) ) ?></label>
                        <?php foreach($accPositionArr as $key=>$position):?>
                            <div class="form-check">
                                <input type="radio" id="edit-position-<?= $key?>"  name="<?= $enc->attr( $this->formparam( array( 'ada', 'default','position' ) ) ) ?>" value="<?= $key?>" class="form-radio" <?php echo $this->get( 'adaData/default/position' )==$key?"checked":null;?> >
                                <label class="form-check-label" for="edit-position-<?= $key?>">
                                    <?= $position?>
                                </label>
                            </div>
                        <?php endforeach;?>
                        <div class="col-sm-12 form-text text-muted help-text">
                            <?= $enc->html( $this->translate( 'admin', 'Where would you like to place accessbility icon' ) ) ?>
                        </div>
                    </div>
                    <div class="form-group row mandatory">
                        <label class="col-sm-3 form-control-label help"><?= $enc->html( $this->translate( 'admin', 'License Key' ) ) ?></label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" required="required" tabindex="1"
                                   name="<?= $enc->attr( $this->formparam( array( 'ada', 'default','license_key' ) ) ) ?>"
                                   placeholder="<?= $enc->attr( $this->translate( 'admin', 'License Key' ) ) ?>"
                                   value="<?= $enc->attr($this->get( 'adaData/default/license_key' )) ?>">
                        </div>
                        <div class="col-sm-12 form-text text-muted help-text">
                            <?= $enc->html( $this->translate( 'admin', 'License Key' ) ) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="content" data-orginal-font-size="16" data-orginal-line-height="24" data-orginal-letter-spacing="0">
                            <div class="heading-wrapper" data-orginal-font-size="16" data-orginal-line-height="24" data-orginal-letter-spacing="0">
                                <span data-orginal-font-size="17" data-orginal-line-height="25.5" data-orginal-letter-spacing="0">Unlock Accessibility, Compliance &amp; Your Site’s Full Potential</span>
                                <h2 data-orginal-font-size="46" data-orginal-line-height="55.2" data-orginal-letter-spacing="0">Select Your Accessibility Plan</h2></div>
                            <div class="price-packages" data-orginal-font-size="16" data-orginal-line-height="24" data-orginal-letter-spacing="0">
                                <div class="package" data-orginal-font-size="16" data-orginal-line-height="24" data-orginal-letter-spacing="0">
                                    <div class="inner-wrapper" data-orginal-font-size="16" data-orginal-line-height="24" data-orginal-letter-spacing="0">
                                        <!--<img alt="Icon of Small Site" height="105.7" loading="lazy" src="https://www.skynettechnologies.com/libraries/bootstrap/images/small-site-icon.svg" width="93.64">-->
                                        <h3 data-orginal-font-size="30" data-orginal-line-height="36" data-orginal-letter-spacing="0">Small Site</h3>
                                        <div class="view" data-orginal-font-size="18" data-orginal-line-height="32.4" data-orginal-letter-spacing="0">Up to <span data-orginal-font-size="18" data-orginal-line-height="32.4" data-orginal-letter-spacing="0">50K</span><br>Pageviews per month</div>
                                        <div class="price" data-orginal-font-size="42" data-orginal-line-height="63" data-orginal-letter-spacing="0">$250/year</div><a class="btn btn-primary" href="https://www.skynettechnologies.com/add-ons/cart/?add-to-cart=116&amp;variation_id=117&amp;quantity=1" data-orginal-font-size="18" data-orginal-line-height="27" data-orginal-letter-spacing="0">Buy</a></div></div>
                                <div class="package highlight" data-orginal-font-size="16" data-orginal-line-height="24" data-orginal-letter-spacing="0"><div class="inner-wrapper" data-orginal-font-size="16" data-orginal-line-height="24" data-orginal-letter-spacing="0">
                                        <!--<img alt="Icon of Medium Site" height="105.7" loading="lazy" src="https://www.skynettechnologies.com/libraries/bootstrap/images/medium-site-icon.svg" width="93.64">-->
                                        <h3 data-orginal-font-size="30" data-orginal-line-height="36" data-orginal-letter-spacing="0">Medium Site</h3>
                                        <div class="view" data-orginal-font-size="18" data-orginal-line-height="32.4" data-orginal-letter-spacing="0">Up to <span data-orginal-font-size="18" data-orginal-line-height="32.4" data-orginal-letter-spacing="0">100K</span><br>Pageviews per month</div>
                                        <div class="price" data-orginal-font-size="42" data-orginal-line-height="63" data-orginal-letter-spacing="0">$490/year</div>
                                        <a class="btn btn-primary" href="https://www.skynettechnologies.com/add-ons/cart/?add-to-cart=116&amp;variation_id=118&amp;quantity=1" data-orginal-font-size="18" data-orginal-line-height="27" data-orginal-letter-spacing="0">Buy</a></div></div>
                                <div class="package" data-orginal-font-size="16" data-orginal-line-height="24" data-orginal-letter-spacing="0"><div class="inner-wrapper" data-orginal-font-size="16" data-orginal-line-height="24" data-orginal-letter-spacing="0">
                                        <!--<img alt="Icon of Large Site" height="105.7" loading="lazy" src="https://www.skynettechnologies.com/libraries/bootstrap/images/large-site-icon.svg" width="93.64">-->
                                        <h3 data-orginal-font-size="30" data-orginal-line-height="36" data-orginal-letter-spacing="0">Large Site</h3>
                                        <div class="view" data-orginal-font-size="18" data-orginal-line-height="32.4" data-orginal-letter-spacing="0">Up to <span data-orginal-font-size="18" data-orginal-line-height="32.4" data-orginal-letter-spacing="0">500K</span><br>Pageviews per month</div>
                                        <div class="price" data-orginal-font-size="42" data-orginal-line-height="63" data-orginal-letter-spacing="0">$999/year</div><a class="btn btn-primary" href="https://www.skynettechnologies.com/add-ons/cart/?add-to-cart=116&amp;variation_id=119&amp;quantity=1" data-orginal-font-size="18" data-orginal-line-height="27" data-orginal-letter-spacing="0">Buy</a></div></div></div>
                            <div class="includes-wrapper" data-orginal-font-size="16" data-orginal-line-height="24" data-orginal-letter-spacing="0"><div class="left" data-orginal-font-size="16" data-orginal-line-height="24" data-orginal-letter-spacing="0">
                                    <!--<img alt="Icon of Contact" class="img-fluid" height="150" loading="lazy" src="https://www.skynettechnologies.com/libraries/bootstrap/images/noun-digital-enterprise.svg" width="150">-->
                                </div>
                                <div class="right" data-orginal-font-size="16" data-orginal-line-height="24" data-orginal-letter-spacing="0"><h3 data-orginal-font-size="22" data-orginal-line-height="26.4" data-orginal-letter-spacing="0">Looking for enterprise or custom accessibility solutions?</h3><a href="https://www.skynettechnologies.com/contact-us" data-orginal-font-size="18" data-orginal-line-height="27" data-orginal-letter-spacing="0">Contact Us</a></div>
                            </div>
                        </div>
                    </div>
				</div>
			</div>

		<div class="col-12">
			<?php if( empty( $this->get( 'themeData' ) ) ) : ?>
				<?= $enc->html( $this->translate( 'admin', 'No theme options available' ) ) ?>
			<?php endif ?>
		</div>

	</div>

</div>
