<?php
namespace Dsw\Rolgame;

class Clerigo extends Personaje implements Curable
{
    public function __construct(
        public string $nombre,
        public int $nivel,
        public int $puntosDeVida,
        public int $poderCurativo
    )
    {}

    public function atacar(): int 
    {
        return $this->poderCurativo * 2;
    }

    public function defender(int $daño): int
    {
        $dañoFinal = $daño - $this->poderCurativo / 2;
        if ($dañoFinal <0 ) return 0;
        return $dañoFinal;
    }

    public function curar(): int
    {
        return $this->poderCurativo * 3;
    }
}