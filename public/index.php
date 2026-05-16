<?php

declare(strict_types=1);

define('BASE_PATH', dirname(__DIR__));

define(
    'BASE_URL',
    (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'
        ? 'https'
        : 'http')
    . '://'
    . $_SERVER['HTTP_HOST']
    . rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\')
    . '/'
);

session_start();

require_once BASE_PATH . '/vendor/autoload.php';

use App\Controllers\DashboardController;
use App\Controllers\FilialController;
use App\Controllers\ProdutoController;
use App\Repositories\ProdutoRepository;

$action = $_GET['action'] ?? 'dashboard';

try {

    match ($action) {

        // dashboard
        'dashboard', '' =>
            (new DashboardController())->index(),

        // filiais
        'filiais', '' =>
            (new FilialController())->index(),

        // produtos
        'produtos' =>
            (new ProdutoController())->index(),

        // cadastro produto
        'cadastro-produto' =>
            require BASE_PATH . '/app/Views/produtos/cadastro-produto.php',

        // salvar produto
        'salvar-produto' =>
            salvarProduto(),

        // excluir produto
        'excluir-produto' =>
            excluirProduto(),

        // 404
        default =>
            call404(),
    };

} catch (\Throwable $e) {

    http_response_code(500);

    echo '<pre>';
    print_r($e);
    echo '</pre>';
}

function salvarProduto(): void
{
    $repository = new ProdutoRepository();

    $repository->salvar($_POST);

    header('Location: /?action=produtos');

    exit;
}

function excluirProduto(): void
{
    $id = (int)($_POST['id'] ?? 0);

    $repository = new ProdutoRepository();

    $repository->excluir($id);

    header('Location: /?action=produtos');

    exit;
}

function call404(): void
{
    http_response_code(404);

    require_once BASE_PATH . '/app/Views/erros/404.php';
}