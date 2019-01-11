<template>
       <div>
           <div class="col-md-12">
               <ul class="list">
                   <li v-for="serie in series" :key="serie.id">
                            <span @click.prevent="sortBySeries(serie.id)">
                            {{ serie.title }} /
                        </span>
                   </li>
               </ul>
           </div>
           <div class="col-md-12">
               <ul>
                   <li v-for="feature in features" :key="feature.id">
                            <span @click.prevent="sortBySeries(feature.id)">
                            {{ feature.title }} /
                        </span>
                   </li>
               </ul>
           </div>
           <div class="col-md-12">
                <ul>
                   <li v-for="product in products" :key="product.id">
                            {{ product.title }}
                   </li>
               </ul>
           </div>
           
       </div>
</template>

<script>
    export default {
        props:['category_id'],
        data(){
            return {
                products: {},
                series: {},
                features: {},
            }
        },
         methods: {
             getParams(){
                axios.post("/api/tasks/filter", { language: this.language,solved: this.solved,subject: this.subject })
                .then(res => {
                    this.products == res.data
                   
                })
                .catch(err=>console.log(err));
             },
             sortBySeries(filter_id){

                axios.post("/products/filter", { filter_id: filter_id, category_id: this.category_id })
                .then(res => {
                    this.products = res.data
                })
                .catch(err=>console.log(err));
             },
            getCategories() {
                axios.post('/products', {category_id: this.category_id}).then(res =>{
                    this.series = res.data.series
                    this.features = res.data.features
                    this.products = res.data.products
                   
                }).catch(err=>console.log(err))
            },
         },  
        created(){
            this.getCategories();
        },
    }
</script>

<style scoped>
.list{
    display: flex;
    justify-content: space-around
}
</style>