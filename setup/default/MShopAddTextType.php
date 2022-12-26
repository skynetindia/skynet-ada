<?php


/**
 * @license LGPLv3, https://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2021-2022
 */


namespace Aimeos\Upscheme\Task;


/**
 * Adds demo records to catalog tables.
 */
class MShopAddTextType extends Base
{
    /**
     * Returns the list of task names which this task depends on.
     *
     * @return string[] List of task names
     */
    public function after(): array
    {
        return ['MShopSetLocale', 'MShopAddTypeData'];
    }


    /**
     * Insert catalog nodes and relations.
     */
    public function up()
    {


        $this->add();
    }
    protected function add( string $filename = null )
    {
        $context = $this->context();
        $sitecode = $context->locale()->getSiteItem()->getCode();

        $this->info( sprintf( 'Adding MShop type data for site "%1$s"', $sitecode ), 'vv' );

        if( !$filename )
        {
            $ds = DIRECTORY_SEPARATOR;
            $filename = __DIR__ .  $ds . 'data' . $ds . 'type.php';
        }
        if( ( $data = include( $filename ) ) == false ) {
            throw new \RuntimeException( sprintf( 'No type file found in "%1$s"', $filename ) );
        }

        $this->update( $data );
    }
    protected function existing( string $domain, array $entries ) : array
    {
        $prefix = str_replace( '/', '.', $domain ) . '.';
        $manager = $this->manager( $domain );
        $filter = $manager->filter();
        $expr = $map = [];

        foreach( $entries as $entry )
        {
            $expr[] = $filter->and( [
                $filter->is( $prefix . 'domain', '==', $entry['domain'] ),
                $filter->is( $prefix . 'code', '==', $entry['code'] )
            ] );
        }

        $filter->add( $filter->or( $expr ) );

        foreach( $manager->search( $filter ) as $id => $item ) {
            $map[$item->getDomain()][$item->getCode()][$id] = $item;
        }

        return $map;
    }


    protected function manager( $domain ) : \Aimeos\MShop\Common\Manager\Iface
    {
        return \Aimeos\MShop::create( $this->context(), $domain );
    }


    protected function update( array $data )
    {
        foreach( $data as $domain => $entries )
        {
            $this->info( sprintf( 'Checking "%1$s" type data', $domain ), 'vv' );

            $manager = $this->manager( $domain );
            $map = $this->existing( $domain, $entries );

            foreach( $entries as $entry )
            {
                if( isset( $map[$entry['domain']][$entry['code']] ) ) {
                    continue;
                }

                $item = $manager->create()
                    ->setCode( $entry['code'] )
                    ->setDomain( $entry['domain'] )
                    ->setLabel( $entry['label'] )
                    ->setStatus( $entry['status'] );

                $manager->save( $item );
            }
        }
    }





}
