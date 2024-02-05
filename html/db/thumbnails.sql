create table app1_thumbnails(
    id          int unsigned auto_increment,  -- 主キー
    product_id  int unsigned not null,        -- 作品情報のID  
    name        varchar(255) not null,        -- ファイル名（拡張子付き）
    description varchar(512) default null,    -- サムネイルの代替文字

    primary key(id)
)engine = INNODB;