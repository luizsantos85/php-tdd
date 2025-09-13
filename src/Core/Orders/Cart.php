<?php

namespace Core\Orders;

class Cart
{
    /**
     * @var Product[] Lista associativa de itens no carrinho.
     * Cada entrada tem a chave = productId e o valor = ['product' => Product, 'quantity' => int]
     */
    private array $items = [];

    /**
     * Adiciona um produto ao carrinho.
     *
     * Se o produto já existe no carrinho (mesmo id), aumenta a quantidade existente
     * somando a quantidade do produto recebido.
     *
     * @param Product $product Objeto Product com id, preço e quantidade a adicionar
     */
    public function add(Product $product): void
    {
        // Verifica se já existe uma entrada para esse produto no carrinho.
        // Se existir, calcula a nova quantidade somando a quantidade atual com a informada no $product.
        $qtd = isset($this->items[$product->getId()]) 
            ? $this->items[$product->getId()]['quantityItemsCart'] + $product->getQuantity() 
            : $product->getQuantity();

        // Atualiza (ou cria) a entrada do produto no array de itens.
        // A entrada contém o objeto Product e a quantidade total acumulada.
        $this->items[$product->getId()] = [
            'product' => $product,
            'quantityItemsCart' => $qtd,
        ];
    }

    /**
     * Calcula o valor total do carrinho.
     *
     * Percorre todas as entradas e multiplica o preço do produto pela quantidade
     * para obter o subtotal de cada item, somando tudo em $total.
     *
     * @return float Valor total do carrinho
     */
    public function total(): float
    {
        $total = 0;

        foreach ($this->items as $entry) {
            // $entry é um array com 'product' => Product e 'quantity' => int
            // Multiplica preço unitário pela quantidade e acumula no total.
            $total += $entry['product']->getPrice() * $entry['quantityItemsCart'];
        }

        return $total;
    }

    /**
     * Retorna os itens do carrinho.
     *
     * Útil para exibir, iterar ou realizar asserts em testes.
     *
     * @return array Estrutura com todas as entradas do carrinho
     */
    public function getItems(): array
    {
        return $this->items;
    }
}

