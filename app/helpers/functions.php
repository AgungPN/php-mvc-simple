<?php
function view(string $location, $data = []): void
{
	extract($data);
	require_once "../app/view/" . $location;
}

class Route
{
    public $path;
    public $controller;
}
