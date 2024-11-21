 <template>
  <div class="card">
    <p class="discount">
      <span class="number-discount">-{{ promotionAsPercentage }}%</span>
    </p>
    <img :src="'http://localhost:3000/' + images[0]" alt="" /> Removed extra space here -->
     <div class="title-rate-price">
      <label for="" class="title">
        <span class="foodname">{{ name }}</span>
      </label>
      <div class="star-rate">
        <div class="stars">
          <img src="../assets/ProductSVG/start.svg" alt="" />
          <img src="../assets/ProductSVG/start.svg" alt="" />
          <img src="../assets/ProductSVG/start.svg" alt="" />
          <img src="../assets/ProductSVG/start.svg" alt="" />
          <img src="../assets/ProductSVG/nocolorStar.svg" alt="" />
        </div>
        <p class="rate">(<span>{{ rating }}</span>)</p>
      </div>
      <p class="gram">
        <span class="number-gram">{{ size }}</span>
      </p>
    </div>
    <div class="choose">
      <p class="price">
        <span class="after-discount-price">${{ price }}</span>
        <span class="discount-price">${{ price }}</span>
      </p>
      <div class="add-section">
        <div v-if="showInput" class="input-number">
          <button class="btn-adjust" @click="decreaseQuantity">-</button>
          <input
            type="number"
            class="select-number"
            v-model="quantity"
            min="0"
            readonly
          />
          <button class="btn-adjust" @click="increaseQuantity">+</button>
        </div>
        <button v-else class="btn-add" @click="toggleInput">
          <span>Add</span>
          <span class="iconify" data-icon="material-symbols:add"></span>
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent } from 'vue';

export default defineComponent({
  name: 'CardProduct',
  props: {
    promotionAsPercentage: Number,
    image: String,
    name: String,
    rating: Number,
    size: Number,
    price: Number,
  },
  data() {
    return {
      showInput: false,
      quantity: 0,
    };
  },
  methods: {
    toggleInput() {
      this.showInput = !this.showInput;
      if (this.showInput) {
        this.quantity = 1; // Initialize quantity to 1 when Add button is clicked
      }
    },
    increaseQuantity() {
      this.quantity += 1;
    },
    decreaseQuantity() {
      if (this.quantity > 0) {
        this.quantity -= 1;
        if (this.quantity === 0) {
          this.showInput = false; // Hide input and revert to "Add" button
        }
      }
    },
  },
  computed: {
    images() {
      console.log(this.image)
      return JSON.parse(this.image)
    }
  }
});
</script>



<style scoped>
p{
  margin:0;
}
/* Card container */
.card {
  border: 1px solid #28e3d7;
  width: 253px;
  height: 316px;
  border-radius: 10px;
  overflow: hidden;
  background-color: #fff;
  transition: box-shadow 0.3s ease;
}
.card:hover {
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}
img{
  width: 204px;
  height:146px;
}
/* Discount banner */
.discount {
  display: flex;
  width: 50px;
  height: 25px;
  background-color: #00c4cc;
  align-items: center;
  justify-content: center;
  border-radius: 0 15px 15px 0;
  position: relative;
  top: 10px;
  left: 0px;
}
.number-discount {
  font-size: 12px;
  font-weight: bold;
  color: #fff;
}

/* image container */
.container-img {
  display: flex;
  justify-content: center;
  padding: 10px;
}
.container-img{
  width: 150px;
  height: 150px;
  border-radius: 5px;
}

/* Title and details */
.title-rate-price {
  padding: 10px;
}
.foodname {
  font-size: 14px;
  color: #333;
  font-weight: bold;
}
.description {
  font-size: 12px;
  color: #666;
  display: inline-block;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  max-width: 150px;
}
.choose{
  display: flex;
  justify-content: space-between;
  padding-left: 10px;
  padding-right: 10px;
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

/* Price section */
.price {
  display: flex;
  align-items: center;
  gap: 8px;
  width: auto;
}
.discount-price {
  text-decoration: line-through;
  font-size: 12px;
  color: #888;
}
.after-discount-price {
  font-size: 16px;
  font-weight: bold;
  color: #333;
}

/* Add section */
.add-section {
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
  margin: 10px 0;
}
.btn-add {
  display: flex;
  align-items: center;
  gap: 5px;
  padding: 8px 12px;
  background-color: #38bb8f;
  color: #fff;
  font-size: 14px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}
.btn-add:hover {
  background-color: #2aa672;
}

/* Input section */
.input-number {
  display: flex;
  align-items: center;
  gap: 5px;
}
.select-number {
  width: 50px;
  height: 30px;
  font-size: 14px;
  text-align: center;
  border: 1px solid #ccc;
  border-radius: 5px;
}
.btn-adjust {
  background-color: #eee;
  border: 1px solid #ccc;
  width: 30px;
  height: 30px;
  border-radius: 5px;
  font-size: 16px;
  font-weight: bold;
  cursor: pointer;
}
.btn-adjust:hover {
  background-color: #ddd;
}
label{
  display: flex;
  flex-direction: column;
}
</style> 
