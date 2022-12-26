<?php

use Doctrine\DBAL\Schema\Schema;

return [
    'table' => [
        'mshop_likecomment' => function( \Aimeos\Upscheme\Schema\Table $table ) {

            $table->engine=( 'InnoDB' );
            $table->id()->primary( 'pk_mslikecomment_id');

            $table->string( 'siteid',  255 );
            $table->string( 'likeunlike',  11);
            $table->string( 'customerid', 36 );
            $table->string( 'refid', 36 );
            $table->smallint( 'status' );
            $table->datetime( 'ctime' );
            $table->datetime( 'mtime' );
            $table->string( 'editor', 255);
            $table->smallint( 'type' );
            $table->text( 'comment' );
            $table->string( 'name', 150 );
            $table->string( 'email',  255 );
            $table->string( 'ip_address',  255);
            $table->integer( 'parent_id');
            $table->integer( 'approved' );
            $table->string( 'agent', 255 );
            $table->string( 'url' ,255 );


        },
    ]
];
