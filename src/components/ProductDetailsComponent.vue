<template>
  <div class="container-wrapper" v-if="!loading">
    <div class="image-content" v-if="product">
      
      <div class="container-image">
        <div class="nav-bar">
        <router-link to="/">Home</router-link>
        <Icon icon="material-symbols:arrow-forward-ios-rounded" width="14" height="14" />
        <router-link to="/">{{ product.group }}</router-link>
        <Icon icon="material-symbols:arrow-forward-ios-rounded" width="14" height="14" />
        <router-link to="/">{{ product.name }}</router-link>
        <Icon icon="material-symbols:arrow-forward-ios-rounded" width="14" height="14" />
       </div>
        <div class="image-product">
          <img
            v-if="product.images[0]"
            :src="'http://localhost:3000/' + product.images[0]"
            alt="Main Product Image"
          />
        </div>
        <div class="images">
          <Icon icon="material-symbols:line-start-arrow-rounded" width="24" height="24" style="padding: 12px; background-color: aqua; border-radius: 9px;"/>
          <img v-for="(img, index) in product.images" :key="index" :src="'http://localhost:3000/' + img" alt="" class="img-follow-index" style="margin-left: 20px;margin-right: 20px;" />
          <Icon icon="material-symbols:line-end-arrow-rounded" width="24" height="24" style="padding: 12px; background-color: aqua;border-radius: 9px;"/>
        </div>
      </div>

      <div class="product-detail">
        <div class="instock">
          <p>{{ product.instock }}</p>
        </div>
        <h3 style="font-size: 32px;">Seeds of Change Organic Quinoa, Brown</h3>
        <p>{{ product.name }}</p>
        <div class="star-rate">
          <div class="stars">
            <img
              v-for="n in fullStars"
              :key="'full-' + n"
              src="../assets/ProductSVG/start.svg"
              alt="Filled Star"
            />
            <img
              v-for="n in emptyStars"
              :key="'empty-' + n"
              src="../assets/ProductSVG/nocolorStar.svg"
              alt="Empty Star"
            />
          </div>
          <p class="rate">(<span>{{ product.rating }}</span>)</p>
        </div>
        <div class="price">
        <p v-if="product.promotionAsPercentage">
          <span class="discounted-price">$ {{ discountedPrice }}</span>
          <span class="original-price">$ {{ product.price }}</span>
        </p>
        <p v-else>$ {{ product.price }}</p>
      </div>
      <h5>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam rem officia, corrupti reiciendis minima nisi modi, quasi, odio minus dolore impedit fuga eum eligendi? Officia doloremque facere quia. Voluptatum, accusantium!</h5>
        <div class="Cart">
          <div class="in-de">
            <button @click="btnAddClick" v-if="!addClick" class="AddBtn">Add +</button>
            <input v-else type="number" v-model="amount" />
          </div>
          <button class="check-in">
            <Icon
              icon="material-symbols:add-shopping-cart-sharp"
              width="24"
              height="24"
              style="color:white"
            />
            <span>Add To Cart</span>
          </button>
          <div class="fav">
            <Icon
              icon="material-symbols:add-shopping-cart-sharp"
              width="24"
              height="24"
              style="color:black"
            />
          </div>
          <div class="fav">
            <Icon
              icon="material-symbols:add-shopping-cart-sharp"
              width="24"
              height="24"
              style="color:black"
            />
          </div>
        </div>
        <p>Vendor: {{ product.name }}</p>
        <p>SKU: {{ product.name }}</p>
      </div>
    </div>

    <div class="nav-descriptions">
  <nav class="nav">
    <button
      v-for="(tab, index) in tabs"
      :key="index"
      :class="{ active: activeTab === index }"
      @click="setActiveTab(index)"
    >
      {{ tab }}
    </button>
  </nav>
  <div class="tab-content">
    <span v-if="activeTab === 0">
      Uninhibited carnally hired played in whimpered dear gorilla koala depending and much yikes off far quetzal goodness and from for grimaced goodness unaccountably and meadowlark near unblushingly crucial scallop tightly neurotic hungrily some and dear furiously this apart
    </span>
    <span v-if="activeTab === 1">
      Spluttered narrowly yikes left moth in yikes bowed this that grizzly much hello on spoon-fed that alas rethought much decently richly and wow against the frequent fluidly at formidable acceptably flapped besides and much circa far over the bucolically hey precarious goldfinch mastodon goodness gnashed a jellyfish and one however because.
    </span>
    <span v-if="activeTab === 2">
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi magni doloremque repellat distinctio id nulla iusto voluptate repudiandae nobis laudantium ex sit quos totam eum, similique sed amet tempora corrupti.
    </span>
  </div>
    </div>

  </div>
  <div v-else>Loading...</div>
</template>

<script>
import { ref, computed, onMounted } from "vue";
import { useRoute } from "vue-router";
import { useProductStore } from "@/stores/Product";
import axios from "axios";
import { Icon } from "@iconify/vue";

export default {
  name: "ProductDetails",
  components: {
    Icon,
  },
  setup() {
    const store = useProductStore();
    const route = useRoute();
    const productId = route.params.id;
    const loading = ref(true);

    const product = computed(() => {
      const foundProduct = store.products.find((product) => product.id == productId);
      if (foundProduct) {
        foundProduct.images = JSON.parse(foundProduct.image);
      }
      return foundProduct;
    });

    const discountedPrice = computed(() => {
  if (product.value && product.value.promotionAsPercentage) {
    return (product.value.price * (1 - product.value.promotionAsPercentage / 100)).toFixed(2);
  }
  return product.value ? product.value.price : 0;
});

    const fullStars = computed(() =>
      product.value ? Array(Math.floor(product.value.rating)).fill(1) : []
    );


    const emptyStars = computed(() =>
      product.value ? Array(5 - Math.floor(product.value.rating)).fill(1) : []
    );

    onMounted(() => {
      if (store.products.length === 0) {
        axios
          .get("http://localhost:3000/api/products")
          .then((response) => {
            store.products = response.data;
          })
          .catch((error) => {
            console.error("Error fetching products:", error);
          });
      } else if (!product.value) {
        axios
          .get(`http://localhost:3000/api/products/${productId}`)
          .then((response) => {
            const fetchedProduct = response.data;
            fetchedProduct.images = JSON.parse(fetchedProduct.image);
            store.products.push(fetchedProduct);
          })
          .catch((error) => {
            console.error("Error fetching product:", error);
          });
      }
      setTimeout(() => {
        loading.value = false;
      }, 500);
    });

    return { product, discountedPrice, fullStars, emptyStars, loading };
  },
  data() {
    return {
      addClick: false,
      amount: 1,
      tabs: ["Description", "Additional Info", "Reviews (3)"], // Dynamic tab labels
      activeTab: 0,
    };
  },
  methods: {
    btnAddClick() {
      this.addClick = true;
      this.amount = 1;
    },
    setActiveTab(index) {
      this.activeTab = index;
    },
  },
};
</script>



<style scoped>
.product-detail{
 width: 430px;
}
h3{
  margin:0px;
}
.container-wrapper{
  display: flex;
  flex-direction: column;
  align-items: center;
  width: fit-content;
}
 .image-content {
    display: flex;
    gap:40px;
}
.image-product > img{
  width: 428px;
  padding-right: 100px;
  object-fit: contain;
}


.image-product {
    display: flex;
    justify-content: center;
    width: 556px;
    height: 440px;
    align-items: center;
}
.in-de {
    display: flex;
    align-items: center;
}
.AddBtn {
    color: white;
    font-family: "Quicksand", serif;
    background-color: #3BB77E;
    font-size: 20px;
    font-weight: 700;
    height: 50px;
    padding: 6px 16px;
    border: 1px solid #3BB77E;
    border-radius: 10px;
}
.in-de input{
    display: flex;
    text-align: center;
    height: 44px;
    width: 64px;
    border: 2px solid #3BB77E;
    border-radius: 10px;
    font-size: 20px;
    color: #3BB77E;
}
.in-de input[type=number]:focus {
    height: 44px;
    color: #3BB77E;
    border: 2px solid #3BB77E;
    border-radius: 10px;
    outline: none;
    width: 64px;
}
.check-in {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    height: 50px;
    width: auto;
    border-radius: 8px;
    background-color: #3BB77E;
    padding: 0px 20px 0px 20px;
    border: 1px solid rgb(130, 255, 153);
}
.check-in span {
    color: white;
    font-family: "Quicksand", serif;
    font-size: 18px;
    font-weight: 600;
}
.instock{
  height: 23px;
   width: 102px;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: aquamarine;
  margin-top: 40px;
}
p{
  margin:0;
}
/* Ratings */
.star-rate {
  display: flex;
  align-items: center;
  gap: 10px;

}
.stars img {
  width: 14px;
  height: 14px;
}
.rate {
  font-size: 12px;
  color: #888;
}
.Cart{
  display: flex;
  align-items: center;
  gap: 10px;
  padding-bottom:70px ;
}
.fav{
  padding: 11px;
  border-radius: 4px ;
  background-color: aquamarine;
}
.img-follow-index{
  height: 110px;
  width: 110px;
  border: 1px solid;
  padding: 12px;
  margin:4px;
  margin-top: 0px;
}

.images{
  display: flex;
  align-items: center;
  justify-content: center;
  
}
.original-price {
  text-decoration: line-through;
  color: gray;
  margin-left: 10px;
}

.discounted-price {
  font-weight: bold;
  color: red;
}
.nav-descriptions{
  padding-left: 107px;
  padding-right: 107px;
  margin-bottom: 200px;
  margin-top: 30px;
}
.nav button {
  background-color: #ffffff;
  border: 1px solid #eaeaea;
  padding: 10px 20px;
  cursor: pointer;
  border-radius: 8px;
}

.nav button.active {
  background-color: #ffffff;
  color: #3BB77E;
  font-weight: bold;
  border-radius: 8px;
}
.nav{
  display: flex;
  align-items: center;
  gap:15px;
}

</style>


















<!-- <template>
  <div class="container-details">
    <img :src="'http://localhost:3000/' + product.images[0]" alt="Product Image" />
    <div class="details">
      <p>{{ product.name }}</p>
      <p>Rating: {{ product.rating }}</p>
      <p>Price: ${{ product.price }}</p>
      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. In quod fugit alias officia unde beatae.</p>
      <input type="number" name="" id="">
      <button>Add to Card</button>
      <Icon icon="ci:heart-02" width="24" height="24" />
      <Icon icon="tabler:arrows-exchange" width="24" height="24" />
    </div>
  </div>
  <div class="description">
    <button>Description</button>
    <button>Additional info</button>
    <button>Reviews (<span>3</span>)</button>
  </div>
</template> -->
  <!-- <div>
   
    
      
      <p>Size: {{ product.size }}g</p>
     
    </div>
  </div> -->
<!-- <script>

import { ref, computed, onMounted } from "vue";
import { useRoute } from "vue-router";
import { useProductStore } from "@/stores/Product";
import axios from "axios";
import { Icon } from "@iconify/vue";

export default {
  name: "ProductDetails",
  components:{
  Icon
},
  setup() {
    const store = useProductStore();
    const route = useRoute();
    const productId = route.params.id;
    const loading = ref(true);

    const product = computed(() => {
      const foundProduct = store.products.find((product) => product.id == productId);
      if (foundProduct) {
        foundProduct.images = JSON.parse(foundProduct.image);
      }
      return foundProduct;
    });

    onMounted(() => {
      if (store.products.length === 0) {
        axios
          .get("http://localhost:3000/api/products")
          .then((response) => {
            store.products = response.data;
          })
          .catch((error) => {
            console.error("Error fetching products:", error);
          });
      } else if (!product.value) {
        axios
          .get(`http://localhost:3000/api/products/${productId}`)
          .then((response) => {
            const fetchedProduct = response.data;
            fetchedProduct.images = JSON.parse(fetchedProduct.image);
            store.products.push(fetchedProduct);
          })
          .catch((error) => {
            console.error("Error fetching product:", error);
          });
      }

      // Simulate 3-minute loading delay
      setTimeout(() => {
        loading.value = false;
      }, 180); // 3 minutes in milliseconds
    });

    return { product, loading };
  },
};
</script> -->
