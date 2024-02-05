create table app1_users(
    id       int unsigned auto_increment,
    account  varchar(255) not null,  -- アカウント（メールアドレス）
    password varchar(255) not null,  -- パスワード

    primary key(account),            -- 主キー
    index(id)
)engine = INNODB;