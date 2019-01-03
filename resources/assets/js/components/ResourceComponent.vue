<template>
<div class="col-lg-9 col-sm-12">
    <div class="collection">
            <div class="dsy-segment-resources-tabbed">
                <nav id="dsy-segment-resources-tabbed__menu" class="dsy-segment-resources-tabbed__menu">
                    <div class="dsy-segment-resources-tabbed__menu__item">
                        <div>
                            <div class="dsy-segment-resources-tabbed__menu__item__text">
                                <span>Самое скачиваемое</span>
                            </div>
                        </div>
                    </div>
                    <div class="dsy-segment-resources-tabbed__menu__item">
                        <div>
                            <div class="dsy-segment-resources-tabbed__menu__item__text">
                                <span>Самое популярное</span>
                            </div>
                        </div>
                    </div>
                    <div class="dsy-segment-resources-tabbed__menu__item">
                        <div>
                            <div class="dsy-segment-resources-tabbed__menu__item__text">
                                <span>Последние загрузки</span>
                            </div>
                        </div>
                    </div>
                </nav>
                <div>
                    <div class="dsy-segment-resources-tabbed__resources dsy-segment-resources">
                        <div v-for="r_file in filteredFiles" :key="r_file.id" class="dsy-segment-resources-tabbed__resources__item">
                            <div class="dsy-resource-document">
                                <a href="" class="dsy-resource-document__thumbnail">
                                    <img src="/uploads/thumbnail-document.webp" alt="">
                                </a>
                                <div class="dsy-resource-document__content">
                                    <p href="" class="dsy-resource-document__content__title">Отчет по производственной практики инженера-программиста отчет по практике 2013 по информатике</p>
                                    <div class="dsy-resource-document__author">
                                        <a href="" class="dsy-resource-document__author__avatar">
                                            <img src="/uploads/avatars/no-image.png" alt="">
                                        </a>
                                        <a href="#">refbank15892</a>
                                        <time class="dsy-resource-document__author__submission-date">11 апреля 2017 г.</time>
                                    </div>
                                    <div class="dsy-resource-document-spotlight__content__stats">
                                        <div class="dsy-resource-document-spotlight__content__stats__file">PDF (548 KB)</div>
                                        <div class="dsy-resource-document-spotlight__content__stats__pages">
                                            <span class="dsy-resource-document-spotlight__content__stats__pages__value">29 стр-ы.
                                            </span>
                                        </div>
                                        <div class="dsy-resource-document-spotlight__content__stats__download">
                                            <span class="dsy-resource-document-spotlight__content__stats__download__value">
                                                39
                                            </span>
                                        </div>
                                        <div class="dsy-resource-document-spotlight__content__stats__like">
                                            <span class="dsy-resource-document-spotlight__content__stats__like__value">
                                                34
                                                Сказать спасибо
                                            </span>
                                        </div>
                                        <div class="dsy-download-action">
                                            <button class="dsy-download-action__button">Скачать</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <pagination :data="r_files" @pagination-change-page="getResults"></pagination>
                    </div>
                </div>
        </div>
    </div>
</div>
</template>
<script>
    export default {
        data(){
            return {
                 r_files: {}, //here will come categories
            }
        },
        methods: {
            get_R_Files(){
                axios.get("/api/get_r_files")
                    .then(res => {
                        this.r_files = res.data
                    })
                    .catch(err=>console.log(err));
            },
            getResults(page = 1) {
			axios.get('/api/get_r_files?page=' + page)
				.then(response => {
					this.r_files = response.data;
				});
		    }

        },
        computed: {
            filteredFiles () {
                return this.r_files.data;
            }
         },
        created(){
             this.get_R_Files(); 
        },
        mounted() {
		// Fetch initial results
        this.getResults();
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
