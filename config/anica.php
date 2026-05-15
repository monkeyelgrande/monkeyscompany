<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Mapa de estados (Anica / app Java)
    |--------------------------------------------------------------------------
    | El campo `estado` en ordenes (Postgres) es un entero 1..6.
    | Aquí mapeamos cada código al texto legible y color que se mostrará
    | en la página pública /consulta/{uuid}.
    |
    | Si la app Java envía status_label en el payload, ese valor manda.
    | Si no, usamos este mapa como fallback.
    */

    'status_map' => [
        1 => ['label' => 'Ingresado',           'color' => 'bg-brand-mid text-white'],
        2 => ['label' => 'En Proceso',          'color' => 'bg-accent-orange text-white'],
        3 => ['label' => 'Por Entregar',        'color' => 'bg-success text-brand-dark'],
        4 => ['label' => 'Entregado',           'color' => 'bg-brand-dark text-white'],
        5 => ['label' => 'Rechazado',           'color' => 'bg-error text-white'],
        6 => ['label' => 'Sin Solución',        'color' => 'bg-error text-white'],
        7 => ['label' => 'Garantía',            'color' => 'bg-accent-yellow text-brand-dark'],
        8 => ['label' => 'Eliminados',          'color' => 'bg-outline text-white'],
        9 => ['label' => 'Rep. Electrónica',    'color' => 'bg-brand-cyan text-brand-dark'],
    ],

];
