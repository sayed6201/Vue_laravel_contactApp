
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
console.log('hlw');
var app = new Vue({
  //id of div
  el: '#vue_app',

 /*
  Datas
  */
  data: {
    //item will have all the data from table, after fetching...
    items: [],
    hasError: true,
    hasDeleted: true,
    hasAgeError: true,
    showModal: false,

    //Modal fild's values are represented by this values, if u update them modal field value will update
    e_name: '',
    e_age: '',
    e_id: '',
    e_profession: '',

    //form values are defined as newItem object
    newItem: { 'name': '','email': '','phone': '','info':'' },
   },
  mounted: function mounted() {
    this.getVueItems();
  },

  /*
  Methods
  */
  methods: {
  	 clicker(){
  		console.log('hi,i am clicked 22');
  	},
    //retrieves all data from database
    getVueItems() {
      var _this = this;

    //axios is used to use the route and pass param
      axios.get('/getitems').then(function (response) {
        //response is the returned object from the Controller 
        _this.items = response.data;
        //items can be now used in view to display data in table
      });
    },

    //Sets value to Model
    setVal(name, email, info, phone, edit_id_click) {
      //this value are accessible in HTML
        this.e_name = name;
        this.e_email = email;
        this.e_info = info;
        this.e_phone = phone;
        this.e_id = edit_id_click;
    },

    //Adds new data to database, this method is triggered when button is clicked...
    addContact() {
      var _this = this;
      var input = this.newItem;
      
      //if the fields are empty error is set, and error message is displayed
      if (input['name'] == '' || input['email'] == '' || input['phone'] == '' || input['info'] == '' ) {
        this.hasError = false;
        alert('fill out all the fields');
      } else {
        this.hasError = true;
        axios.post('/additem', input).then(function (response) {
          _this.newItem = { 'name': '', 'email': '', 'phone': '' };
          _this.getVueItems();
        });
        this.hasDeleted = true;
      }
    },

//     //edits items
    editItem(){
      //all the filds in model are accessed through these vars
         // var id_val_1 = this.e_id.value;
         // var n_val_1 = document.getElementById('e_name');
         // var e_val_1 = document.getElementById('e_email');
         // var p_val_1 = document.getElementById('e_phone');
         // var i_val_1 = document.getElementById('e_info');

         //  // axios.post('/edititems/2', {e_name: n_val_1.value, e_email: e_val_1.value, e_phone: p_val_1.value, e_info:i_val_1.value })
         //  //   .then(response => {
         //  //     this.getVueItems();
         //  //     // this.showModal=false
         //  //   });
         //  // // this.hasDeleted = true;
         //  console.log(n_val_1.value+i_val_1.value);
         console.log("kiss my ass");
  },

//   //is used to delete an item
    deleteItem(item) {
      var _this = this;
      axios.post('/deleteitem/' + item.id).then(function (response) {
        _this.getVueItems();
        _this.hasError = true, 
        _this.hasDeleted = false
        
      });
    }

  }
});