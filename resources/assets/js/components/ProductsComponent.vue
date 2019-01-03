<template>
       <div>
           <div class="col-md-3">
               <ul>
                   <li v-for="user in categories" :key="user.id">
                         <span v-for="category in user.p_categories" :key="category.id">
                        {{ category.title }} / {{ category.many_products_count }}
                        </span>
                   </li>
               </ul>
           </div>
           <div class="col-md-9">
                <ul>
                   <li v-for="user in categories" :key="user.id">
                         <span v-for="category in user.p_categories" :key="category.id">
                            <span v-for="product in category.many_products" :key="product.id">
                            {{ product.title }}
                            </span>
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
                axios.get('/products').then(res =>{
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