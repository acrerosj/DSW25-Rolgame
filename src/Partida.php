<?php
namespace Dsw\Rolgame;

class Partida 
{
    public array $personajes = [];

    public function agregarPersonaje(Personaje $personaje): void
    {
        $this->personajes[] = $personaje;
    }

    public function obtenerPersonajes(): array
    {
        return $this->personajes;
    }

    public function eliminarPersonaje(Personaje $personaje): void
    {
        $index = array_search($personaje, $this->personajes, true);
        if ($index !== false) {
            unset($this->personajes[$index]);
            $this->personajes = array_values($this->personajes);
        }
    }

    public function obtenerPersonajesPorClase(string $class): array
    {
        return array_filter($this->personajes, fn($p) => $p instanceof $class);
    }

    public function eliminarMuertos(): void
    {
        $this->personajes = array_filter($this->personajes, fn($p) => $p->puntosDeVida > 0);
        $this->personajes = array_values($this->personajes);
    }

}