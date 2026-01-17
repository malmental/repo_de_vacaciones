 <?php

class Libro
{
    public function __construct(
        private string $titulo, 
        private int $paginas, 
        private TipoLibro $tipo, 
        private string $autor, 
        private string $ano_publicacion
        ) {}

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function getAnoPublicacion(): int
    {
        return $this->ano_publicacion;
    }

    public function __toString()
    {
        return 'Libro: ' . $this->titulo . PHP_EOL .
                'Paginas: ' .  $this->paginas . PHP_EOL .
                'Tipo/Genero: ' . $this->tipo->value . PHP_EOL .
                'Autor: ' . $this->autor . PHP_EOL .
                'Año de publicacion: ' . $this->ano_publicacion . PHP_EOL;
    }
}