<template>
<div id="main-content" class="sg-layout__content">
<div class="sg-layout__box">
    <div class="brn-question">
        <div class="sg-content-box">
            <div class="question-header sg-content-box__title sg-content-box__title--spaced-bottom">
                <div class="sg-actions-list sg-actions-list--space-between sg-actions-list--no-wrap">
                    <div class="sg-actions-list__hole">
                        <div class="sg-actions-list">
                            <div class="sg-actions-list__hole">
                                <div class="js-asker-avatar question-header__avatar-wrapper sg-hide-for-small-only">
                                    <div class="sg-avatar">
                                        <a :href="'/viewprofile/' + task.users.id">
                                            <img :src="'/uploads/avatars/' + task.users.avatar" class="sg-avatar__image">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="sg-actions-list__hole">
                                <div class="sg-breadcrumb-list js-question-breadcrumbs">
                                    <li class="sg-breadcrumb-list__element">
                                            <span class="sg-link sg-link--small sg-link--gray sg-link--disabled">{{ task.users.name }}</span>
                                    </li>
                                    <li class="sg-breadcrumb-list__element">
                                            <span class="sg-link sg-link--small sg-link--gray sg-link--disabled">{{ task.level }}</span>
                                    </li>
                                    <li class="sg-breadcrumb-list__element">
                                            <span class="sg-link sg-link--small sg-link--gray sg-link--disabled">{{ task.task_category.title }}</span>
                                    </li>
                                    <li class="sg-breadcrumb-list__element">
                                        <span class="sg-link sg-link--small sg-link--gray sg-link--disabled" >
                                            {{ task.points }} B + 3 B
                                        </span>
                                    </li>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sg-content-box js-question-wrapper">
            <div class="sg-content-box__content">
                <h1 v-html="task.description" class="sg-text sg-text--regular sg-text--headline js-question-heading">
                    {{ task.description }}
                </h1>
            </div>
        </div>
        <div v-if="task.image != null" class="js-attachments-viewer-react">
            <div class="sg-content-box sg-content-box--spaced-top-large sg-content-box--spaced-bottom">
                <div class="sg-content-box__content sg-content-box__content--spaced-bottom">
                    <div class="sg-box sg-box--dark sg-box--no-border sg-box--full">
                        <div class="sg-box__hole">
                            <div class="brn-main-attachment images" v-viewer>
                                <img  ref="task_image" class="task_image" :src="'/uploads/task/' + task.image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="checked_answer" @click.prevent="deleteTask(task)" class="sg-actions-list__hole brn-answer__best-answer-button">
            <div class="brn-answer__action">
                <button class="sg-button-secondary sg-button-secondary--small sg-button-secondary--checked js-delete-answer-button">
                    <div class="sg-label sg-label--small">
                        <div class="sg-label__icon"><i class="fa fa-check" aria-hidden="true"></i></div>
                        <div class="sg-label__text">{{ $t('layout.delete_button') }}</div>
                    </div>
                </button>
            </div>
        </div>
    </div>
</div>
<section id="answers" class="js-question-answers js-answers-react">
    <div class="sg-layout__box">
        <div class="brn-answers js-answers-display-block">
            <div class="js-answers-header">
                <div class="brn-answers__header">
                    <div class="sg-actions-list sg-actions-list--space-between sg-actions-list--no-wrap">
                        <div class="sg-actions-list__hole">
                            <h2 class="sg-headline sg-headline--small">
                                {{ $t('layout.answers_and_explanations') }}
                            </h2>
                        </div>
                        <div class="sg-actions-list__hole sg-actions-list__hole--to-right">
                            <img  style="width: 30px;" src="/images/icon_brain_round.png" alt="brain">
                        </div>
                    </div>
                </div>
            </div>
            <div class="js-answers-wrapper">
                <div v-for="(item,index) in task_answers" :key="item.id" class="js-answer-react">
                    <div class="brn-answer js-answer js-answer-element">
                        <div class="sg-content-box sg-content-box--spaced">
                            <div class="brn-answer__header sg-content-box__title">
                                <div class="brn-answer__avatar-wrapper">
                                    <div class="sg-avatar   sg-avatar--spaced">
                                        <a :href="'/viewprofile/' + item.users.id">
                                            <img :src="'/uploads/avatars/' + item.users.avatar" class="sg-avatar__image">
                                        </a>
                                    </div>
                                </div>
                                <ul class="sg-breadcrumb-list js-answer-author">
                                    <li class="sg-breadcrumb-list__element">
                                        <a :href="'/viewprofile/' + item.users.id" class="sg-link sg-link--small sg-link--gray">
                                            {{ item.users.name }}
                                        </a>
                                    </li>
                                    <li class="sg-breadcrumb-list__element">
                                        <a href="/ranks" class="sg-link sg-link--small sg-link--gray">
                                            {{ item.users.ranks }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="brn-answer-icons">
                                <div v-if="item.check" class="brn-verified-info js-verified-answer-info">
                                    <img style="width: 30px;" src="/images/guarantee.png" alt="guarantee">
                                </div>
                                <div v-if="item.solved" class="brn-solved-info js-verified-answer-info">
                                    <img style="width: 30px;" src="/images/solved.png" alt="solved">
                                </div>
                                <div v-if="item.best" class="brn-best-info js-verified-answer-info">
                                    <img style="width: 30px;" src="/images/crown.png" alt="crown">
                                </div>
                            </div>
                            <div class="brn-answer__content sg-content-box__content">
                                <div class="sg-content-box " :class="{'js-answer-wrapper':item.check}">
                                    <div v-html="item.description" class="brn-rich-content brn-answer__text sg-text js-answer-content">
                                        {{ item.description }}
                                    </div>
                                </div>
                            </div>
                            <div v-if="item.image != null" class="js-attachments-viewer-react">
                                <div class="sg-content-box sg-content-box--spaced-top-large sg-content-box--spaced-bottom">
                                    <div class="sg-content-box__content sg-content-box__content--spaced-bottom">
                                        <div class="sg-box sg-box--dark sg-box--no-border sg-box--full">
                                            <div class="sg-box__hole">
                                            <div class="brn-main-attachment" v-viewer>
                                                <img class="task_image" :src="'/uploads/task/' + item.image">
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sg-content-box__content">
                                <div class="sg-content-box sg-content-box--spaced-top-large">
                                    <div class="sg-content-box__content">
                                        <div class="sg-actions-list sg-actions-list--space-between">
                                            <div class="sg-actions-list__hole sg-actions-list__hole--to-end sg-actions-list__hole--to-right-on-medium-up">
                                                <div class="sg-actions-list">
                                                    <div v-if="task_user_id == auth_user.id && !show_best_button"  @click.prevent="chooseBest(item,index)" class="sg-actions-list__hole brn-answer__best-answer-button">
                                                        <div class="brn-answer__action">
                                                            <button class="sg-button-secondary sg-button-secondary--small sg-button-secondary--inverse js-best-answer-button">
                                                                <div class="sg-label sg-label--small">
                                                                    <div class="sg-label__icon"><i class="fa fa-fire" aria-hidden="true"></i></div>
                                                                    <div class="sg-label__text">{{ $t('layout.best_button') }}</div>
                                                                </div>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div v-if="task_user_id == auth_user.id && !show_best_button && !show_solved_button" @click.prevent="chooseSolved(item,index)" class="sg-actions-list__hole brn-answer__thanks-button">
                                                        <div class="brn-answer__action">
                                                            <button class="sg-button-secondary sg-button-secondary--small sg-button-secondary--active-inverse">
                                                                <div class="sg-label sg-label--small sg-label--unstyled">
                                                                    <div class="sg-label__icon">
                                                                        <div class="sg-icon sg-icon--adaptive sg-icon--x14">
                                                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                                                        </div>
                                                                    </div>
                                                                    <span class="sg-label__text">{{ $t('layout.solved_button') }}</span>
                                                                </div>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="sg-actions-list__hole">
                                                        <div class="brn-answer__action">
                                                            <ul class="sg-breadcrumb-list">
                                                                <li class="sg-breadcrumb-list__element">
                                                                    <span @click.prevent="show" class="sg-link sg-link--small">{{ $t('layout.violation_button') }}</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div v-if="checked_answer && !show_checked_button" @click.prevent="chooseCheck(item,index)" class="sg-actions-list__hole brn-answer__best-answer-button">
                                                        <div class="brn-answer__action">
                                                            <button class="sg-button-secondary sg-button-secondary--small sg-button-secondary--checked js-checked-answer-button">
                                                                <div class="sg-label sg-label--small">
                                                                    <div class="sg-label__icon"><i class="fa fa-check" aria-hidden="true"></i></div>
                                                                    <div class="sg-label__text">{{ $t('layout.checked_button') }}</div>
                                                                </div>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div v-if="checked_answer" @click.prevent="deleteAnswerToTask(item,index)" class="sg-actions-list__hole brn-answer__best-answer-button">
                                                        <div class="brn-answer__action">
                                                            <button class="sg-button-secondary sg-button-secondary--small sg-button-secondary--checked js-delete-answer-button">
                                                                <div class="sg-label sg-label--small">
                                                                    <div class="sg-label__icon"><i class="fa fa-check" aria-hidden="true"></i></div>
                                                                    <div class="sg-label__text">{{ $t('layout.delete_button') }}</div>
                                                                </div>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sg-horizontal-separator sg-horizontal-separator--spaced"></div>
                </div>
            </div>
        </div>
    </div>
</section>
    <modal  name="violation">
    <div class="modal-mask">
        <div class="modal-wrapper">
            <div class="sg-toplayer__close"></div>
            <div class="modal-container">
            <div class="modal-body">
                <slot name="body">
                    <div class="sg-content-box">
                        <div class="sg-content-box__title">
                            <h2 class="sg-headline sg-headline--large sg-headline--extra-bold">
                                {{ $t('layout.violation_button') }}
                            </h2>
                        </div>
                    </div>
                    <div class="sg-content-box__title">
                        <p class="sg-text">{{ $t('layout.select_cause_violation') }}</p>
                    </div>
                    <div v-if="violations != null" class="sg-content-box__content">
                       <div class="radio">
                        <span v-for="violation in violations" :key="violation.id">
                        <label>
                            <input v-model="choosedViolation" type="radio" :value="violation.id" class="radioInput" name="optradio">
                            <span v-if="lang == 'ru'">{{ violation.content_ru }}</span>
                            <span v-else>{{ violation.content_uz }}</span>
                            </label>
                        </span>
                        </div>
                    </div>
                    <div class="sg-content-box__actions">
                        <button @click.prevent="hide" class="sg-button-secondary sg-button-secondary--cancel">{{ $t('layout.violation_modal_cancel') }}</button>
                        <button @click.prevent="sendViolation" class="sg-button-secondary sg-button-secondary--dark">{{ $t('layout.violation_modal_send') }}</button>
                    </div>
                </slot>
            </div>
            </div>
        </div>
    </div>
    </modal>
</div>
</template>

<script>
export default {
    props: ['task', 'auth_user'],
    data(){
        return{
            task_answers: {},
            task_user_id: 0,// value to show buttons to that user who insert task
            checked_answer: 0,// value to show check button to user who is checker(who also can delete exercise)
            show_best_button: 0,
            show_solved_button: 0,
            show_checked_button: 0,
            show_delete_button: 0,
            violations: null,
            choosedViolation: null,
            lang: 'uz'
        }
    },
    methods: {
        deleteTask(task){
            if (confirm('Are you sure you want to Delete?')) { // Standard confirmation message.
            axios.post('/api/deleteTask',{task:task,auth_user:this.auth_user})
            .then(response => window.location = "/tasks");
            } else {}
        },
        deleteAnswerToTask(task_answer, index){
            if (confirm('Are you sure you want to Delete?')) { // Standard confirmation message.
            this.$delete(this.task_answers, index);
            axios.post('/api/deleteAnswerToTask', {task_answer: task_answer,auth_user:this.auth_user});
            } else {}
        },
        sendViolation(){
        this.hide();
        axios.post('/api/sendViolations',{choosedViolation: this.choosedViolation, task_id: this.task.id, auth_id: this.auth_user.id})
        .then(response =>
        alert(response.data));
        },
        show () {
            this.$modal.show('violation');
            axios.get('/api/getViolations')
            .then(response =>
              this.violations = response.data);
        },
        hide () {
            this.$modal.hide('violation');
        },
        solvedOrNot(){
            this.task_user_id = this.task.user_id;// ID of user who upload task
            this.checked_answer = this.auth_user.lesson_checker;// Return person has access to check task or not
            this.show_solved_button = this.task.solved;// show to user who upload task buttons to choose if task has answer hide if not show
            this.show_best_button = this.task.best;
            this.show_checked_button = this.task.check;
        },
        chooseBest(task_answer, index){
             axios
            .post('/api/chooseBest',{task_answer_id: task_answer.id,task_answer_task_id: task_answer.task_id })
            .then(response =>
              this.show_best_button = 1,
              this.show_solved_button = 1,
              this.task_answers[index].solved = 1,
              this.task_answers[index].best = 1 );
        },
        chooseSolved(task_answer,index){
            axios
            .post('/api/chooseSolved',{task_answer_id: task_answer.id,task_answer_task_id: task_answer.task_id })
            .then(response =>
             this.show_solved_button = 1, 
             this.task_answers[index].solved = 1 ); 
        },
        chooseCheck(task_answer,index){
            axios
            .post('/api/chooseCheck',{task_answer_id: task_answer.id,task_answer_task_id: task_answer.task_id })
            .then(response =>
             this.show_checked_button = 1,
             this.show_solved_button = 1,
             this.task_answers[index].check = 1,
             this.task_answers[index].solved = 1 );
        },
        getTasksAnswers(){
            axios
            .post('/api/getTasksAnswers',{task_id: this.task.id})
            .then(response =>
            this.task_answers = response.data);
        },
    },
    created(){
        this.lang = this.$i18n.locale;
        this.solvedOrNot();
        this.getTasksAnswers();
    }
}
</script>

<style>
</style>