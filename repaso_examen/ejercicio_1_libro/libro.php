<?php

class Libro
{
    public function __construct(
        private string $titulo,
        private int $cantidad_de_paginas,
        private TipoLibro $tipo,
        private string $autor,
        private int $ano_publicacion
        ) {}
        
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
        return '===============================' . PHP_EOL .
            'DETALLES DEL LIBRO' . PHP_EOL .
            'Título: ' . $this->titulo . PHP_EOL .
            'Autor: ' . $this->autor . PHP_EOL .
            'Género: ' . $this->tipo->value . PHP_EOL .
            'Páginas: ' . $this->cantidad_de_paginas . PHP_EOL .
            'Año: ' . $this->ano_publicacion . PHP_EOL;
    }
}