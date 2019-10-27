<template>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <card id="card" class="table-wrapper-scroll-y my-custom-scrollbar" body-classes="table-">
            <iframe src="http://localhost/dsi-backend/index.php/api/Bitacoras/crud/" id="embebido" frameBorder="0"></iframe>
          </card>
        </div>
     
      </div>
      
    </div>
  </div>
</template>

<script>
export default {

};
</script>

<style>
  #card{
    height: 500px;
  }
  #embebido{
    width: 100%;
    height: 100%;

  }
</style>