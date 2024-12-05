/*Selecionar informações de aluguel, incluindo nomes dos clientes e datas de aluguel*/

SELECT rental.*, customer.first_name, customer.last_name FROM rental, customer WHERE rental.customer_id = customer.customer_id;