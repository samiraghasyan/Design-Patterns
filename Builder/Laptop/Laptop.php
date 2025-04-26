<?php

class Laptop
{

    public string $cpu;
    public string $gpu;
    public int $ram;
    public int $storage;

    public function show(): void
    {
        echo "Laptop: Cpu: $this->cpu | GPU: $this->gpu | RAM: $this->ram GB | Storage: $this->storage GB";
    }

}

interface Builders
{
    public function setCPU(string $cpu): self;

    public function setGPU(string $gpu): self;

    public function setRAM(int $ram): self;

    public function setStorage(int $storage): self;

    public function getLaptop(): Laptop;
}

class CasualLaptopBuilder implements Builders
{

    private Laptop $laptop;

    public function __construct()
    {
        $this->laptop = new Laptop();
    }

    public function setCPU(string $cpu): Builders
    {
        $this->laptop->cpu = $cpu;
        return $this;
    }

    public function setGPU(string $gpu): Builders
    {
        $this->laptop->gpu = $gpu;
        return $this;
    }

    public function setRAM(int $ram): Builders
    {
        $this->laptop->ram = $ram;
        return $this;
    }

    public function setStorage(int $storage): Builders
    {
        $this->laptop->storage = $storage;
        return $this;
    }

    public function getLaptop(): Laptop
    {
        return $this->laptop;
    }
}

class Director
{
    private Builders $builder;

    public function setBuilder(Builders $builder): void
    {
        $this->builder = $builder;
    }

    public function buildCustomLaptop(string $cpu, string $gpu, int $ram, int $storage): Laptop
    {
        return $this->builder
            ->setCPU($cpu)
            ->setGPU($gpu)
            ->setRAM($ram)
            ->setStorage($storage)
            ->getLaptop();
    }
}


$userInput = [
    'cpu' => 'AMD Ryzen 9',
    'gpu' => 'NVIDIA RTX 4090',
    'ram' => 32,
    'storage' => 1024
];

$builder = new CasualLaptopBuilder();
$director = new Director();
$director->setBuilder($builder);

$laptop = $director->buildCustomLaptop(
            $userInput['cpu'],
            $userInput['gpu'],
            $userInput['ram'],
            $userInput['storage'],
);

$laptop->show();