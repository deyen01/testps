<template>
  <Head>
    <title>{{ $page.props.title }} - TestPS</title>
  </Head>
  <div class="p-6">
    <Menu/>
    <p>Это главная страница</p>
  </div>
</template>
<script>
import Menu from '@/Shared/Menu'
export default {
  name: 'Home',
  components: {
    Menu
  }
}
</script>