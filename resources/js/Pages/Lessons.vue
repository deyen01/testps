<template>
  <Head>
    <title>{{ $page.props.title }} - TestPS</title>
  </Head>
  <div class="p-6">
    <Menu/>
  </div>
  <div class="p-6">
    <div class="flex space-x-4">
      <Link :href="route('lessons') + '?sortByLearnings=1'" class="text-gray-700 bg-gray-200 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Список уроков, отсортированный по количеству студентов его посмотревших</Link>
    </div>
  </div>
  <div class="p-6">
    <table class="table-auto border-collapse border border-slate-400"><thead><tr><th class="border border-slate-300 p-2">ID</th><th class="border border-slate-300 p-2">Тема урока</th><th class="border border-slate-300 p-2">Сколько пользователей смотрело</th></tr></thead>
      <tbody>
        <tr v-for="lesson in lessons.data" v-bind:key="lesson.id"><td class="border border-slate-300 p-2">{{ lesson.id }}</td><td class="border border-slate-300 p-2">{{ lesson.title }}</td><td v-if="!sbl" class="border border-slate-300 p-2">{{ lesson.cv }}</td><td v-if="sbl" class="border border-slate-300 p-2">{{ lesson.CountLearnings }}</td></tr>
      </tbody>
    </table>
  </div>
  <pagination :links="lessons.links" />
</template>
<script>
import Pagination from '@/Shared/Pagination'
import Menu from '@/Shared/Menu'
export default {
  name: 'Lessons',
  components: {
    Pagination,
    Menu
  },
  props: {
    lessons: Array,
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