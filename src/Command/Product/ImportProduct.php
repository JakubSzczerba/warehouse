<?php

/*
 * This file was created by Jakub Szczerba
 * Contact: https://www.linkedin.com/in/jakub-szczerba-3492751b4/
*/

declare(strict_types=1);

namespace App\Command\Product;

class ImportProduct
{
    private string $input;

    private string $output;

    public function __construct(string $input, string $output)
    {
        $this->input = $input;
        $this->output = $output;
    }

    public function getInput(): string
    {
        return $this->input;
    }

    public function getOutput(): string
    {
        return $this->output;
    }
}