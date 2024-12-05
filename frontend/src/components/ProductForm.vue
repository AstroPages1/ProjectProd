<template>
  <form @submit.prevent="submitForm">
    <input v-model="product.name" placeholder="Nome" />
    <input v-model="product.code" placeholder="Código" />
    <input v-model="product.category" placeholder="Categoria" />
    <input v-model="product.supplier" placeholder="Fornecedor" />
    <input v-model="product.cost_price" placeholder="Preço de Custo" type="number" />
    <input v-model="product.sale_price" placeholder="Preço de Venda" type="number" />
    <input v-model="product.minimum_stock" placeholder="Estoque Mínimo" type="number" />
    <input v-model="product.expiry_date" placeholder="Data de Validade" type="date" />
    <button type="submit">Salvar</button>
  </form>
</template>

<script>
import api from '@/services/api';

export default {
  data() {
    return {
      product: {
        name: '',
        code: '',
        category: '',
        supplier: '',
        cost_price: 0,
        sale_price: 0,
        minimum_stock: 0,
        expiry_date: '',
      },
    };
  },
  methods: {
    async submitForm() {
      await api.post('/products', this.product);
      alert('Produto cadastrado com sucesso!');
    },
  },
};
</script>
