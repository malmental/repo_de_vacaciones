_____________________________________________________________
|                  CATÁLOGO DE PELÍCULAS                    |
|___________________________________________________________|
|                                                           |
| Este proyecto consiste en la creación de un catálogo      |
| de películas similar a IMDB.                              |
|___________________________________________________________|
|                                                           |
| **Cada película tiene la siguiente información**:         |
| - Nombre                                                  |
| - Duración                                                |
| - Género (Drama, Comedia, Acción, Ciencia Ficción,        |
|           Terror)                                         |
| - Año de estreno                                          |
| - País o países productores                               |
|___________________________________________________________|
|                                                           |
| **Funcionalidades implementadas**:                        |
| - Búsqueda por género: Dado un género, el programa        |
|   devuelve todas las películas que pertenezcan a ese      |
|   género.                                                 |
|   Si no existen películas de ese género, se devuelve      |
|   un mensaje de error.                                    |
|___________________________________________________________|
|                                                           |
| - Películas con producción multinacional: El programa     |
|   devuelve todas las películas que tengan más de un       |
|   país productor.                                         |
|___________________________________________________________|

Para poder devolver peliculas con mas de un pais productor, hará falta modificar la clase Pelicula.php
Se deverá agregar cambiar la propiedad '...string $pais;' por '...array $paises;' y agregar un metodo
que devuelva bool si es multi-pais o no tipo:   
                                            
        public function esMultinacional(): bool
        {
            return count($this->paises) > 1;
        }

Y despues en el mini_man se deberá llamar de la siguiente forma: 

        function peliculasMultinacionales(array $catalogo): array
        {
            $resultado = [];
            foreach ($catalogo as $pelicula) {
                if ($pelicula->esMultinacional()) {  // Usa el método de la clase
                    $resultado[] = $pelicula;
                }
            }
            return $resultado;
        }