<!-- <template>
<div class="product-container">
<div class="product">
  <CardProduct
      v-for="product in productCountSolve"
      :key="product.id"
      :name="product.name"
      :promotionAsPercentage="product.promotionAsPercentage"
      :image="product.image"
      :rating="product.rating"
      :size="product.size"
      :price="product.price"
    />
</div>
</div>
</template>
<script>
import CardProduct from '@/components/CardProduct.vue';
import { useProductStore } from '@/stores/Product';
import { mapState } from 'pinia';

export default{
  components:{
    CardProduct
  },
  computed:{
    ...mapState(useProductStore,{
      productCountSolve(store){
        return store.getShortListProduct();
      }
    })
},
  mounted(){
  const productStore = useProductStore();
  productStore.fetchProducts();
  }
}
</script>
<style>
.product{
  display: flex;
  flex-direction: row;
}
</style> -->