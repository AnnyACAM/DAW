/*Obter o número total de clientes por loja*/
SELECT store.store_id , COUNT(customer.store_id) AS numberCustomer FROM customer,store GROUP BY store.store_id ;