<?php

return [
    'blogs' => [
        'manager' => array(
            'lists' => array(
                'type' => array(
                    'delete' => array(
                        'ansi' => '
						DELETE FROM "mshop_blogs_list_type"
						WHERE :cond AND siteid = ?
					'
                    ),
                    'insert' => array(
                        'ansi' => '
						INSERT INTO "mshop_blogs_list_type" ( :names
							"code", "domain", "label", "pos", "status",
							"mtime", "editor", "siteid", "ctime"
						) VALUES ( :values
							?, ?, ?, ?, ?, ?, ?, ?, ?
						)
					'
                    ),
                    'update' => array(
                        'ansi' => '
						UPDATE "mshop_blogs_list_type"
						SET :names
							"code" = ?, "domain" = ?, "label" = ?, "pos" = ?,
							"status" = ?, "mtime" = ?, "editor" = ?
						WHERE "siteid" = ? AND "id" = ?
					'
                    ),
                    'search' => array(
                        'ansi' => '
						SELECT :columns
							mprolity."id" AS "blogs.lists.type.id", mprolity."siteid" AS "blogs.lists.type.siteid",
							mprolity."code" AS "blogs.lists.type.code", mprolity."domain" AS "blogs.lists.type.domain",
							mprolity."label" AS "blogs.lists.type.label", mprolity."status" AS "blogs.lists.type.status",
							mprolity."mtime" AS "blogs.lists.type.mtime", mprolity."editor" AS "blogs.lists.type.editor",
							mprolity."ctime" AS "blogs.lists.type.ctime", mprolity."pos" AS "blogs.lists.type.position"
						FROM "mshop_blogs_list_type" AS mprolity
						:joins
						WHERE :cond
						ORDER BY :order
						OFFSET :start ROWS FETCH NEXT :size ROWS ONLY
					',
                        'mysql' => '
						SELECT :columns
							mprolity."id" AS "blogs.lists.type.id", mprolity."siteid" AS "blogs.lists.type.siteid",
							mprolity."code" AS "blogs.lists.type.code", mprolity."domain" AS "blogs.lists.type.domain",
							mprolity."label" AS "blogs.lists.type.label", mprolity."status" AS "blogs.lists.type.status",
							mprolity."mtime" AS "blogs.lists.type.mtime", mprolity."editor" AS "blogs.lists.type.editor",
							mprolity."ctime" AS "blogs.lists.type.ctime", mprolity."pos" AS "blogs.lists.type.position"
						FROM "mshop_blogs_list_type" AS mprolity
						:joins
						WHERE :cond
						ORDER BY :order
						LIMIT :size OFFSET :start
					'
                    ),
                    'count' => array(
                        'ansi' => '
						SELECT COUNT(*) AS "count"
						FROM (
							SELECT mprolity."id"
							FROM "mshop_blogs_list_type" AS mprolity
							:joins
							WHERE :cond
							ORDER BY mprolity."id"
							OFFSET 0 ROWS FETCH NEXT 10000 ROWS ONLY
						) AS list
					',
                        'mysql' => '
						SELECT COUNT(*) AS "count"
						FROM (
							SELECT mprolity."id"
							FROM "mshop_blogs_list_type" AS mprolity
							:joins
							WHERE :cond
							ORDER BY mprolity."id"
							LIMIT 10000 OFFSET 0
						) AS list
					'
                    ),
                    'newid' => array(
                        'db2' => 'SELECT IDENTITY_VAL_LOCAL()',
                        'mysql' => 'SELECT LAST_INSERT_ID()',
                        'oracle' => 'SELECT mshop_blogs_list_type_seq.CURRVAL FROM DUAL',
                        'pgsql' => 'SELECT lastval()',
                        'sqlite' => 'SELECT last_insert_rowid()',
                        'sqlsrv' => 'SELECT @@IDENTITY',
                        'sqlanywhere' => 'SELECT @@IDENTITY',
                    ),
                ),
                'aggregate' => array(
                    'ansi' => '
					SELECT :keys, :type("val") AS "value"
					FROM (
						SELECT :acols, :val AS "val"
						FROM "mshop_blogs_list" AS mproli
						:joins
						WHERE :cond
						GROUP BY :cols, mproli."id"
						ORDER BY :order
						OFFSET :start ROWS FETCH NEXT :size ROWS ONLY
					) AS list
					GROUP BY :keys
				',
                    'mysql' => '
					SELECT :keys, :type("val") AS "value"
					FROM (
						SELECT :acols, :val AS "val"
						FROM "mshop_blogs_list" AS mproli
						:joins
						WHERE :cond
						GROUP BY :cols, mproli."id"
						ORDER BY :order
						LIMIT :size OFFSET :start
					) AS list
					GROUP BY :keys
				'
                ),
                'delete' => array(
                    'ansi' => '
					DELETE FROM "mshop_blogs_list"
					WHERE :cond AND siteid = ?
				'
                ),
                'insert' => array(
                    'ansi' => '
					INSERT INTO "mshop_blogs_list" ( :names
						"parentid", "key", "type", "domain", "refid", "start", "end",
						"config", "pos", "status", "mtime", "editor", "siteid", "ctime"
					) VALUES ( :values
						?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
					)
				'
                ),
                'update' => array(
                    'ansi' => '
					UPDATE "mshop_blogs_list"
					SET :names
						"parentid" = ?, "key" = ?, "type" = ?, "domain" = ?, "refid" = ?, "start" = ?,
						"end" = ?, "config" = ?, "pos" = ?, "status" = ?, "mtime" = ?, "editor" = ?
					WHERE "siteid" = ? AND "id" = ?
				'
                ),
                'search' => array(
                    'ansi' => '
					SELECT :columns
						mproli."id" AS "blogs.lists.id", mproli."parentid" AS "blogs.lists.parentid",
						mproli."siteid" AS "blogs.lists.siteid", mproli."type" AS "blogs.lists.type",
						mproli."domain" AS "blogs.lists.domain", mproli."refid" AS "blogs.lists.refid",
						mproli."start" AS "blogs.lists.datestart", mproli."end" AS "blogs.lists.dateend",
						mproli."config" AS "blogs.lists.config", mproli."pos" AS "blogs.lists.position",
						mproli."status" AS "blogs.lists.status", mproli."mtime" AS "blogs.lists.mtime",
						mproli."editor" AS "blogs.lists.editor", mproli."ctime" AS "blogs.lists.ctime"
					FROM "mshop_blogs_list" AS mproli
					:joins
					WHERE :cond
					ORDER BY :order
					OFFSET :start ROWS FETCH NEXT :size ROWS ONLY
				',
                    'mysql' => '
					SELECT :columns
						mproli."id" AS "blogs.lists.id", mproli."parentid" AS "blogs.lists.parentid",
						mproli."siteid" AS "blogs.lists.siteid", mproli."type" AS "blogs.lists.type",
						mproli."domain" AS "blogs.lists.domain", mproli."refid" AS "blogs.lists.refid",
						mproli."start" AS "blogs.lists.datestart", mproli."end" AS "blogs.lists.dateend",
						mproli."config" AS "blogs.lists.config", mproli."pos" AS "blogs.lists.position",
						mproli."status" AS "blogs.lists.status", mproli."mtime" AS "blogs.lists.mtime",
						mproli."editor" AS "blogs.lists.editor", mproli."ctime" AS "blogs.lists.ctime"
					FROM "mshop_blogs_list" AS mproli
					:joins
					WHERE :cond
					ORDER BY :order
					LIMIT :size OFFSET :start
				'
                ),
                'count' => array(
                    'ansi' => '
					SELECT COUNT(*) AS "count"
					FROM (
						SELECT mproli."id"
						FROM "mshop_blogs_list" AS mproli
						:joins
						WHERE :cond
						ORDER BY mproli."id"
						OFFSET 0 ROWS FETCH NEXT 10000 ROWS ONLY
					) AS list
				',
                    'mysql' => '
					SELECT COUNT(*) AS "count"
					FROM (
						SELECT mproli."id"
						FROM "mshop_blogs_list" AS mproli
						:joins
						WHERE :cond
						ORDER BY mproli."id"
						LIMIT 10000 OFFSET 0
					) AS list
				'
                ),
                'newid' => array(
                    'db2' => 'SELECT IDENTITY_VAL_LOCAL()',
                    'mysql' => 'SELECT LAST_INSERT_ID()',
                    'oracle' => 'SELECT mshop_blogs_list_seq.CURRVAL FROM DUAL',
                    'pgsql' => 'SELECT lastval()',
                    'sqlite' => 'SELECT last_insert_rowid()',
                    'sqlsrv' => 'SELECT @@IDENTITY',
                    'sqlanywhere' => 'SELECT @@IDENTITY',
                ),
            ),
            'delete' => array(
                'ansi' => '
					DELETE FROM "mshop_blogs"
					WHERE :cond AND siteid = ?
				'
            ),
            'insert' => array(
                'ansi' => '
					INSERT INTO "mshop_blogs" ( :names
						"url","label", "status", "mtime", "editor", "content","categories","tags","view_count","most_view_count","user_id","user_name","user_email","featured_image","featured","siteid", "ctime"
					) VALUES ( :values
						?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
					)
				'
            ),
            'update' => array(
                'ansi' => '
					UPDATE "mshop_blogs"
					SET :names
						"url"=?, "label" = ?, "status" = ?, "mtime" = ?, "editor" = ?, "content"= ?, "categories"=?, "tags"=?, "view_count"=?, "most_view_count"=?,
						"user_id"=?, "user_name"=?, "user_email"=?, "featured_image"=?, "featured"=?
					WHERE "siteid" = ? AND "id" = ?
				'
            ),
            'search' => array(
                'ansi' => '
					SELECT :columns
						mblogs."id" AS "blogs.id", mblogs."siteid" AS "blogs.siteid",
						mblogs."url" AS "blogs.url",mblogs."label" AS "blogs.label",
						mblogs."status" AS "blogs.status", mblogs."mtime" AS "blogs.mtime",
						mblogs."editor" AS "blogs.editor", mblogs."ctime" AS "blogs.ctime",
						mblogs."content" AS "blogs.content",
						mblogs."categories" AS "blogs.categories",
						mblogs."tags" AS "blogs.tags",
						mblogs."view_count" AS "blogs.view_count",
						mblogs."most_view_count" AS "blogs.most_view_count",
						mblogs."user_id" AS "blogs.user_id",
						mblogs."user_name" AS "blogs.user_name",
						mblogs."user_email" AS "blogs.user_email",
						mblogs."featured_image" AS "blogs.featured_image",
						mblogs."featured" AS "blogs.featured"
					FROM "mshop_blogs" AS mblogs
					:joins
					WHERE :cond
					GROUP BY :columns :group
						mblogs."id", mblogs."siteid", mblogs."url",mblogs."label",
						mblogs."status", mblogs."mtime", mblogs."editor", mblogs."ctime", mblogs."content", mblogs."categories",
						mblogs."tags",mblogs."view_count",mblogs."most_view_count",mblogs."user_id",mblogs."user_name",
						mblogs."user_email",mblogs."featured_image",mblogs."featured"
					ORDER BY :order
					OFFSET :start ROWS FETCH NEXT :size ROWS ONLY
				',
                'mysql' => '
					SELECT :columns
						mblogs."id" AS "blogs.id",
						mblogs."siteid" AS "blogs.siteid",
						mblogs."url" AS "blogs.url",month(mblogs."ctime") AS "blogs.blogmonth",
						mblogs."label" AS "blogs.label",
						mblogs."status" AS "blogs.status",
						mblogs."mtime" AS "blogs.mtime",
						mblogs."editor" AS "blogs.editor",
						mblogs."ctime" AS "blogs.ctime",
						mblogs."content" AS "blogs.content",
						mblogs."categories" AS "blogs.categories",
						mblogs."tags" AS "blogs.tags",
						mblogs."view_count" AS "blogs.view_count",
						mblogs."most_view_count" AS "blogs.most_view_count",
						mblogs."user_id" AS "blogs.user_id",
						mblogs."user_name" AS "blogs.user_name",
						mblogs."user_email" AS "blogs.user_email",
						mblogs."featured_image" AS "blogs.featured_image",
						mblogs."featured" AS "blogs.featured"
					FROM "mshop_blogs" AS mblogs
					:joins
					WHERE :cond
					GROUP BY :group mblogs."id"
					ORDER BY :order
					LIMIT :size OFFSET :start
				'
            ),
            'count' => array(
                'ansi' => '
					SELECT COUNT(*) AS "count"
					FROM (
						SELECT mblogs."id"
						FROM "mshop_blogs" AS mblogs
						:joins
						WHERE :cond
						GROUP BY mblogs."id"
						ORDER BY mblogs."id"
						OFFSET 0 ROWS FETCH NEXT 10000 ROWS ONLY
					) AS list
				',
                'mysql' => '
					SELECT COUNT(*) AS "count"
					FROM (
						SELECT mblogs."id"
						FROM "mshop_blogs" AS mblogs
						:joins
						WHERE :cond
						GROUP BY mblogs."id"
						ORDER BY mblogs."id"
						LIMIT 10000 OFFSET 0
					) AS list
				'
            ),
            'newid' => array(
                'db2' => 'SELECT IDENTITY_VAL_LOCAL()',
                'mysql' => 'SELECT LAST_INSERT_ID()',
                'oracle' => 'SELECT mshop_blogs_seq.CURRVAL FROM DUAL',
                'pgsql' => 'SELECT lastval()',
                'sqlite' => 'SELECT last_insert_rowid()',
                'sqlsrv' => 'SELECT @@IDENTITY',
                'sqlanywhere' => 'SELECT @@IDENTITY',
            ),
        ),
    ],
    'blogcategory' => [
        'manager' => array(
            'lists' => array(
                'type' => array(
                    'delete' => array(
                        'ansi' => '
						DELETE FROM "mshop_blogcategory_list_type"
						WHERE :cond AND siteid = ?
					'
                    ),
                    'insert' => array(
                        'ansi' => '
						INSERT INTO "mshop_blogcategory_list_type" ( :names
							"code", "domain", "label", "pos", "status",
							"mtime", "editor", "siteid", "ctime"
						) VALUES ( :values
							?, ?, ?, ?, ?, ?, ?, ?, ?
						)
					'
                    ),
                    'update' => array(
                        'ansi' => '
						UPDATE "mshop_blogcategory_list_type"
						SET :names
							"code" = ?, "domain" = ?, "label" = ?, "pos" = ?,
							"status" = ?, "mtime" = ?, "editor" = ?
						WHERE "siteid" = ? AND "id" = ?
					'
                    ),
                    'search' => array(
                        'ansi' => '
						SELECT :columns
							mprolity."id" AS "blogcategory.lists.type.id", mprolity."siteid" AS "blogcategory.lists.type.siteid",
							mprolity."code" AS "blogcategory.lists.type.code", mprolity."domain" AS "blogcategory.lists.type.domain",
							mprolity."label" AS "blogcategory.lists.type.label", mprolity."status" AS "blogcategory.lists.type.status",
							mprolity."mtime" AS "blogcategory.lists.type.mtime", mprolity."editor" AS "blogcategory.lists.type.editor",
							mprolity."ctime" AS "blogcategory.lists.type.ctime", mprolity."pos" AS "blogcategory.lists.type.position"
						FROM "mshop_blogcategory_list_type" AS mprolity
						:joins
						WHERE :cond
						ORDER BY :order
						OFFSET :start ROWS FETCH NEXT :size ROWS ONLY
					',
                        'mysql' => '
						SELECT :columns
							mprolity."id" AS "blogcategory.lists.type.id", mprolity."siteid" AS "blogcategory.lists.type.siteid",
							mprolity."code" AS "blogcategory.lists.type.code", mprolity."domain" AS "blogcategory.lists.type.domain",
							mprolity."label" AS "blogcategory.lists.type.label", mprolity."status" AS "blogcategory.lists.type.status",
							mprolity."mtime" AS "blogcategory.lists.type.mtime", mprolity."editor" AS "blogcategory.lists.type.editor",
							mprolity."ctime" AS "blogcategory.lists.type.ctime", mprolity."pos" AS "blogcategory.lists.type.position"
						FROM "mshop_blogcategory_list_type" AS mprolity
						:joins
						WHERE :cond
						ORDER BY :order
						LIMIT :size OFFSET :start
					'
                    ),
                    'count' => array(
                        'ansi' => '
						SELECT COUNT(*) AS "count"
						FROM (
							SELECT mprolity."id"
							FROM "mshop_blogcategory_list_type" AS mprolity
							:joins
							WHERE :cond
							ORDER BY mprolity."id"
							OFFSET 0 ROWS FETCH NEXT 10000 ROWS ONLY
						) AS list
					',
                        'mysql' => '
						SELECT COUNT(*) AS "count"
						FROM (
							SELECT mprolity."id"
							FROM "mshop_blogcategory_list_type" AS mprolity
							:joins
							WHERE :cond
							ORDER BY mprolity."id"
							LIMIT 10000 OFFSET 0
						) AS list
					'
                    ),
                    'newid' => array(
                        'db2' => 'SELECT IDENTITY_VAL_LOCAL()',
                        'mysql' => 'SELECT LAST_INSERT_ID()',
                        'oracle' => 'SELECT mshop_blogcategory_list_type_seq.CURRVAL FROM DUAL',
                        'pgsql' => 'SELECT lastval()',
                        'sqlite' => 'SELECT last_insert_rowid()',
                        'sqlsrv' => 'SELECT @@IDENTITY',
                        'sqlanywhere' => 'SELECT @@IDENTITY',
                    ),
                ),
                'aggregate' => array(
                    'ansi' => '
					SELECT :keys, :type("val") AS "value"
					FROM (
						SELECT :acols, :val AS "val"
						FROM "mshop_blogcategory_list" AS mproli
						:joins
						WHERE :cond
						GROUP BY :cols, mproli."id"
						ORDER BY :order
						OFFSET :start ROWS FETCH NEXT :size ROWS ONLY
					) AS list
					GROUP BY :keys
				',
                    'mysql' => '
					SELECT :keys, :type("val") AS "value"
					FROM (
						SELECT :acols, :val AS "val"
						FROM "mshop_blogcategory_list" AS mproli
						:joins
						WHERE :cond
						GROUP BY :cols, mproli."id"
						ORDER BY :order
						LIMIT :size OFFSET :start
					) AS list
					GROUP BY :keys
				'
                ),
                'delete' => array(
                    'ansi' => '
					DELETE FROM "mshop_blogcategory_list"
					WHERE :cond AND siteid = ?
				'
                ),
                'insert' => array(
                    'ansi' => '
					INSERT INTO "mshop_blogcategory_list" ( :names
						"parentid", "key", "type", "domain", "refid", "start", "end",
						"config", "pos", "status", "mtime", "editor", "siteid", "ctime"
					) VALUES ( :values
						?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
					)
				'
                ),
                'update' => array(
                    'ansi' => '
					UPDATE "mshop_blogcategory_list"
					SET :names
						"parentid" = ?, "key" = ?, "type" = ?, "domain" = ?, "refid" = ?, "start" = ?,
						"end" = ?, "config" = ?, "pos" = ?, "status" = ?, "mtime" = ?, "editor" = ?
					WHERE "siteid" = ? AND "id" = ?
				'
                ),
                'search' => array(
                    'ansi' => '
					SELECT :columns
						mproli."id" AS "blogcategory.lists.id", mproli."parentid" AS "blogcategory.lists.parentid",
						mproli."siteid" AS "blogcategory.lists.siteid", mproli."type" AS "blogcategory.lists.type",
						mproli."domain" AS "blogcategory.lists.domain", mproli."refid" AS "blogcategory.lists.refid",
						mproli."start" AS "blogcategory.lists.datestart", mproli."end" AS "blogcategory.lists.dateend",
						mproli."config" AS "blogcategory.lists.config", mproli."pos" AS "blogcategory.lists.position",
						mproli."status" AS "blogcategory.lists.status", mproli."mtime" AS "blogcategory.lists.mtime",
						mproli."editor" AS "blogcategory.lists.editor", mproli."ctime" AS "blogcategory.lists.ctime"
					FROM "mshop_blogcategory_list" AS mproli
					:joins
					WHERE :cond
					ORDER BY :order
					OFFSET :start ROWS FETCH NEXT :size ROWS ONLY
				',
                    'mysql' => '
					SELECT :columns
						mproli."id" AS "blogcategory.lists.id", mproli."parentid" AS "blogcategory.lists.parentid",
						mproli."siteid" AS "blogcategory.lists.siteid", mproli."type" AS "blogcategory.lists.type",
						mproli."domain" AS "blogcategory.lists.domain", mproli."refid" AS "blogcategory.lists.refid",
						mproli."start" AS "blogcategory.lists.datestart", mproli."end" AS "blogcategory.lists.dateend",
						mproli."config" AS "blogcategory.lists.config", mproli."pos" AS "blogcategory.lists.position",
						mproli."status" AS "blogcategory.lists.status", mproli."mtime" AS "blogcategory.lists.mtime",
						mproli."editor" AS "blogcategory.lists.editor", mproli."ctime" AS "blogcategory.lists.ctime"
					FROM "mshop_blogcategory_list" AS mproli
					:joins
					WHERE :cond
					ORDER BY :order
					LIMIT :size OFFSET :start
				'
                ),
                'count' => array(
                    'ansi' => '
					SELECT COUNT(*) AS "count"
					FROM (
						SELECT mproli."id"
						FROM "mshop_blogcategory_list" AS mproli
						:joins
						WHERE :cond
						ORDER BY mproli."id"
						OFFSET 0 ROWS FETCH NEXT 10000 ROWS ONLY
					) AS list
				',
                    'mysql' => '
					SELECT COUNT(*) AS "count"
					FROM (
						SELECT mproli."id"
						FROM "mshop_blogcategory_list" AS mproli
						:joins
						WHERE :cond
						ORDER BY mproli."id"
						LIMIT 10000 OFFSET 0
					) AS list
				'
                ),
                'newid' => array(
                    'db2' => 'SELECT IDENTITY_VAL_LOCAL()',
                    'mysql' => 'SELECT LAST_INSERT_ID()',
                    'oracle' => 'SELECT mshop_blogcategory_list_seq.CURRVAL FROM DUAL',
                    'pgsql' => 'SELECT lastval()',
                    'sqlite' => 'SELECT last_insert_rowid()',
                    'sqlsrv' => 'SELECT @@IDENTITY',
                    'sqlanywhere' => 'SELECT @@IDENTITY',
                ),
            ),
            'delete' => array(
                'ansi' => '
					DELETE FROM "mshop_blogcategory"
					WHERE :cond AND siteid = ?
				'
            ),
            'insert' => array(
                'ansi' => '
					INSERT INTO "mshop_blogcategory" ( :names
						"url","label", "status", "mtime", "editor","content","user_id","position","siteid", "ctime"
					) VALUES ( :values
						?, ?, ?, ?, ?, ?, ?, ?, ?, ?
					)
				'
            ),
            'update' => array(
                'ansi' => '
					UPDATE "mshop_blogcategory"
					SET :names
						"url"=?, "label" = ?, "status" = ?, "mtime" = ?, "editor" = ?, "content"= ?, "user_id"=?, "position"=?
					WHERE "siteid" = ? AND "id" = ?
				'
            ),
            'search' => array(
                'ansi' => '
					SELECT :columns
						mblogcategory."id" AS "blogcategory.id", mblogcategory."siteid" AS "blogcategory.siteid",
						mblogcategory."url" AS "blogcategory.url",mblogcategory."label" AS "blogcategory.label",
						mblogcategory."status" AS "blogcategory.status", mblogcategory."mtime" AS "blogcategory.mtime",
						mblogcategory."editor" AS "blogcategory.editor", mblogcategory."ctime" AS "blogcategory.ctime",
						mblogcategory."content" AS "blogcategory.content",
						mblogcategory."user_id" AS "blogcategory.user_id",
						mblogcategory."position" AS "blogcategory.position"
					FROM "mshop_blogcategory" AS mblogcategory
					:joins
					WHERE :cond
					GROUP BY :columns :group
						mblogcategory."id", mblogcategory."siteid", mblogcategory."url",mblogcategory."label",
						mblogcategory."status", mblogcategory."mtime", mblogcategory."editor", mblogcategory."ctime", mblogcategory."content",
						mblogcategory."user_id",mblogcategory."position"
					ORDER BY :order
					OFFSET :start ROWS FETCH NEXT :size ROWS ONLY
				',
                'mysql' => '
					SELECT :columns
						mblogcategory."id" AS "blogcategory.id",
						mblogcategory."siteid" AS "blogcategory.siteid",
						mblogcategory."url" AS "blogcategory.url",
						mblogcategory."label" AS "blogcategory.label",
						mblogcategory."status" AS "blogcategory.status",
						mblogcategory."mtime" AS "blogcategory.mtime",
						mblogcategory."editor" AS "blogcategory.editor",
						mblogcategory."ctime" AS "blogcategory.ctime",
						mblogcategory."content" AS "blogcategory.content",
						mblogcategory."user_id" AS "blogcategory.user_id",
						mblogcategory."position" AS "blogcategory.position"
					FROM "mshop_blogcategory" AS mblogcategory
					:joins
					WHERE :cond
					GROUP BY :group mblogcategory."id"
					ORDER BY :order
					LIMIT :size OFFSET :start
				'
            ),
            'count' => array(
                'ansi' => '
					SELECT COUNT(*) AS "count"
					FROM (
						SELECT mblogcategory."id"
						FROM "mshop_blogcategory" AS mblogcategory
						:joins
						WHERE :cond
						GROUP BY mblogcategory."id"
						ORDER BY mblogcategory."id"
						OFFSET 0 ROWS FETCH NEXT 10000 ROWS ONLY
					) AS list
				',
                'mysql' => '
					SELECT COUNT(*) AS "count"
					FROM (
						SELECT mblogcategory."id"
						FROM "mshop_blogcategory" AS mblogcategory
						:joins
						WHERE :cond
						GROUP BY mblogcategory."id"
						ORDER BY mblogcategory."id"
						LIMIT 10000 OFFSET 0
					) AS list
				'
            ),
            'newid' => array(
                'db2' => 'SELECT IDENTITY_VAL_LOCAL()',
                'mysql' => 'SELECT LAST_INSERT_ID()',
                'oracle' => 'SELECT mshop_blogcategory_seq.CURRVAL FROM DUAL',
                'pgsql' => 'SELECT lastval()',
                'sqlite' => 'SELECT last_insert_rowid()',
                'sqlsrv' => 'SELECT @@IDENTITY',
                'sqlanywhere' => 'SELECT @@IDENTITY',
            ),
        ),
    ],
    'blogtag' => [
        'manager' => array(
            'lists' => array(
                'type' => array(
                    'delete' => array(
                        'ansi' => '
						DELETE FROM "mshop_blogtag_list_type"
						WHERE :cond AND siteid = ?
					'
                    ),
                    'insert' => array(
                        'ansi' => '
						INSERT INTO "mshop_blogtag_list_type" ( :names
							"code", "domain", "label", "pos", "status",
							"mtime", "editor", "siteid", "ctime"
						) VALUES ( :values
							?, ?, ?, ?, ?, ?, ?, ?, ?
						)
					'
                    ),
                    'update' => array(
                        'ansi' => '
						UPDATE "mshop_blogtag_list_type"
						SET :names
							"code" = ?, "domain" = ?, "label" = ?, "pos" = ?,
							"status" = ?, "mtime" = ?, "editor" = ?
						WHERE "siteid" = ? AND "id" = ?
					'
                    ),
                    'search' => array(
                        'ansi' => '
						SELECT :columns
							mprolity."id" AS "blogtag.lists.type.id", mprolity."siteid" AS "blogtag.lists.type.siteid",
							mprolity."code" AS "blogtag.lists.type.code", mprolity."domain" AS "blogtag.lists.type.domain",
							mprolity."label" AS "blogtag.lists.type.label", mprolity."status" AS "blogtag.lists.type.status",
							mprolity."mtime" AS "blogtag.lists.type.mtime", mprolity."editor" AS "blogtag.lists.type.editor",
							mprolity."ctime" AS "blogtag.lists.type.ctime", mprolity."pos" AS "blogtag.lists.type.position"
						FROM "mshop_blogtag_list_type" AS mprolity
						:joins
						WHERE :cond
						ORDER BY :order
						OFFSET :start ROWS FETCH NEXT :size ROWS ONLY
					',
                        'mysql' => '
						SELECT :columns
							mprolity."id" AS "blogtag.lists.type.id", mprolity."siteid" AS "blogtag.lists.type.siteid",
							mprolity."code" AS "blogtag.lists.type.code", mprolity."domain" AS "blogtag.lists.type.domain",
							mprolity."label" AS "blogtag.lists.type.label", mprolity."status" AS "blogtag.lists.type.status",
							mprolity."mtime" AS "blogtag.lists.type.mtime", mprolity."editor" AS "blogtag.lists.type.editor",
							mprolity."ctime" AS "blogtag.lists.type.ctime", mprolity."pos" AS "blogtag.lists.type.position"
						FROM "mshop_blogtag_list_type" AS mprolity
						:joins
						WHERE :cond
						ORDER BY :order
						LIMIT :size OFFSET :start
					'
                    ),
                    'count' => array(
                        'ansi' => '
						SELECT COUNT(*) AS "count"
						FROM (
							SELECT mprolity."id"
							FROM "mshop_blogtag_list_type" AS mprolity
							:joins
							WHERE :cond
							ORDER BY mprolity."id"
							OFFSET 0 ROWS FETCH NEXT 10000 ROWS ONLY
						) AS list
					',
                        'mysql' => '
						SELECT COUNT(*) AS "count"
						FROM (
							SELECT mprolity."id"
							FROM "mshop_blogtag_list_type" AS mprolity
							:joins
							WHERE :cond
							ORDER BY mprolity."id"
							LIMIT 10000 OFFSET 0
						) AS list
					'
                    ),
                    'newid' => array(
                        'db2' => 'SELECT IDENTITY_VAL_LOCAL()',
                        'mysql' => 'SELECT LAST_INSERT_ID()',
                        'oracle' => 'SELECT mshop_blogtag_list_type_seq.CURRVAL FROM DUAL',
                        'pgsql' => 'SELECT lastval()',
                        'sqlite' => 'SELECT last_insert_rowid()',
                        'sqlsrv' => 'SELECT @@IDENTITY',
                        'sqlanywhere' => 'SELECT @@IDENTITY',
                    ),
                ),
                'aggregate' => array(
                    'ansi' => '
					SELECT :keys, :type("val") AS "value"
					FROM (
						SELECT :acols, :val AS "val"
						FROM "mshop_blogtag_list" AS mproli
						:joins
						WHERE :cond
						GROUP BY :cols, mproli."id"
						ORDER BY :order
						OFFSET :start ROWS FETCH NEXT :size ROWS ONLY
					) AS list
					GROUP BY :keys
				',
                    'mysql' => '
					SELECT :keys, :type("val") AS "value"
					FROM (
						SELECT :acols, :val AS "val"
						FROM "mshop_blogtag_list" AS mproli
						:joins
						WHERE :cond
						GROUP BY :cols, mproli."id"
						ORDER BY :order
						LIMIT :size OFFSET :start
					) AS list
					GROUP BY :keys
				'
                ),
                'delete' => array(
                    'ansi' => '
					DELETE FROM "mshop_blogtag_list"
					WHERE :cond AND siteid = ?
				'
                ),
                'insert' => array(
                    'ansi' => '
					INSERT INTO "mshop_blogtag_list" ( :names
						"parentid", "key", "type", "domain", "refid", "start", "end",
						"config", "pos", "status", "mtime", "editor", "siteid", "ctime"
					) VALUES ( :values
						?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
					)
				'
                ),
                'update' => array(
                    'ansi' => '
					UPDATE "mshop_blogtag_list"
					SET :names
						"parentid" = ?, "key" = ?, "type" = ?, "domain" = ?, "refid" = ?, "start" = ?,
						"end" = ?, "config" = ?, "pos" = ?, "status" = ?, "mtime" = ?, "editor" = ?
					WHERE "siteid" = ? AND "id" = ?
				'
                ),
                'search' => array(
                    'ansi' => '
					SELECT :columns
						mproli."id" AS "blogtag.lists.id", mproli."parentid" AS "blogtag.lists.parentid",
						mproli."siteid" AS "blogtag.lists.siteid", mproli."type" AS "blogtag.lists.type",
						mproli."domain" AS "blogtag.lists.domain", mproli."refid" AS "blogtag.lists.refid",
						mproli."start" AS "blogtag.lists.datestart", mproli."end" AS "blogtag.lists.dateend",
						mproli."config" AS "blogtag.lists.config", mproli."pos" AS "blogtag.lists.position",
						mproli."status" AS "blogtag.lists.status", mproli."mtime" AS "blogtag.lists.mtime",
						mproli."editor" AS "blogtag.lists.editor", mproli."ctime" AS "blogtag.lists.ctime"
					FROM "mshop_blogtag_list" AS mproli
					:joins
					WHERE :cond
					ORDER BY :order
					OFFSET :start ROWS FETCH NEXT :size ROWS ONLY
				',
                    'mysql' => '
					SELECT :columns
						mproli."id" AS "blogtag.lists.id", mproli."parentid" AS "blogtag.lists.parentid",
						mproli."siteid" AS "blogtag.lists.siteid", mproli."type" AS "blogtag.lists.type",
						mproli."domain" AS "blogtag.lists.domain", mproli."refid" AS "blogtag.lists.refid",
						mproli."start" AS "blogtag.lists.datestart", mproli."end" AS "blogtag.lists.dateend",
						mproli."config" AS "blogtag.lists.config", mproli."pos" AS "blogtag.lists.position",
						mproli."status" AS "blogtag.lists.status", mproli."mtime" AS "blogtag.lists.mtime",
						mproli."editor" AS "blogtag.lists.editor", mproli."ctime" AS "blogtag.lists.ctime"
					FROM "mshop_blogtag_list" AS mproli
					:joins
					WHERE :cond
					ORDER BY :order
					LIMIT :size OFFSET :start
				'
                ),
                'count' => array(
                    'ansi' => '
					SELECT COUNT(*) AS "count"
					FROM (
						SELECT mproli."id"
						FROM "mshop_blogtag_list" AS mproli
						:joins
						WHERE :cond
						ORDER BY mproli."id"
						OFFSET 0 ROWS FETCH NEXT 10000 ROWS ONLY
					) AS list
				',
                    'mysql' => '
					SELECT COUNT(*) AS "count"
					FROM (
						SELECT mproli."id"
						FROM "mshop_blogtag_list" AS mproli
						:joins
						WHERE :cond
						ORDER BY mproli."id"
						LIMIT 10000 OFFSET 0
					) AS list
				'
                ),
                'newid' => array(
                    'db2' => 'SELECT IDENTITY_VAL_LOCAL()',
                    'mysql' => 'SELECT LAST_INSERT_ID()',
                    'oracle' => 'SELECT mshop_blogtag_list_seq.CURRVAL FROM DUAL',
                    'pgsql' => 'SELECT lastval()',
                    'sqlite' => 'SELECT last_insert_rowid()',
                    'sqlsrv' => 'SELECT @@IDENTITY',
                    'sqlanywhere' => 'SELECT @@IDENTITY',
                ),
            ),
            'delete' => array(
                'ansi' => '
					DELETE FROM "mshop_blogtag"
					WHERE :cond AND siteid = ?
				'
            ),
            'insert' => array(
                'ansi' => '
					INSERT INTO "mshop_blogtag" ( :names
						"url","label", "status", "mtime", "editor","user_id","position","siteid", "ctime"
					) VALUES ( :values
						?, ?, ?, ?, ?, ?, ?, ?, ?
					)
				'
            ),
            'update' => array(
                'ansi' => '
					UPDATE "mshop_blogtag"
					SET :names
						"url"=?, "label" = ?, "status" = ?, "mtime" = ?, "editor" = ?,  "user_id"=?, "position"=?
					WHERE "siteid" = ? AND "id" = ?
				'
            ),
            'search' => array(
                'ansi' => '
					SELECT :columns
						mblogtag."id" AS "blogtag.id", mblogtag."siteid" AS "blogtag.siteid",
						mblogtag."url" AS "blogtag.url",mblogtag."label" AS "blogtag.label",
						mblogtag."status" AS "blogtag.status", mblogtag."mtime" AS "blogtag.mtime",
						mblogtag."editor" AS "blogtag.editor", mblogtag."ctime" AS "blogtag.ctime",
						mblogtag."user_id" AS "blogtag.user_id",
						mblogtag."position" AS "blogtag.position"
					FROM "mshop_blogtag" AS mblogtag
					:joins
					WHERE :cond
					GROUP BY :columns :group
						mblogtag."id", mblogtag."siteid", mblogtag."url",mblogtag."label",
						mblogtag."status", mblogtag."mtime", mblogtag."editor", mblogtag."ctime",
						mblogtag."user_id",mblogtag."position"
					ORDER BY :order
					OFFSET :start ROWS FETCH NEXT :size ROWS ONLY
				',
                'mysql' => '
					SELECT :columns
						mblogtag."id" AS "blogtag.id",
						mblogtag."siteid" AS "blogtag.siteid",
						mblogtag."url" AS "blogtag.url",
						mblogtag."label" AS "blogtag.label",
						mblogtag."status" AS "blogtag.status",
						mblogtag."mtime" AS "blogtag.mtime",
						mblogtag."editor" AS "blogtag.editor",
						mblogtag."ctime" AS "blogtag.ctime",
						mblogtag."user_id" AS "blogtag.user_id",
						mblogtag."position" AS "blogtag.position"
					FROM "mshop_blogtag" AS mblogtag
					:joins
					WHERE :cond
					GROUP BY :group mblogtag."id"
					ORDER BY :order
					LIMIT :size OFFSET :start
				'
            ),
            'count' => array(
                'ansi' => '
					SELECT COUNT(*) AS "count"
					FROM (
						SELECT mblogtag."id"
						FROM "mshop_blogtag" AS mblogtag
						:joins
						WHERE :cond
						GROUP BY mblogtag."id"
						ORDER BY mblogtag."id"
						OFFSET 0 ROWS FETCH NEXT 10000 ROWS ONLY
					) AS list
				',
                'mysql' => '
					SELECT COUNT(*) AS "count"
					FROM (
						SELECT mblogtag."id"
						FROM "mshop_blogtag" AS mblogtag
						:joins
						WHERE :cond
						GROUP BY mblogtag."id"
						ORDER BY mblogtag."id"
						LIMIT 10000 OFFSET 0
					) AS list
				'
            ),
            'newid' => array(
                'db2' => 'SELECT IDENTITY_VAL_LOCAL()',
                'mysql' => 'SELECT LAST_INSERT_ID()',
                'oracle' => 'SELECT mshop_blogtag_seq.CURRVAL FROM DUAL',
                'pgsql' => 'SELECT lastval()',
                'sqlite' => 'SELECT last_insert_rowid()',
                'sqlsrv' => 'SELECT @@IDENTITY',
                'sqlanywhere' => 'SELECT @@IDENTITY',
            ),
        ),
    ],
    'likecomment' => [
        'manager' => array(
            'aggregate' => array(
                'ansi' => '
				SELECT :keys, :type("val") AS "value"
				FROM (
					SELECT :acols, :val AS "val"
					FROM "mshop_likecomment" AS mrev
					:joins
					WHERE :cond
					ORDER BY mrev.id DESC
					OFFSET :start ROWS FETCH NEXT :size ROWS ONLY
				) AS list
				GROUP BY :keys
			',
                'mysql' => '
				SELECT :keys, :type("val") AS "value"
				FROM (
					SELECT :acols, :val AS "val"
					FROM "mshop_likecomment" AS mrev
					:joins
					WHERE :cond
					ORDER BY :order
					LIMIT :size OFFSET :start
				) AS list
				GROUP BY :keys
			'
            ),
            'aggregaterate' => array(
                'ansi' => '
				SELECT :keys, SUM("val") AS "sum", COUNT(*) AS "count"
				FROM (
					SELECT :acols, mrev.rating AS "val"
					FROM "mshop_likecomment" AS mrev
					:joins
					WHERE :cond
					ORDER BY :order
					OFFSET :start ROWS FETCH NEXT :size ROWS ONLY
				) AS list
				GROUP BY :keys
			',
                'mysql' => '
				SELECT :keys, SUM("val") AS "sum", COUNT(*) AS "count"
				FROM (
					SELECT :acols, mrev.rating AS "val"
					FROM "mshop_likecomment" AS mrev
					:joins
					WHERE :cond
					ORDER BY :order
					LIMIT :size OFFSET :start
				) AS list
				GROUP BY :keys
			'
            ),
            'insert' => array(
                'ansi' => '
				INSERT INTO "mshop_likecomment" ( :names
					"refid", "customerid", "likeunlike", "comment", "type", "name", "email", "ip_address","parent_id","approved","agent","url","status", "mtime", "editor", "siteid", "ctime"
				) VALUES ( :values
					?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
				)
			'
            ),
            'update' => array(
                'ansi' => '
				UPDATE "mshop_likecomment"
				SET :names
					"refid" = ?, "customerid" = ?, "likeunlike" = ?, "comment" = ?, "type" = ?, "name" = ?, "email" = ?, "ip_address" = ?,"parent_id" = ?,"approved" = ?,"agent" = ?,"url" = ?, "status" = ?, "mtime" = ?, "editor" = ?
				WHERE "siteid" = ? AND "id" = ?
			'
            ),
            'delete' => array(
                'ansi' => '
				DELETE FROM "mshop_likecomment"
				WHERE :cond AND siteid = ?
			'
            ),
            'search' => array(
                'ansi' => '
				SELECT :columns
					mrev."id" AS "likecomment.id", mrev."siteid" AS "likecomment.siteid",
					mrev."refid" AS "likecomment.refid",
					mrev."customerid" AS "likecomment.customerid",
					mrev."likeunlike" AS "likecomment.likeunlike",
					mrev."comment" AS "likecomment.comment",
					mrev."type" AS "likecomment.type",
					mrev."name" AS "likecomment.name",
					mrev."email" AS "likecomment.email",
					mrev."ip_address" AS "likecomment.ip_address",
					mrev."parent_id" AS "likecomment.parent_id",
					mrev."approved" AS "likecomment.approved",
					mrev."agent" AS "likecomment.agent",
					mrev."url" AS "likecomment.url",
					mrev."status" AS "likecomment.status", mrev."ctime" AS "likecomment.ctime",
					mrev."mtime" AS "likecomment.mtime", mrev."editor" AS "likecomment.editor"
				FROM "mshop_likecomment" AS mrev
				:joins
				WHERE :cond
				GROUP BY :columns :group
					mrev."id", mrev."siteid", mrev."refid", mrev."customerid", mrev."likeunlike",
					mrev."comment",  mrev."type",mrev."name",mrev."email",
					mrev."ip_address",mrev."parent_id",mrev."approved",mrev."agent",mrev."url", mrev."status", mrev."ctime",
					mrev."mtime", mrev."editor"
				ORDER BY :order
				OFFSET :start ROWS FETCH NEXT :size ROWS ONLY
			',
                'mysql' => '
				SELECT :columns
					mrev."id" AS "likecomment.id", mrev."siteid" AS "likecomment.siteid",
					mrev."refid" AS "likecomment.refid",
					mrev."customerid" AS "likecomment.customerid",
					mrev."likeunlike" AS "likecomment.likeunlike",
					mrev."comment" AS "likecomment.comment",
					mrev."type" AS "likecomment.type",
					mrev."name" AS "likecomment.name",
					mrev."email" AS "likecomment.email",
					mrev."ip_address" AS "likecomment.ip_address",
					mrev."parent_id" AS "likecomment.parent_id",
					mrev."approved" AS "likecomment.approved",
					mrev."agent" AS "likecomment.agent",
					mrev."url" AS "likecomment.url",
					mrev."status" AS "likecomment.status", mrev."ctime" AS "likecomment.ctime",
					mrev."mtime" AS "likecomment.mtime", mrev."editor" AS "likecomment.editor"
				FROM "mshop_likecomment" AS mrev
				:joins
				WHERE :cond
				GROUP BY :group mrev."id"
				ORDER BY :order
				LIMIT :size OFFSET :start
			'
            ),
            'count' => array(
                'ansi' => '
				SELECT COUNT(*) AS "count"
				FROM (
					SELECT mrev."id"
					FROM "mshop_likecomment" AS mrev
					:joins
					WHERE :cond
					GROUP BY mrev."id"
					ORDER BY mrev."id"
					OFFSET 0 ROWS FETCH NEXT 10000 ROWS ONLY
				) AS list
			',
                'mysql' => '
				SELECT COUNT(*) AS "count"
				FROM (
					SELECT mrev."id"
					FROM "mshop_likecomment" AS mrev
					:joins
					WHERE :cond
					GROUP BY mrev."id"
					ORDER BY mrev."id"
					LIMIT 10000 OFFSET 0
				) AS list
			'
            ),
            'newid' => array(
                'db2' => 'SELECT IDENTITY_VAL_LOCAL()',
                'mysql' => 'SELECT LAST_INSERT_ID()',
                'oracle' => 'SELECT mshop_likecomment_seq.CURRVAL FROM DUAL',
                'pgsql' => 'SELECT lastval()',
                'sqlite' => 'SELECT last_insert_rowid()',
                'sqlsrv' => 'SELECT @@IDENTITY',
                'sqlanywhere' => 'SELECT @@IDENTITY',
            ),
        ),
    ],
];
