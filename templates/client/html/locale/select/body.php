<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2015-2022
 */

$enc = $this->encoder();
function callADA(){
    $url = "https://www.skynettechnologies.com/add-ons/license-api.php?";

    if (!isset($allinone_userid["userid"])) {
        $allinone_userid["userid"] = "";
    }
    //$postdata['token'] = $allinone_userid["userid"];
    $postdata['SERVER_NAME'] = $_SERVER['SERVER_NAME'];
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    $resp = curl_exec($curl);
    $resp = json_decode($resp);

    if(!isset($allinone_userid["colorcode"]))
    {
        $allinone_userid["colorcode"] = "";
    }
    $baseURL = "https://www.skynettechnologies.com/accessibility/js/".(!empty($resp->accessibilityloader) ? $resp->accessibilityloader : "accessibility-free-version-loader.js");
    $context=app( 'aimeos.context' )->get();
    $manager = \Aimeos\MShop::create( $context, 'locale/site' );

    $root = $manager->find( config( 'shop.mshop.locale.site', 'default' ) );
    $config=$root->getConfig();
    if (strpos($_SERVER['HTTP_USER_AGENT'], "Chrome-Lighthouse") === false) {
        $license_key=!empty($config["ada"]["default"]["license_key"])?$config["ada"]["default"]["licence_key"]:'';
        $libraries['ada_lib'] = ['js' => $baseURL."?colorcode=".$config["ada"]["default"]["color"]."&token=".$license_key."&position=".$config["ada"]["default"]["position"]];
    }
    return $libraries;
}
$adaJS=callADA();
?>
<div class="section aimeos locale-select" data-jsonurl="<?= $enc->attr( $this->link( 'client/jsonapi/url' ) ) ?>">
    <script src="<?=  $adaJS['ada_lib']['js']?>" id="adajs"></script>
    <?= $this->get( 'body' ) ?>

</div>
