<template>
  <div>
      <div v-for="apartment in apartments" :key="apartment">{{apartment}}</div>
  </div>
</template>

<script>
export default {
    name: 'Index',
    props: ['apartments'],
    }
</script>

<style>

</style>