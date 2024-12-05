/*Descobrir os filmes alugados pelo cliente de id 2873*/
SELECT rental.customer_id, film.title FROM rental JOIN inventory ON inventory.inventory_id = rental.inventory_id JOIN film ON film.film_id = inventory.film_id HAVING rental.customer_id like
273;