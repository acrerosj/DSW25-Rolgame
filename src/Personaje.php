<?php
namespace Dsw\Rolgame;

abstract class Personaje {
    public function __construct(
        public string $nombre,
        public int $nivel,
        public int $puntosDeVida
    ) {}

    public abstract function atacar(): int;

    public abstract function defender(int $daño): int;

    public function subirNivel():void {
        $this->nivel++;
    }

    public static function lucha(Personaje $atacante, Personaje $defensor): void
    {
        $daño = $atacante->atacar();
        $dañoFinal = $defensor->defender($daño);
        $defensor->puntosDeVida -= $dañoFinal;

        $daño = $defensor->atacar();
        $dañoFinal = $atacante->defender($daño);
        $atacante->puntosDeVida -= $dañoFinal;
    }
}