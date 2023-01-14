<template>
  <Head>
    <title>{{ $page.props.title }} - TestPS</title>
  </Head>
  <div class="p-6">
    <Menu/>
  </div>
  <div class="p-6">
    <div class="flex space-x-4">
      <Link :href="route('users') + '?sortByLearnings=1'" class="text-gray-700 bg-gray-200 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Список студентов, отсортированный по количеству просмотренных уроков</Link>
    </div>
  </div>
  <div class="p-6">
    <table class="table-auto border-collapse border border-slate-400"><thead><tr><th class="border border-slate-300 p-2">ID</th><th class="border border-slate-300 p-2">ФИО</th><th class="border border-slate-300 p-2">E-mail</th><th v-if="!sbl" class="border border-slate-300 p-2">Роль</th><th v-if="sbl" class="border border-slate-300 p-2">Кол-во просмотренных уроков</th></tr></thead>
      <tbody>
        <tr v-for="user in users.data" v-bind:key="user.id"><td class="border border-slate-300 p-2">{{ user.id }}</td><td class="border border-slate-300 p-2">{{ user.name }}</td><td class="border border-slate-300 p-2">{{ user.email }}</td><td v-if="!sbl" class="border border-slate-300 p-2">{{ user.role }}</td><td v-if="sbl" class="border border-slate-300 p-2">{{ user.CountLearnings }}</td></tr>
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
    users: Array,
    sbl: Boolean
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