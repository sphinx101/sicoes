<template>
  <div>
    <p>{{ this.header }}</p>
  </div>
</template>

<script>
export default {
  props: {
    header: {
      type: String,
      required: true,
    },
  },
};
</script>

<style lang="scss" scoped>
</style>

