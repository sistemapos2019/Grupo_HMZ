<template>
    <div class="content">      
      <div class="container-fluid">
         
        <div class="row">
          
           <div class="col-md-12">
             <iframe src="http://localhost/dsi-backend/api/libroventas" style="width:100%; height:500px;" frameBorder="0"></iframe>
           </div>
         

        </div>
      </div>
    </div>
  </template>
   
  <script>
   import Datepicker from 'vuejs-datepicker';
  export default {
    components: {
        Datepicker
    },
    methods:{
      
    },
    data () {
      return {
      }
    }
  }
  </script> 
  <style>
  
  </style>