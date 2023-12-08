<?php

namespace App\Models\Clases;

class CarritoDeCompra
{
    private ?int $idCarrito;
    private int $idUsuario;
    private int $idStatus;
    private int $idSucursal;
    private float $total;
    private array $detalles;

    public function __construct(int $idUsuario, int $idSucursal,  int $idStatus = 1, ?int $idCarrito = null)
    {
        $this->idCarrito = $idCarrito;
        $this->idSucursal = $idSucursal;
        $this->idUsuario = $idUsuario;
        $this->idStatus = $idStatus;
        $this->detalles = [];
    }

    public function getIdUsuario(): int
    {
        return $this->idUsuario;
    }
    public function getIdStatus(): int
    {
        return $this->idStatus;
    }
    public function getIdSucursal(): int
    {
        return $this->idSucursal;
    }

    public function getDetalles(): array
    {
        return $this->detalles;
    }

    public function getTotal(): float
    {
        return $this->total;
    }

    public function getIdCarrito(): ?int
    {
        return $this->idCarrito;
    }
    //setters

    public function setIdSucursal(int $idSucursal): void
    {
        $this->idSucursal = $idSucursal;
    }

    public function setIdUsuario(int $idUsuario): void
    {
        $this->idUsuario = $idUsuario;
    }
    public function setIdStatus(int $idStatus): void
    {
        $this->idStatus = $idStatus;
    }

    public function setDetalles(array $detalles): void
    {
        $this->detalles = $detalles;
    }


    public function addDetalle(DetalleCarrito $detalle): void
    {
        //buscar si existe el detalle
        //si existe no permitir agregarlo

        array_push($this->detalles, $detalle);
    }

    public function removeDetalle(int $idDetalleCarrito): void
    {
        for ($i = 0; $i < count($this->detalles); $i++) {
            if ($this->detalles[$i]->getIdDetalleCarrito() === $idDetalleCarrito) {
                unset($this->detalles[$i]);
            }
        }

        $this->detalles = array_values($this->detalles);
        //buscar si existe el detalle
    }

    public function actualizarDetalle(int $idDetalleCarrito, int $cantidad): void
    {
        for ($i = 0; $i < count($this->detalles); $i++) {
            if ($this->detalles[$i]->getIdDetalleCarrito() === $idDetalleCarrito) {
                $this->detalles[$i]->setCantidad($cantidad);
            }
        }
    }
}
