<template>
  <Head>
    <title>{{ $page.props.title }} - TestPS</title>
  </Head>
  <div class="p-6">
    <Menu/>
  </div>
  <p class="p-6">Рейтинг расчитывается как сумма всех оценок по студенту.</p>
  <div class="p-6">
    <table class="table-auto border-collapse border border-slate-400"><thead><tr><th class="border border-slate-300 p-2">ID</th><th class="border border-slate-300 p-2">ФИО</th><th class="border border-slate-300 p-2">E-mail</th><th class="border border-slate-300 p-2">Место в рейтине</th><th class="border border-slate-300 p-2">Рейтинг</th><th class="border border-slate-300 p-2">Прогресс (%)</th></tr></thead>
      <tbody>
        <tr v-for="user in users.data" v-bind:key="user.id"><td class="border border-slate-300 p-2">{{ user.id }}</td><td class="border border-slate-300 p-2">{{ user.name }}</td><td class="border border-slate-300 p-2">{{ user.email }}</td><td class="border border-slate-300 p-2">{{ user.num }}</td><td class="border border-slate-300 p-2">{{ user.Rating }}</td><td class="border border-slate-300 p-2">{{ user.Progress }}</td></tr>
      </tbody>
    </table>
  </div>
  <pagination :links="users.links" />
</template>
<script>
import Pagination from '@/Shared/Pagination'
import Menu from '@/Shared/Menu'
export default {
  name: 'Users',
  components: {
    Pagination,
    Menu
  },
  props: {
    users: Array
  },
  data() {
    return {}
  },
  computed: {},
  methods: {},
  mounted() {},
  watch: {}
}
</script>
<style>
</style>