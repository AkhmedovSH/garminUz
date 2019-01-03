<template>
    <!-- Aside -->
    <aside class="col-lg-3 col-md-4 col-xs-12">
        <div class="add-resource">
            <a class="button-add-resource" href="">Добавить</a>
        </div>
        <!-- Aside Widget -->
        <div class="aside-widget">
           <div class="dsy-aside-layout__aside">
               <div class="docsity-side-filters">
                   <div class="docsity-side-filters__header">
                       Типы документов
                   </div>
                   <div class="docsity-side-filters__content">
                       <div class="docsity-side-filters__content__navigation docsity-side-filters__content__navigation--closed">
                           <div class="docsity-side-filters__content__navigation__menu">
                               <a v-for="r_category in r_categories" :key="r_category.id" class="docsity-side-filters__content__navigation__menu__item docsity-side-filters__content__navigation__menu__item--condensed">
                                   <div @click.prevent="chooseRCategory(r_category.id)" class="docsity-side-filters__content__navigation__menu__item__text">
                                       <span  class="docsity-side-filters__content__navigation__menu__item__text__folder__label">
                                           {{ r_category.title_uz }}
                                       </span>
                                   </div>
                               </a>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
        </div>
        <!-- Aside Widget -->
    </aside>
</template>
<script>
    export default {
        data(){
            return {
                r_categories:[], //here will come categories
            }
        },
        methods: {
            get_R_Categories(){
                axios.get("/api/get_r_categories")
                    .then(res => {
                        this.r_categories = res.data
                    })
                    .catch(err=>console.log(err));
            },
            chooseRCategory(r_category){
               axios.get("/api/get_r_sub_categories",{params:{r_id: r_category}} )
                    .then(res => {
                        console.log(res.data.data);
                        this.r_categories = res.data;
                    })
                    .catch(err=>console.log(err));
            }

        },
        created(){
            this.get_R_Categories(); 
        },
    }
</script>

<style>
.add-resource{
    display: flex;
    justify-content: center;
}
.button-add-resource{
  text-decoration: none;
  outline: none;
  display: inline-block;
  width: 140px;
  height: 45px;
  line-height: 45px;
  border-radius: 45px;
  margin: 10px 20px;
  font-family: 'Montserrat', sans-serif;
  font-size: 11px;
  text-transform: uppercase;
  text-align: center;
  letter-spacing: 3px;
  font-weight: 600;
  color: #524f4e;
  background: white;
  box-shadow: 0 8px 15px rgba(0,0,0,.1);
  transition: .3s;
  background: #2ee59dd4;
}
.button-add-resource:hover{
  background: #2EE59D;
  box-shadow: 0 15px 20px rgba(46,229,157,.4);
  color: white;
  transform: translateY(-7px);
}
</style>
