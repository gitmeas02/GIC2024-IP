
  <template>
  <div class="s">
    <div class="products-container">
      <CardProduct
        v-for="product in products"
        :key="product.id"
        :discountPercent="product.discountPercent"
        :name="product.name"
        :image="product.image"
        :description="product.description"
        :rateNumber="product.rateNumber"
        :gramNumber="product.gramNumber"
        :price="product.price"
        :discountPrice="product.discountPrice"
      />
    </div>
  </div>
</template>

<script>
import { ref } from 'vue';
import CardProduct from '../components/CardProduct.vue';

export default {
  name: 'products',
  components: {
    CardProduct,
  },
  setup() {
    const products = ref([
      { id: 1, name: 'Hot Pot', image: './src/assets/ProductSVG/mango.svg', description: 'Seeds of Change Organic Quinoa', rateNumber: 4.0, gramNumber: 500, price: 3.0, discountPrice: 2.0, discountPercent: 17 },
      { id: 2, name: 'Beef', image: './src/assets/ProductSVG/beff.svg', description: 'Tender cuts of beef for your hot pot', rateNumber: 4.5, gramNumber: 500, price: 5.0, discountPrice: 4.0, discountPercent: 17 },
      { id: 3, name: 'Corn', image: './src/assets/ProductSVG/corn.svg', description: 'Fresh corn for a sweet corn corn', rateNumber: 4.2, gramNumber: 500, price: 2.5, discountPrice: 2.0, discountPercent: 17 },
      { id: 4, name: 'Dry Fish', image: './src/assets/ProductSVG/dry.svg', description: 'Flavorful dry fish dry fish dry fish ', rateNumber: 4.1, gramNumber: 500, price: 3.5, discountPrice: 3.0, discountPercent: 17 },
      { id: 5, name: 'Lemon', image: './src/assets/ProductSVG/leomon.svg', description: 'Fresh lemons for zest dry fish dry fish ', rateNumber: 4.3, gramNumber: 500, price: 1.5, discountPrice: 1.0, discountPercent: 17 },
      { id: 6, name: 'Li', image: './src/assets/ProductSVG/li.svg', description: 'Unique ingredients for hot pot', rateNumber: 4.0, gramNumber: 500, price: 3.0, discountPrice: 2.0, discountPercent: 17 },
      { id: 7, name: 'Meyer', image: './src/assets/ProductSVG/meryer.svg', description: 'Fresh Meyer lemons', rateNumber: 4.4, gramNumber: 500, price: 1.8, discountPrice: 1.5, discountPercent: 17 },
      { id: 8, name: 'Strawberry', image: './src/assets/ProductSVG/platstraberry.svg', description: 'Sweet strawberries ', rateNumber: 4.5, gramNumber: 500, price: 2.0, discountPrice: 1.5, discountPercent: 17 },
      { id: 9, name: 'Orange', image: './src/assets/ProductSVG/orange.svg', description: 'Juicy oranges', rateNumber: 4.6, gramNumber: 500, price: 2.5, discountPrice: 2.0, discountPercent: 17 },
      { id: 10, name: 'Red Onion', image: './src/assets/ProductSVG/redonion.svg', description: 'Crisp red onions ', rateNumber: 4.1, gramNumber: 500, price: 1.2, discountPrice: 1.0, discountPercent: 17 },
      { id: 11, name: 'Salmon', image: './src/assets/ProductSVG/salmon.svg', description: 'Fresh salmon for hot pot hjjke;iweuwieuhw;shjks', rateNumber: 4.8, gramNumber: 500, price: 7.0, discountPrice: 6.0 },
      { id: 12, name: 'Slide Beef', image:'./src/assets/ProductSVG/slidbeff.svg', description: 'Thinly sliced beef ', rateNumber: 4.7, gramNumber: 500, price: 5.5, discountPrice: 4.5, discountPercent: 17 },
      { id: 13, name: 'Wings', image: './src/assets/ProductSVG/wings.svg', description: 'Chicken wings ', rateNumber: 4.2, gramNumber: 500, price: 4.0, discountPrice: 3.5, discountPercent: 17 },
    ]);

    return { products };
  },
};
</script>

<style>
.products-container {
  display: grid;
  grid-template-columns: repeat(6, 1fr); /* Create 5 equal columns */
  gap: 12px; /* Gap between the grid items */
  justify-content: start; /* Align items to the start */
  padding: 20px; /* Padding around the grid */
}

.s {
  display: flex;
  justify-content: center;
  width: 100%;
}

@media (max-width: 1224px) {
  .products-container {
    grid-template-columns: repeat(5, 1fr);
  }
}

@media (max-width: 1010px) {
  .products-container {
    grid-template-columns: repeat(4, 1fr);
  }
}

@media (max-width: 800px) {
  .products-container {
    grid-template-columns: repeat(3, 1fr);
  }
}
@media (max-width: 600px) {
  .products-container {
    grid-template-columns: repeat(2, 1fr);
  }
}
</style>
