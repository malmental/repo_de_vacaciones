<?php

class Libro
{
    private string $titulo;
    private int $cantidad_de_paginas;
    private string $genero;
    private string $autor;
    private int $ano_publicacion;

    public function __construct(string $titulo, int $cantidad_de_paginas, string $genero, string $autor, int $ano_publicacion)
    {
        $this->titulo = $titulo;
        $this->cantidad_de_paginas = $cantidad_de_paginas;
        $this->genero = $genero;
        $this->autor = $autor;
        $this->ano_publicacion = $ano_publicacion;
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function getAnoPulicacion(): int
    {
        return $this->ano_publicacion;
    }

    public function mostrarDatosLibro(): string
    {
        return "===============================" . PHP_EOL .
            "DETALLES DEL LIBRO" . PHP_EOL .
            "Título:    {$this->titulo}" . PHP_EOL .
            "Autor:     {$this->autor}" . PHP_EOL .
            "Género:    {$this->genero}" . PHP_EOL .
            "Páginas:   {$this->cantidad_de_paginas}" . PHP_EOL .
            "Año:       {$this->ano_publicacion}" . PHP_EOL;
    }
}