<?php

/**
 * @copyright Aimeos GmbH (aimeos.com), 2022
 * @package Admin
 * @subpackage JQAdm
 */


namespace Aimeos\Admin\JQAdm\Settings\Ada;

sprintf( 'ada' ); // for translation


/**
 * Default implementation of settings ada JQAdm client.
 *
 * @package Admin
 * @subpackage JQAdm
 */
class Standard
	extends \Aimeos\Admin\JQAdm\Common\Admin\Factory\Base
	implements \Aimeos\Admin\JQAdm\Common\Admin\Factory\Iface
{
	/**
	 * Saves the data
	 *
	 * @return string|null HTML output
	 */
	public function save() : ?string
	{
		$context = $this->context();
		$site = $context->locale()->getSiteItem();
		$site->setConfigValue( 'ada', $this->view()->param( 'ada', [] ) );

		return null;
	}


	/**
	 * Returns the resource
	 *
	 * @return string|null HTML output
	 */
	public function search() : ?string
	{
		$context = $this->context();
		$site = $context->locale()->getSiteItem();

		$adaData = $context->config()->get( 'client/html/ada-presets', [] );
		$adaData = array_replace_recursive( $adaData, $site->getConfigValue( 'ada', [] ) );
		$view = $this->object()->data( $this->view() );
		$view->adaData = $adaData;

		return $this->render( $view );
	}


	/**
	 * Returns the sub-client given by its name.
	 *
	 * @param string $type Name of the client type
	 * @param string|null $name Name of the sub-client (Default if null)
	 * @return \Aimeos\Admin\JQAdm\Iface Sub-client object
	 */
	public function getSubClient( string $type, string $name = null ) : \Aimeos\Admin\JQAdm\Iface
	{
		return $this->createSubClient( 'settings/ada/' . $type, $name );
	}


	/**
	 * Returns the list of sub-client names configured for the client.
	 *
	 * @return array List of JQAdm client names
	 */
	protected function getSubClientNames() : array
	{
		return $this->context()->config()->get( 'admin/jqadm/settings/ada/subparts', [] );
	}


	/**
	 * Returns the rendered template including the view data
	 *
	 * @param \Aimeos\Base\View\Iface $view View object with data assigned
	 * @return string HTML output
	 */
	protected function render( \Aimeos\Base\View\Iface $view ) : string
	{
		$tplconf = 'admin/jqadm/settings/ada/template-item';
		$default = 'settings/item-ada';

		return $view->render( $view->config( $tplconf, $default ) );
	}
}
