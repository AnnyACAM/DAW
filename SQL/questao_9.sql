/*Listar todas as categorias e o número de filmes em cada categoria*/
SELECT category.name, COUNT(film_category.category_id) AS numberCategory FROM category,film_category GROUP BY category.name;