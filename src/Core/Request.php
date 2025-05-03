<?php

namespace Lightway\Core;

use Lightway\Contracts\RequestInterface;


class Request implements RequestInterface
{
    protected string $method;
    protected string $uri;
    protected array $headers;
    protected string $body;
    protected array $queryParams;
    protected array $postParams;
    protected array $files;
    protected array $cookies;

    public function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        $this->uri = $_SERVER['REQUEST_URI'] ?? '/';
        $this->headers = $this->parseHeaders();
        $this->body = file_get_contents('php://input');
        $this->queryParams = $_GET ?? [];
        $this->postParams = $_POST ?? [];
        $this->files = $_FILES ?? [];
        $this->cookies = $_COOKIE ?? [];
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function getQueryParams(): array
    {
        return $this->queryParams;
    }

    public function getPostParams(): array
    {
        return $this->postParams;
    }

    public function getFiles(): array
    {
        return $this->files;
    }

    public function getCookies(): array
    {
        return $this->cookies;
    }

    private function parseHeaders(): array
    {
        $headers = [];
        foreach ($_SERVER as $key => $value) {
            if (str_starts_with($key, 'HTTP_')) {
                $headerName = str_replace('_', '-', substr($key, 5));
                $headers[$headerName] = $value;
            }
        }
        return $headers;
    }
}
