-- Create syntax for TABLE 'order'
CREATE TABLE `order` (
    `id`          INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `person_name` VARCHAR(255)     NOT NULL DEFAULT '',
    PRIMARY KEY (`id`)
)
    ENGINE = InnoDB
    DEFAULT CHARSET = utf8;

-- Create syntax for TABLE 'order_line'
CREATE TABLE `order_line` (
    `id`                 INT(11) UNSIGNED    NOT NULL AUTO_INCREMENT,
    `order_id`           INT(11) UNSIGNED    NOT NULL,
    `topped_sandwich_id` INT(11) UNSIGNED    NOT NULL,
    `amount`             INT(11) UNSIGNED    NOT NULL,
    `remark`             VARCHAR(255)                 DEFAULT NULL,
    `processed`          TINYINT(1) UNSIGNED NOT NULL,
    PRIMARY KEY (`id`)
)
    ENGINE = InnoDB
    DEFAULT CHARSET = utf8;

-- Create syntax for TABLE 'supplier'
CREATE TABLE `supplier` (
    `id`           INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `name`         VARCHAR(255)     NOT NULL DEFAULT '',
    `email`        VARCHAR(255)     NOT NULL DEFAULT '',
    `phone_number` VARCHAR(45)      NOT NULL DEFAULT '',
    PRIMARY KEY (`id`)
)
    ENGINE = InnoDB
    DEFAULT CHARSET = utf8;

-- Create syntax for TABLE 'topped_sandwich'
CREATE TABLE `topped_sandwich` (
    `id`          INT(11) UNSIGNED    NOT NULL AUTO_INCREMENT,
    `supplier_id` INT(11) UNSIGNED    NOT NULL,
    `type`        VARCHAR(255)        NOT NULL DEFAULT '',
    `size`        VARCHAR(255)        NOT NULL DEFAULT '',
    `flavour`     VARCHAR(255)        NOT NULL DEFAULT '',
    `topping`     VARCHAR(255)        NOT NULL DEFAULT '',
    `price`       DECIMAL(10, 2)      NOT NULL,
    `active`      TINYINT(1) UNSIGNED NOT NULL,
    PRIMARY KEY (`id`)
)
    ENGINE = InnoDB
    DEFAULT CHARSET = utf8;
