<?php

namespace Lightway\Contracts;

interface ResponseInterface
{
    public function setStatusCode(int $code): void;

    public function setHeader(string $name, string $value): void;

    public function setBody(string $body): void;

    public function send(): void;

    public function getStatusCode(): int;

    public function getHeaders(): array;

    public function getBody(): string;
}