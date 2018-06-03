/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('task-list', require('./components/TaskList.vue'));
Vue.component('task-composer', require('./components/TaskComposer.vue'));
Vue.component('user-input', require('./components/UserInput.vue'));

const app = new Vue({
    el: '#taskapp',
    data: {
        tasks: [],
    },
    methods: {
        newTask(data) {
            if (data.task_title === '' && data.task_description === '') {
                alert('All fields required');
            } else {
                axios.post('/task', data).then(response => {
                    console.log(response);
                    this.tasks.push({
                        task_title: data.task_title,
                        task_description: data.task_description,
                    });
                });
            }
        },
    },
    mounted() {
        axios.get('/task-list').then(response => {
            if (response.data.length === 0) {
                console.log(
                    'You have not created any task. Create a new one below.'
                );
            } else {
                this.tasks = response.data;
            }
        });
    },
});
