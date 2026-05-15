<?php
/**
 * hermeX - Cadastro de Produtos
 * View: app/Views/produtos/cadastro.php
 */

$tituloPagina = 'Novo Produto';

$estilos = [
    '/assets/css/dashboard.css',
    '/assets/css/produtos.css'
];

$scripts = [
    '/assets/js/produtos.js'
];

ob_start();
?>

<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>

<script>
tailwind.config = {
    darkMode: "class",
    theme: {
        extend: {
            colors: {
                primary: "#040c1c",
                background: "#f7fafc",
                "on-surface": "#181c1e",
                "on-surface-variant": "#45474c",
                "outline-variant": "#c6c6cd",
                "primary-fixed": "#dae2fa",
                "secondary-fixed": "#ffe08b",
                "tertiary-fixed": "#a3f69c",
                error: "#ba1a1a",
                "error-container": "#ffdad6"
            }
        }
    }
}
</script>

<style>
.material-symbols-outlined {
    font-variation-settings:
    'FILL' 0,
    'wght' 400,
    'GRAD' 0,
    'opsz' 24;
}

input:focus,
select:focus,
textarea:focus {
    outline: none;
    border-color: #040c1c !important;
}

body {
    font-family: 'Inter', sans-serif;
}
</style>

<div class="flex-grow flex flex-col overflow-hidden">

    <!-- HEADER -->
    <header class="bg-white border-b border-outline-variant flex justify-between items-center px-6 h-16">

        <div class="flex items-center gap-2">
            <span class="text-on-surface-variant text-sm">Produtos</span>

            <span class="material-symbols-outlined text-sm text-on-surface-variant">
                chevron_right
            </span>

            <span class="font-bold text-primary text-sm">
                Novo Produto
            </span>
        </div>

        <div class="flex items-center gap-4">

            <div class="relative hidden md:block">
                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant text-lg">
                    search
                </span>

                <input
                    class="bg-gray-100 border-none rounded-lg pl-10 pr-4 py-2 text-sm w-64"
                    placeholder="Buscar no sistema..."
                    type="text"
                >
            </div>

            <button class="material-symbols-outlined text-on-surface-variant">
                refresh
            </button>

            <button class="material-symbols-outlined text-on-surface-variant">
                notifications
            </button>
        </div>
    </header>

    <!-- CONTEÚDO -->
    <main class="flex-grow overflow-y-auto p-8 bg-[#f4f7f9]">

        <div class="max-w-5xl mx-auto">

            <!-- TÍTULO -->
            <div class="mb-8 flex justify-between items-end">

                <div>
                    <h1 class="text-[24px] font-bold text-primary">
                        Novo Registro de Produto
                    </h1>

                    <p class="text-on-surface-variant text-sm mt-1">
                        Insira as especificações técnicas e logísticas do produto.
                    </p>
                </div>

                <div class="flex gap-3">

                    <a href="/?action=produtos"
                       class="px-6 py-2.5 bg-white border border-outline-variant rounded-lg text-sm font-semibold hover:bg-gray-100 transition-all">
                        Cancelar
                    </a>

                    <button form="formProduto"
                            type="submit"
                            class="px-6 py-2.5 bg-primary text-white rounded-lg text-sm font-semibold hover:opacity-90 transition-all">
                        Salvar Produto
                    </button>
                </div>
            </div>

            <!-- FORM -->
            <form
                id="formProduto"
                method="POST"
                action="/?action=salvar-produto"
                enctype="multipart/form-data"
            >

                <div class="grid grid-cols-12 gap-6">

                    <!-- IDENTIFICAÇÃO -->
                    <section class="col-span-12 lg:col-span-8 bg-white rounded-xl border border-outline-variant p-6">

                        <div class="flex items-center gap-2 mb-6">
                            <span class="material-symbols-outlined text-primary">
                                id_card
                            </span>

                            <h2 class="text-[12px] uppercase tracking-wider font-bold text-primary">
                                1. Identificação do Produto
                            </h2>
                        </div>

                        <div class="grid grid-cols-2 gap-6">

                            <!-- NOME -->
                            <div class="col-span-2">
                                <label class="block text-xs font-bold text-on-surface-variant mb-2">
                                    NOME DO PRODUTO
                                </label>

                                <input
                                    name="nome"
                                    required
                                    class="w-full border border-outline-variant rounded-lg p-3"
                                    placeholder="Ex: Monitor Industrial 4K"
                                    type="text"
                                >
                            </div>

                            <!-- SKU -->
                            <div>
                                <label class="block text-xs font-bold text-on-surface-variant mb-2">
                                    SKU
                                </label>

                                <input
                                    name="sku"
                                    required
                                    class="w-full border border-outline-variant rounded-lg p-3"
                                    placeholder="HER-0092-X"
                                    type="text"
                                >
                            </div>

                            <!-- CATEGORIA -->
                            <div>
                                <label class="block text-xs font-bold text-on-surface-variant mb-2">
                                    CATEGORIA
                                </label>

                                <select
                                    name="categoria"
                                    required
                                    class="w-full border border-outline-variant rounded-lg p-3"
                                >
                                    <option value="">Selecione...</option>
                                    <option value="Eletrônicos">Eletrônicos</option>
                                    <option value="Insumos Médicos">Insumos Médicos</option>
                                    <option value="Ferramentas">Ferramentas</option>
                                    <option value="Produtos Químicos">Produtos Químicos</option>
                                </select>
                            </div>

                        </div>
                    </section>

                    <!-- LOGÍSTICA -->
                    <section class="col-span-12 lg:col-span-4 bg-white rounded-xl border border-outline-variant p-6">

                        <div class="flex items-center gap-2 mb-6">
                            <span class="material-symbols-outlined text-primary">
                                local_shipping
                            </span>

                            <h2 class="text-[12px] uppercase tracking-wider font-bold text-primary">
                                2. Logística & Rastreio
                            </h2>
                        </div>

                        <div class="space-y-6">

                            <!-- NFC -->
                            <div>
                                <label class="block text-xs font-bold text-on-surface-variant mb-2">
                                    NFC TAG ID
                                </label>

                                <input
                                    name="codigoNfc"
                                    class="w-full border border-outline-variant rounded-lg p-3"
                                    placeholder="NFC-001"
                                    type="text"
                                >
                            </div>

                            <!-- PESO -->
                            <div>
                                <label class="block text-xs font-bold text-on-surface-variant mb-2">
                                    PESO UNITÁRIO (KG)
                                </label>

                                <input
                                    name="pesoUnitario"
                                    step="0.01"
                                    class="w-full border border-outline-variant rounded-lg p-3"
                                    placeholder="0.00"
                                    type="number"
                                >
                            </div>

                            <!-- TOLERÂNCIA -->
                            <div>

                                <div class="flex justify-between mb-2">

                                    <label class="text-xs font-bold text-on-surface-variant">
                                        TOLERÂNCIA DE PESO
                                    </label>

                                    <span id="valorTolerancia" class="font-bold text-primary text-sm">
                                        5%
                                    </span>
                                </div>

                                <input
                                    id="toleranciaInput"
                                    name="toleranciaPeso"
                                    class="w-full accent-primary"
                                    max="20"
                                    min="0"
                                    type="range"
                                    value="5"
                                >

                                <div class="flex justify-between mt-1 text-[10px] text-on-surface-variant font-bold">
                                    <span>0%</span>
                                    <span>20%</span>
                                </div>
                            </div>

                        </div>
                    </section>

                    <!-- DESCRIÇÃO -->
                    <section class="col-span-12 bg-white rounded-xl border border-outline-variant p-6">

                        <div class="flex items-center gap-2 mb-6">

                            <span class="material-symbols-outlined text-primary">
                                description
                            </span>

                            <h2 class="text-[12px] uppercase tracking-wider font-bold text-primary">
                                3. Detalhes & Documentação Visual
                            </h2>
                        </div>

                        <div class="grid grid-cols-12 gap-8">

                            <!-- TEXTO -->
                            <div class="col-span-12 md:col-span-7">

                                <label class="block text-xs font-bold text-on-surface-variant mb-2">
                                    DESCRIÇÃO DETALHADA
                                </label>

                                <textarea
                                    name="descricao"
                                    rows="8"
                                    class="w-full border border-outline-variant rounded-lg p-3 resize-none"
                                    placeholder="Descreva o produto..."
                                ></textarea>
                            </div>

                            <!-- FOTO -->
                            <div class="col-span-12 md:col-span-5">

                                <label class="block text-xs font-bold text-on-surface-variant mb-2">
                                    FOTO DO PRODUTO
                                </label>

                                <input
                                    name="imagem"
                                    type="file"
                                    accept=".jpg,.jpeg,.png"
                                    class="w-full border border-dashed border-outline-variant rounded-xl p-6 bg-gray-50"
                                >

                                <p class="text-[11px] text-on-surface-variant mt-2">
                                    JPG e PNG até 5MB.
                                </p>
                            </div>

                        </div>
                    </section>

                </div>

                <!-- RODAPÉ -->
                <div class="mt-10 flex items-center justify-between border-t border-outline-variant pt-8">

                    <div class="flex items-center gap-3 text-on-surface-variant">
                        <span class="material-symbols-outlined">
                            verified_user
                        </span>

                        <span class="text-sm">
                            Este registro será salvo no banco de dados.
                        </span>
                    </div>

                    <div class="flex gap-4">

                        <a href="/?action=produtos"
                           class="px-8 py-3 bg-white border border-outline-variant rounded-lg text-sm font-semibold hover:bg-gray-100">
                            Cancelar
                        </a>

                        <button
                            type="submit"
                            class="px-12 py-3 bg-primary text-white rounded-lg shadow-lg hover:opacity-90 transition-all font-semibold"
                        >
                            Salvar Produto
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </main>
</div>

<script>
const toleranciaInput = document.getElementById('toleranciaInput');
const valorTolerancia = document.getElementById('valorTolerancia');

toleranciaInput.addEventListener('input', function () {
    valorTolerancia.textContent = this.value + '%';
});
</script>

<?php
$conteudo = ob_get_clean();
require_once __DIR__ . '/../layouts/base.php';
?>