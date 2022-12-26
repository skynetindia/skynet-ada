<?php

use Doctrine\DBAL\Schema\Schema;

return [
    'table' => [
        'mshop_blogs' => function( \Aimeos\Upscheme\Schema\Table $table ) {
            $table->engine = 'InnoDB';
            $table->id()->primary( 'pk_msblogs_id');
            $table->string( 'siteid', 255);
            $table->string( 'url',  255 );
            $table->string( 'label',  255 );
            $table->smallint( 'status');
            $table->datetime( 'ctime' );
            $table->datetime( 'mtime' );
            $table->string( 'editor', 255);
            $table->text( 'content' );
            $table->string( 'categories', 255 );
            $table->string( 'tags', 255 );
            $table->string( 'view_count', 255 );
            $table->smallint( 'user_id' );
            $table->string( 'most_view_count', 255 );
            $table->string( 'user_name',  255);
            $table->string( 'user_email',  255 );
            $table->text( 'featured_image');
            $table->integer( 'featured' );
        },
        'mshop_blogs_list_type' => function( \Aimeos\Upscheme\Schema\Table $table ) {
            $table->engine = 'InnoDB';
            $table->id()->primary( 'pk_msblogslity_id');
            $table->string( 'siteid',  255 );
            $table->string( 'domain', 32  );
            $table->string( 'code',  64)->charset('binary');
            $table->string( 'label', 255 );
            $table->integer( 'pos',  )->default(0);
            $table->smallint( 'status' );
            $table->datetime( 'mtime' );
            $table->datetime( 'ctime' );
            $table->string( 'editor', 255 );
            $table->unique( array( 'siteid', 'domain', 'code' ), 'unq_msblogslity_sid_dom_code' );
            $table->index( array( 'siteid', 'status', 'pos' ), 'idx_msblogslity_sid_status_pos' );
            $table->index( array( 'siteid', 'label' ), 'idx_msblogslity_sid_label' );
            $table->index( array( 'siteid', 'code' ), 'idx_msblogslity_sid_code' );
        },
        'mshop_blogs_list' => function( \Aimeos\Upscheme\Schema\Table $table ) {
            $table->engine= 'InnoDB' ;
            $table->id()->primary( 'pk_msblogsli_id');
            $table->integer( 'parentid' );
            $table->string( 'siteid',  255 );
            $table->string( 'key',  134)->default('')->charset('binary');
            $table->string( 'type', 64 )->charset('binary');
            $table->string( 'domain', 32 );
            $table->string( 'refid', 36)->charset('binary');
            $table->datetime( 'start')->null(true);
            $table->datetime( 'end')->null(true);
            $table->text( 'config', 0xffff );
            $table->integer( 'pos' );
            $table->smallint( 'status' );
            $table->datetime( 'mtime');
            $table->datetime( 'ctime');
            $table->string( 'editor',  255  );
            $table->unique( array( 'parentid', 'domain', 'siteid', 'type', 'refid' ), 'unq_msblogsli_pid_dm_sid_ty_rid' );
            $table->index( array( 'key', 'siteid' ), 'idx_msblogsli_key_sid' );
            $table->index( array( 'parentid' ), 'fk_msblogsli_pid' );
            $table->foreign( 'parentid','mshop_blogs','id' , 'fk_msblogsli_pid' );
        },
        'mshop_blogcategory' => function( \Aimeos\Upscheme\Schema\Table $table ) {
            $table->engine=(  'InnoDB' );
            $table->id()->primary( 'pk_msblogcategory_id');
            $table->string( 'siteid', 255 );
            $table->string( 'url',  255 );
            $table->string( 'label',  255);
            $table->smallint( 'status' );
            $table->datetime( 'ctime' );
            $table->datetime( 'mtime');
            $table->string( 'editor', 255 );
            $table->text( 'content' );
            $table->smallint( 'user_id');
            $table->smallint( 'position');
        },
        'mshop_blogcategory_list_type' => function( \Aimeos\Upscheme\Schema\Table $table ) {
            $table->engine=(  'InnoDB' );
            $table->id()->primary( 'pk_msblogcategorylity_id');
            $table->string( 'siteid',  255 );
            $table->string( 'domain', 32  );
            $table->string( 'code', 64)->charset('binary');
            $table->string( 'label', 255 );
            $table->integer( 'pos' )->default(0);
            $table->smallint( 'status' );
            $table->datetime( 'mtime' );
            $table->datetime( 'ctime' );
            $table->string( 'editor', 255 );
            $table->unique( array( 'siteid', 'domain', 'code' ), 'unq_msblogcategorylity_sid_dom_code' );
            $table->index( array( 'siteid', 'status', 'pos' ), 'idx_msblogcategorylity_sid_status_pos' );
            $table->index( array( 'siteid', 'label' ), 'idx_msblogcategorylity_sid_label' );
            $table->index( array( 'siteid', 'code' ), 'idx_msblogcategorylity_sid_code' );

        },
        'mshop_blogcategory_list' => function( \Aimeos\Upscheme\Schema\Table $table ) {

            $table->engine=(  'InnoDB' );
            $table->id()->primary( 'pk_msblogcategorylity_id');
            $table->integer( 'parentid' );
            $table->string( 'siteid', 255 );
            $table->string( 'key', 134 )->default('')->charset('binary');
            $table->string( 'type', 64 )->charset('binary');
            $table->string( 'domain', 32);
            $table->string( 'refid', 36 )->charset('binary');
            $table->datetime( 'start')->null(true);
            $table->datetime( 'end')->null(true);
            $table->text( 'config', 0xffff );
            $table->integer( 'pos' );
            $table->smallint( 'status');
            $table->datetime( 'mtime');
            $table->datetime( 'ctime' );
            $table->string( 'editor', 255);

            $table->unique( array( 'parentid', 'domain', 'siteid', 'type', 'refid' ), 'unq_msblogcategoryli_pid_dm_sid_ty_rid' );
            $table->index( array( 'key', 'siteid' ), 'idx_msblogcategoryli_key_sid' );
            $table->index( array( 'parentid' ), 'fk_msblogcategoryli_pid' );
            $table->foreign( 'parentid','mshop_blogcategory', 'id' , 'fk_msblogcategoryli_pid' );
        },
        'mshop_blogtag' => function( \Aimeos\Upscheme\Schema\Table $table ) {
            $table->engine=( 'InnoDB' );
            $table->id()->primary( 'pk_msblogtag_id');
            $table->string( 'siteid', 255 );
            $table->string( 'url', 255);
            $table->string( 'label', 255 );
            $table->smallint( 'status');
            $table->datetime( 'ctime',);
            $table->datetime( 'mtime');
            $table->string( 'editor', 255);
            $table->smallint( 'user_id' );
            $table->smallint( 'position' );
        },
        'mshop_blogtag_list_type' => function( \Aimeos\Upscheme\Schema\Table $table ) {
            $table->engine=( 'InnoDB' );
            $table->id()->primary( 'pk_msblogtaglity_id');
            $table->string( 'siteid', 255);
            $table->string( 'domain', 32 );
            $table->string( 'code', 64)->charset('binary');
            $table->string( 'label', 255 );
            $table->integer( 'pos')->default(0);
            $table->smallint( 'status');
            $table->datetime( 'mtime' );
            $table->datetime( 'ctime');
            $table->string( 'editor', 255 );
            $table->unique( array( 'siteid', 'domain', 'code' ), 'unq_msblogtaglity_sid_dom_code' );
            $table->index( array( 'siteid', 'status', 'pos' ), 'idx_msblogtaglity_sid_status_pos' );
            $table->index( array( 'siteid', 'label' ), 'idx_msblogtaglity_sid_label' );
            $table->index( array( 'siteid', 'code' ), 'idx_msblogtaglity_sid_code' );

        },
        'mshop_blogtag_list' => function( \Aimeos\Upscheme\Schema\Table $table ) {

            $table->engine=( 'InnoDB' );
            $table->id()->primary( 'pk_msblogtagli_id');
            $table->integer( 'parentid');
            $table->string( 'siteid', 255 );
            $table->string( 'key', 134 )->default('')->charset('binary');
            $table->string( 'type', 64 )->charset('binary');
            $table->string( 'domain', 32);
            $table->string( 'refid', 36 )->charset('binary');
            $table->datetime( 'start')->null(true);
            $table->datetime( 'end')->null(true);
            $table->text( 'config');
            $table->integer( 'pos' );
            $table->smallint( 'status' );
            $table->datetime( 'mtime' );
            $table->datetime( 'ctime' );
            $table->string( 'editor', 255 );
            $table->unique( array( 'parentid', 'domain', 'siteid', 'type', 'refid' ), 'unq_msblogtagli_pid_dm_sid_ty_rid' );
            $table->index( array( 'key', 'siteid' ), 'idx_msblogtagli_key_sid' );
            $table->index( array( 'parentid' ), 'fk_msblogtagli_pid' );
            $table->foreign( 'parentid','mshop_blogtag',  'id' , 'fk_msblogtagli_pid' );
        },
    ]
];
