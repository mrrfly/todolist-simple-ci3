create table d_todo
(
    id         int auto_increment
        primary key,
    name       varchar(255)                           not null,
    status     tinyint(1) default 0                   not null,
    created_at timestamp  default current_timestamp() not null
);

