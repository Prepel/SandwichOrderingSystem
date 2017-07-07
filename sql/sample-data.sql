INSERT INTO `order` (`id`, `person_name`)
VALUES
	(1, 'Nick'),
	(2, 'Jeff');

INSERT INTO `order_line` (`id`, `order_id`, `topped_sandwich_id`, `amount`, `remark`, `processed`)
VALUES
	(1, 1, 1, 1, 'Nais', 0),
	(2, 1, 1, 2, '2', 0),
	(3, 2, 1, 1, 'nope', 0);

INSERT INTO `supplier` (`id`, `name`, `email`, `phone_number`)
VALUES
	(1, 'Piet', 'piet@mail.nl', '012313112');

INSERT INTO `topped_sandwich` (`id`, `supplier_id`, `type`, `size`, `flavour`, `topping`, `price`, `active`)
VALUES
	(1, 1, 'pistolet', 'big', 'white', 'Mexicaans', 5.93, 1);
