<?php

namespace Aimeos\Upscheme\Task;

class Blogs extends Base
{


    public function up()
    {
        $this->info('Creating blog tables');
        $ds = DIRECTORY_SEPARATOR;
        $db = $this->db( 'db-blog' );
        $files = [
            'db-blog' => 'default' . $ds . 'schema' . $ds . 'blog.php',
            'db-likecomment' => 'default' . $ds . 'schema' . $ds . 'likecomment.php'
        ];
        foreach( $files as $filepath )
        {
            if( ( $list = include( $filepath ) ) === false ) {
                throw new \RuntimeException( sprintf( 'Unable to get schema from file "%1$s"', $filepath ) );
            }

            foreach( $list['table'] ?? [] as $name => $fcn ) {
                $db->table( $name, $fcn );
            }
        }

    }
}
