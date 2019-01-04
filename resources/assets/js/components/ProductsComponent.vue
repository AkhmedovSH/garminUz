<template>
       <div>
           <div class="col-md-4">
               <ul>
                   <li v-for="user in categories" :key="user.id">
                         <span v-for="category in user.p_categories" :key="category.id">
                        {{ category.title }} / {{ category.filter_products_count }}
                        </span>
                   </li>
               </ul>
           </div>
           <div class="col-md-4">
               <ul>
                   <li v-for="user in categories" :key="user.id">
                         <span v-for="category in user.p_categories2" :key="category.id">
                        {{ category.title }} / {{ category.filter_products_count }}
                        </span>
                   </li>
               </ul>
           </div>
           <div class="col-md-4">
                <ul>
                   <li v-for="user in categories" :key="user.id">
                         <span v-for="product in user.products" :key="product.id">
                            {{ product.title }}
                        </span>
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
                categories: {},
            }
        },
         methods: {
             getParams(){
                axios.post("/api/tasks/filter", { language: this.language,solved: this.solved,subject: this.subject })
                .then(res => {
                    this.categories = res.data
                   
                })
                .catch(err=>console.log(err));
             },
            getCategories() {
                axios.post('/products', {category_id: this.category_id}).then(res =>{
                    
                    this.categories = res.data
                   
                }).catch(err=>console.log(err))
            },
         },  
        created(){
            this.getCategories();
        },
    }
</script>

<style scoped>

</style>