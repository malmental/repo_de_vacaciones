 <?php

class Libro
{
    private string $titulo;
    private int $paginas;
    private string $genero;
    private string $autor;
    private string $ano_publicacion;

    public function __construct(string $titulo, int $paginas, string $genero, string $autor, string $ano_publicacion)
    {
        $this->titulo = $titulo;
        $this->paginas = $paginas;
        $this->genero = $genero;
        $this->autor = $autor;
        $this->ano_publicacion = $ano_publicacion;
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function getAnoPublicacion(): int
    {
        return $this->ano_publicacion;
    }

    public function mostrarDatosLibro(): string
    {
        return "Libro: {$this->titulo}, Paginas: {$this->paginas}, Genero: {$this->genero}, Autor: {$this->autor}, Año de publicacion: {$this->ano_publicacion}";
    }
    
}