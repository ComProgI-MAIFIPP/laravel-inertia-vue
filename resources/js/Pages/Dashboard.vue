<template >
    <div>
        <!-- Flash Message hugot -->
        <div v-if="$page.props.flash.message">
          <p class="p-4 bg-green-100 text-sm">{{ $page.props.flash.message }}</p>
        </div>

        <h1 class="title">Welcome Back, {{ $page.props.auth.user.name }}</h1>
    </div>
</template>

<script lang="ts">
export default {
  name: 'Dashboard',
};
</script>