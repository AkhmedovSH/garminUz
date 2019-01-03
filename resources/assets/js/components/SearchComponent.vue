<template>
    <div>
        <div class="aa-input-container" id="aa-input-container">
            <input type="search" id="aa-search-input" class="aa-input-search"
            @focus="visibility = true"

            v-model="keywords" autocomplete="off" />
        <span  @click='ShowVariants = !ShowVariants' class="aa-input-icon" >
            <i class="fa fa-gear fa-lg"></i>
        </span>
        <span class="dropdown-search-menu" v-if="results.length > 0 && visibility">
        <div class="dropdown-menu-list">
            <span class="dropdown-menu-result" v-for="result in results" :key="result.id">
               <a :href="'/book/' + result.slug" class="dropdown-menu-result-link">
                   <div class="dropdown-menu-result-inner">
                        <img :src="'/uploads/books/' + result.image" class="result-image">
                         <p class="dropdown-menu-result-p" v-html="highlight(result.title)"></p>
                   </div>
                   <div class="dropdown-menu-result-inner">
                        <p>ISBN:</p>
                        <p v-html="highlight(result.isbn)"></p>
                   </div>
               </a>
            </span>
        </div>
        </span>
        <span class="dropdown-search-menu" v-show='ShowVariants'>
        <div class="dropdown-variants-list">
            <span class="dropdown-menu-result">
                   <div class="dropdown-variants-result-inner">
                       <div class="dropdown-variants-result-inner-div">
                       <p class="dropdown-variants-result-inner-div-p">Искать в отделе книг</p>
                       <input type="radio" v-model="picked" value="book" name="searchSelected" checked class="dropdown-variants-result-inner-div-input">
                       </div>
                       <div class="dropdown-variants-result-inner-div">
                       <p class="dropdown-variants-result-inner-div-p">Искать в отделе рефератов</p>
                       <input type="radio" v-model="picked" value="abstracts" name="searchSelected"  class="dropdown-variants-result-inner-div-input">
                       </div>
                       <div class="dropdown-variants-result-inner-div">
                       <p class="dropdown-variants-result-inner-div-p">Искать в отделе тестов</p>
                       <input type="radio" v-model="picked" value="test" name="searchSelected"  class="dropdown-variants-result-inner-div-input">
                       </div>
                       
                   </div>
            </span>

        </div>
        </span>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            visibility: false,
            ShowVariants:false,
            keywords: "",
            results: [],
            picked: 'book',
        };
    },

    watch: {
        keywords(after, before) {
            if(this.keywords != ""){
                this.ShowVariants = false;
                this.fetch();
                this.visibility = true;
            }else{
                this.ShowVariants = false;
                this.results = [];
                this.visibility = false;
            }
            
        }
    },

    methods: {
        highlight(text) {
            return text.replace(new RegExp(this.keywords, 'gi'), '<span class="highlighted">$&</span>');
        },
        fetch() {
            axios.post('/api/search',{ keywords: this.keywords } )
                .then(response => this.results = response.data, )
                .catch(error => {});  
        },
        ShowVariantsToSearch(){
            if(this.ShowVariants = true){
                this.visibility = false;
                this.ShowVariants = false;
            }else{
                this.ShowVariants = true;
            }
        }
    }
}
</script>

<style>
.dropdown-search-menu{
    position: absolute;
    display: grid;
    top: 100%;
    z-index: 100;
    left: 0px;
    right: auto;
    
}
.dropdown-menu-list{
    background-color: #fff;
    border: 2px solid rgba(228, 228, 228, 0.6);
    border-top-width: 1px;
    font-family: "Montserrat", sans-serif;
    width: 585px;
    margin-top: 10px;
    box-shadow: 4px 4px 0 rgba(241, 241, 241, 0.35);
    font-size: 15px;
    border-radius: 4px;
    box-sizing: border-box;
    max-height: 400px;
    overflow-y: scroll;
    
}
.result-image{
    margin: auto 0;
    width: 5%;
    height: 30px;
}
.dropdown-menu-result-link{
    padding: 5px;
    display:flex;
    flex-direction:column;
}
.dropdown-menu-result-link:hover{
    background-color:#EEEEEE;
}
.dropdown-menu-result-inner{
    display: flex;
    flex-direction: row;
}
.dropdown-menu-result-p{
    margin: auto 5px;
}
.dropdown-variants-list{
    background-color: #fff;
    border: 2px solid rgba(228, 228, 228, 0.6);
    border-top-width: 1px;
    font-family: "Montserrat", sans-serif;
    width: 585px;
    margin-top: 10px;
    box-shadow: 4px 4px 0 rgba(241, 241, 241, 0.35);
    font-size: 15px;
    border-radius: 4px;
    box-sizing: border-box;
    max-height: 400px; 
}
.dropdown-variants-result-inner{
    padding: 2px 10px;
    display: flex;
    justify-content: space-between;
    flex-direction: column;
}
.dropdown-variants-result-inner-div{
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-direction: row;
    border-bottom: 1px dashed;
}
.dropdown-variants-result-inner-div-p{
    margin: 0px;
}
.dropdown-variants-result-inner-div-input{
    margin: 0px;
}
.highlighted { color: red }
</style>
