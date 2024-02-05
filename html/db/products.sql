-- 作品情報 削除
drop table app1_products;

-- 作品情報
create table app1_products(
    id          int unsigned auto_increment,  -- 主キー
    name        varchar(255) not null,        -- 作品名
    method      varchar(128) not null,        -- 制作方式
    role        varchar(255) default null,    -- 役割
    tools       varchar(255) default null,    -- 使用ツール
    thumb       varchar(255) default null,    -- サムネイル
    url         varchar(255) default null,    -- URL
    description text,                         -- 作品説明
    `delete`    datetime default null,        -- 削除扱いの日時

    primary key(id)
)engine = INNODB;

-- テストデータ
insert into app1_products( name, method, role, tools, url, description ) values
  ( 
    "クリエイティブワーク１", 
    "個人",
    null,
    "Illustrator/Figma",
    "https://example.com",
    "クリエイティブワーク１で作った個人制作の作品"
  ),
  ( 
    "チームプロジェクト１", 
    "チーム",
    "トータルファイナルデザイナー",
    "Figma",
    "https://example.com",
    "チームプロジェクト１で作ったチーム制作の作品"
  );