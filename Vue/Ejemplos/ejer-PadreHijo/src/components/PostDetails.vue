<template>
    <div class="post-details">
      <h2>{{ post.title }}</h2>
      <p>{{ post.content }}</p>
    </div>
  </template>
  
  <script>
  export default {
    name: 'PostDetails',
    props: {
      post: {
        type: Object,
        required: true
      }
    }
  };
  </script>
  
  <style scoped>
  .post-details {
    border: 1px solid #ccc;
    padding: 16px;
    margin: 8px 0;
  }
  </style>
  