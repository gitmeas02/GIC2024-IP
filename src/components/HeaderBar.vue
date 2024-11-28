<template>
  <div class="header">
    <h2>{{ title }}</h2>
    <div class="List">
      <ul v-for="nav in computedListBar" :key="nav">
        <li
          @click.prevent="setCurrentNav(nav)" 
          :class="[activeTab === nav ? 'bold' : 'regular']">
          {{ nav }}
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
import { useProductStore } from '@/stores/Product';

export default {
  props: {
    ListBar: {
      type: Array,
      default: () => []
    },
    title: {
      type: String,
      default: 'Default Title'
    }
  },
  setup() {
    const store = useProductStore();
    return { store };
  },
  data() {
    return {
      activeTab: "All"
    };
  },
  methods: {
    setCurrentNav(nav) {
      this.activeTab = nav;
      this.$emit("change-nav", nav); // Emit the selected group
    }
  },
  computed: {
    computedListBar() {
      const newList = [...this.ListBar];
      newList.unshift("All");
      return newList;
    }
  }
};
</script>

<style scoped>
.List {
  display: flex;
  align-items: center;
}
.header {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  padding-left: 100px;
  padding-right: 100px;
  align-content: center;
}
ul {
  display: flex;
  flex-direction: row;
  gap: 24px;
  list-style: none;
  margin: 12px;
}
.bold {
  font-weight: bold;
}
.regular {
  font-weight: normal;
}
</style>


  <!-- // setup(){
  //   const group= ref([]);
  //     const FetchGroup = async => (){
  //     try{
  //      const res= await axios.get('http://localhost:3000/api/groups');
  //      group.value= res.data.map((item)=>{

  //      })
  //     }catch(error){
  //       console.log(error);
  //     }
  //     return {group};
  //   }
  // } -->

<!-- <style scoped>
.List{
  display: flex;
  align-items: center;
}
.header {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  padding-left: 100px;
  padding-right: 100px;
  align-content:center;
  
}

ul {
  display: flex;
  flex-direction: row;
  gap: 24px;
  list-style: none;
  margin: 12px;
}
</style> -->