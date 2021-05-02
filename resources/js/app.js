require('./bootstrap');


const app = new Vue({

    el: '#app',
    router,
    data: {
        search: ''
    },

    methods: {
        printPDF(){
            window.print();
        }

    }



})