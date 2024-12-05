/*Encontrar os filmes que não estão em estoque*/
SELECT film.film_id, film.title FROM film JOIN inventory ON inventory.film_id
!= film.film_id GROUP BY film.film_id;