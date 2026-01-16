Cuando trabajes con cadenas, evita siempre el uso de comillas dobles. 

La razón es que PHP analiza el contenido de las comillas dobles en búsqueda de variables que deban ser interpretadas, resultando en un tiempo de ejecución mayor.

Emplea siempre la función echo y concatena las cadenas con comas: echo ‘Hola’, $nombre, ‘, ¿qué te trae por aquí? requerirá menos tiempo al compilador que echo ‘Hola’ . $nombre . ‘, ¿qué te trae por aquí?’. Por lo visto en el punto anterior, el “peor caso posible” sería print “Hola $nombre, ¿qué te trae por aquí?”