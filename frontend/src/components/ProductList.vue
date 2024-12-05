<template>
  <div>
    <h1>Produtos</h1>
    <ul>
      <li v-for="product in products" :key="product.id">
        {{ product.name }} - {{ product.category }}
      </li>
    </ul>
  </div>
</template>

<script>
import api from '@/services/api';

export default {
  data() {
    return {
      products: [],
    };
  },
  async mounted() {
    const response = await api.get('/products');
    this.products = response.data;
  },
};
</script>
