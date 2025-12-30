<?php

namespace App;

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;
    public function getCacheDir(): string
    {
        // On place le cache dans le dossier temporaire du système
        return sys_get_temp_dir().'/bubble_tea_builder/cache/'.$this->environment;
    }

    public function getLogDir(): string
    {
        // On place les logs dans le dossier temporaire du système
        return sys_get_temp_dir().'/bubble_tea_builder/logs';
    }

}
