<template>
  <div class="card">
    <p class="discount"><span class="number-discount">-{{ discountPercent }}%</span></p>
    <div class="container-img">
      <img :src="image" alt="" class="foods">
    </div>
    <div class="title-rate-price">
      <label for="" class="title">
        <span class="foodname">{{ name }}</span>
        <span class="description">{{ description }}</span>
      </label>
      <div class="star-rate">
        <div class="stars">
          <img src="../assets/ProductSVG/start.svg" alt="">
          <img src="../assets/ProductSVG/start.svg" alt="">
          <img src="../assets/ProductSVG/start.svg" alt="">
          <img src="../assets/ProductSVG/start.svg" alt="">
          <img src="../assets/ProductSVG/nocolorStar.svg" alt="">
        </div>
        <p class="rate">(<span>{{ rateNumber }}</span>)</p>
      </div>
      <p class="gram">
        <span class="number-gram">{{ gramNumber }}</span>
        <span class="namegram">gram</span>
      </p>
    </div>
    <div class="choose">
      <p class="price">
        <span class="after-discount-price">${{ price }}</span>
        <span class="discount-price">{{ discountPrice }}</span>
      </p>
      <div class="input-number">
        <input type="number" id="number" class="select-number">
        <div class="arrows">
          <img src="../assets/svg/upArrow.svg" alt="" class="up">
          <img src="../assets/svg/downArrow.svg" alt="" class="down">
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    discountPercent: Number,
    image: String,
    name: String,
    description: String,
    rateNumber: Number,
    gramNumber: Number,
    price: Number,
    discountPrice: Number,
  }
};
</script>

<style>
/* .container-product{
                display: flex;
                width: auto;
                gap: 10px;
                flex-wrap: wrap;
} */
.discount{
    display: flex;
    width:40px;
    height:23.4px;
    background-color: aqua;
    align-items: center;
    justify-content: center;
    border-radius: 1px 30px 30px 1px;
    position: relative;
    top:14px;
}
.number-discount{
    font-size: 12.6px;
    position: absolute;
}
        .card{
            border: 1px solid rgb(40, 227, 215);
            width:170px;
            border-radius: 10px;
            overflow:hidden;
        }
        .stars img{
         width: 12px;
         height: 12px;
        }
        .container-img{
            display: flex;
            justify-content: center;
            padding-top: 10px;
            padding-bottom: 10px;
            width:180px;
        }
        .container-img img{
            width:140px;
            height: 140px;
        }
        p{
            margin: 0;
        }
       .title .foodname{
            font-size: 12px;
            color: gray;
        }
        .title{
            width: 170px;
            height: auto;
        }
        label{
            margin-bottom:0;
            font-size: 13px;
            display: flex;
            font-family: Georgia, 'Times New Roman', Times, serif;
            flex-direction: column;
        }
        .star-rate{
            display:flex;
            align-content: center;
            gap: 10px;
            }

            .star-rate .stars img {
            width: 12px;
            height: 12px;
            }

            .star-rate p {
            margin: 0;
            font-size: 13px;
            color: #333;
            }
            p,.rate{
            display: inline; 
            }

            .gram {
                display: flex;
                align-content: center;
                flex-direction: row;
                gap: 10px;
                margin-bottom: 0;
            }

            .select-number {
            width: 65px;
            height: 27px;
            font-size: 14px;
            border: 2px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            transition: border-color 0.3s;
            position: relative;
            color:rgb(95, 201, 95);
        }
    
        .select-number::-webkit-inner-spin-button,
        .select-number::-webkit-outer-spin-button {
            -webkit-appearance: none;
        }
     .gram{
        font-family: 'Lucida Sans';
        font-size: 17px;
     }
        .select-number:focus {
            border-color: rgb(102, 236, 189);
            outline: none;
        }

        .select-number {
            border-color: rgb(70, 229, 173);
            padding-left: 7px;
        }

        .down,
        .up {
            width: 7px;
            cursor: pointer;
            padding-right: 5px;
        }

        .arrows {
            display: flex;
            flex-direction: column;
            gap: 3px;
        }

        .input-number {
          height: fit-content;
            position: relative;
            border-radius: 10px;
            border: 1px;
            display: flex;
            justify-content: center;
            background-color: rgb(56, 187, 143);
            width: fit-content;
        }
        .discount-price{
            text-decoration:line-through gray;
            font-size: 16px;
            padding-left: 10px;
        }
        .after-discount-price{
                font-size: 18px;
        }
        p .price{
            height: auto;
            display: flex;
            gap:10px;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            padding-bottom: 0;
            
        }
        .arrows {
            position: absolute;
            right: 4px;
            top: 0;
            bottom: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 2px;
        }
        .title-rate-price{
        padding-left: 10px;
        }
       .choose{
        margin-top: 2px;
        display: flex;
        justify-content: space-between;
        padding-left: 10px;
        padding-right: 10px;
        padding-bottom:4px ;
       }
       .description {
  font-size: 12px;
  color: #666;
  display: inline-block;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  max-width: 150px; /* Adjust the max-width as needed */
}
</style>