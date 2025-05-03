<?php

namespace Lightway\View;

class View
{
    protected $data = [];
    protected $templatesPath;
    protected $layoutsPath;
    protected $partialsPath;

    public function __construct($templatesPath = null, $layoutsPath = null, $partialsPath = null)
    {
        $this->templatesPath = $templatesPath ?? __DIR__ . '/templates';
        $this->layoutsPath = $layoutsPath ?? __DIR__ . '/layouts';
        $this->partialsPath = $partialsPath ?? __DIR__ . '/partials';
    }

    public function render($view, $data = [])
    {
        $this->data = $data;

        $content = $this->renderTemplate($view);
        $content = $this->replacePartials($content);
        $this->renderLayout($content);
    }

    protected function renderTemplate($view)
    {
        $templateFile = $this->templatesPath . '/' . $view . '.php';

        if (!file_exists($templateFile)) {
            throw new \Exception("Template file '{$templateFile}' not found.");
        }

        ob_start();
        include($templateFile);
        return ob_get_clean();
    }

    protected function renderLayout($content)
    {
        $layoutFile = $this->layoutsPath . '/default.php';
        extract($this->data);

        if (!file_exists($layoutFile)) {
            throw new \Exception("Layout file '{$layoutFile}' not found.");
        }

        $layoutContent = file_get_contents($layoutFile);
        $layoutContent = str_replace('{{content}}', $content, $layoutContent);
        $layoutContent = $this->replacePartials($layoutContent);

        eval('?>' . $layoutContent);
    }

    protected function replacePartials($content)
    {
        return preg_replace_callback('/{{(\w+)}}/', function ($matches) {
            $partialFile = $this->partialsPath . '/' . $matches[1] . '.php';

            if (file_exists($partialFile)) {
                ob_start();
                include($partialFile);
                return ob_get_clean();
            }

            return $matches[0]; // Leave the placeholder if the partial doesn't exist
        }, $content);
    }
}
